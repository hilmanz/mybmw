<?php

class googleAnalyticHelper {

	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);

		$this->startdate=false;
		$this->enddate=false;
		$this->dateFilter=false;

		
		if($this->apps->_p('startdate')){
			$this->startdate = date('Y-m-d',strtotime(str_replace('/', '-', $this->apps->_p('startdate'))));
		}elseif ($this->apps->_g('startdate')) {

			$this->startdate = date('Y-d-m',strtotime(str_replace('/', '-', $this->apps->_g('startdate'))));
		}
		if($this->apps->_p('enddate')) {
			$this->enddate = date('Y-m-d',strtotime(str_replace('/', '-', $this->apps->_p('enddate'))));
		}elseif ($this->apps->_g('enddate')) {
			
			$explodeenddate=explode('/', $this->apps->_g('enddate'));
			$this->enddate = $explodeenddate[2].'-'.$explodeenddate[0].'-'.$explodeenddate[1];
			// pr($explodeenddate);
			// $this->enddate = date('Y-d-m',strtotime(str_replace('/', '-', $this->apps->_g('enddate'))));
			// echo  str_replace('/', '-', $this->apps->_g('enddate')).str_replace('/', '-', $this->apps->_g('startdate'));
			// echo strtotime(trim(str_replace('/', '-', $this->apps->_g('enddate'))));
		}
		if($this->startdate!=false&&$this->enddate!=false){
			$this->dateFilter = true;
			
		}
		else
		{
			$this->dateFilter = true;
			$this->startdate=date('Y-m-d',mktime(0, 0, 0, date('m'), date('d')-7,   date('y')));
			$this->enddate=date('Y-m-d');
		}
	}

	function hackDateGapofDailyChart($results,$customLimit,$from,$to,$arrLabel){
			if($from==null&&$to==null){
				$customLimit = true;
			}
			//To make data start and/or end from the date that was given
			$n_size = sizeof($results);
			
			//To fix the gap between date
			$n_size = sizeof($results); //recalculate n_size
			$start_over = 0;
			if($n_size>0){
				foreach($results as $n=>$rs){		
					$results[$n]['ts'] = strtotime($rs['date_d']);
				}
				$results = subval_sort($results, 'ts');
				
				//pr($results);exit;
				for($i=0;$i<$n_size;$i++){
					$rs = $results[$i];
					if($i>0){						
						$curr_ts = strtotime($rs['date_d']);
						$last_ts = strtotime($results[$i-1]['date_d']);
						$diff_ts = $curr_ts - $last_ts;
						if($diff_ts>(60*60*24)){				
							$n_days = ceil($diff_ts/(60*60*24));
								
							while($n_days>1){
								$hasil[$start_over]['date_d'] = date("Y-m-d",$curr_ts-(($n_days-1)*60*60*24));
								foreach($arrLabel as $l){
								
									$hasil[$start_over][$l]=0;
								}
								$start_over++;
								$n_days--;
							}				
						}
					}
					
					$hasil[$start_over]['date_d'] = $rs['date_d'];
				
					foreach($arrLabel as $l){
						
						
						$hasil[$start_over][$l]=(($rs[$l]>0)?$rs[$l]:0);
					}
					$start_over++;
				}
			}

			return $hasil;
	}
	
	function gaData(){
		global $CONFIG;
$dateFilter='';
		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT 
					SUM(page_views) numPageViews , 
					SUM(visits) numVisits, 
					SEC_TO_TIME(AVG(visitDuration)) time_onSite,
					SEC_TO_TIME(AVG(time_onPage)) numTimeOnPage,
					ROUND(AVG(bounce_rate)) numBounceRate,
					SEC_TO_TIME(AVG(time_onSite)) numVisitDuration,
					SUM(unique_visitor) numUniqueVisitor,					
					date_d 

				FROM `ga_daily_data`
				WHERE 1 {$dateFilter}";
			// pr($sql);
		// $this->apps->open(1);// this how to use other server data
		$qData = $this->apps->fetch($sql);
		return $qData;
	}
	
	function gaNumberVisitor(){
		global $CONFIG;

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d DESC";
		//pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return false;
		array_reverse($qData);
		if($this->dateFilter){
			$qData = $this->hackDateGapofDailyChart($qData,false,$this->startdate,$this->enddate,array('visits'));
		}else{
			$qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('visits'));
		}

		$data = false;
		// foreach ($qData as $val){
		// 	//visit daily data
		// 	$data['data']['categories'][] = date('d/m/Y',strtotime($val['date_d']));
		// 	$data['data']['data'][] = intval($val['visits']);
		// 	$data['data']['title'] = "&nbsp; NUMBER OF VISITOR";
		// 	$data['data']['data_title'] = "Visitors";
			
		// }

		foreach ($qData as $key => $value) {
			$data[] = array((strtotime(date('Y-m-d h:i:s',strtotime($value['date_d']." 00:00:00")))*1000),intval($value['visits']));
		}

		$result['daily'] = $data;
		return $result;
	}

	function gaUniqueVisitor(){
		global $CONFIG;

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d DESC";
		//pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return false;
		array_reverse($qData);

		if($this->dateFilter){
			$qData = $this->hackDateGapofDailyChart($qData,false,$this->startdate,$this->enddate,array('unique_visitor'));
		}else{
			$qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('unique_visitor'));
		}
		

		$data = false;
		// foreach ($qData as $val){
		// 	//unique visitors daily data
		// 	$data['data']['categories'][] = date('d/m/Y',strtotime($val['date_d']));
		// 	$data['data']['data'][] = intval($val['unique_visitor']);
		// 	$data['data']['title'] = "&nbsp; UNIQUE VISITOR";
		// 	$data['data']['data_title'] = "Unique visitors";
			
		// }

		// return $data;
		foreach ($qData as $key => $value) {
			$data[] = array((strtotime(date('Y-m-d h:i:s',strtotime($value['date_d']." 00:00:00")))*1000),intval($value['unique_visitor']));
		}

		$result['daily'] = $data;
		return $result;
	}

	function gaPageView(){
		global $CONFIG;

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d DESC";
		//pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return false;
		array_reverse($qData);

		if($this->dateFilter){
			$qData = $this->hackDateGapofDailyChart($qData,false,$this->startdate,$this->enddate,array('page_views'));
		}else{
			$qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('page_views'));
		}

		// $qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('page_views'));

		// $data = false;
		// foreach ($qData as $val){
		// 	//page view/visit daily data
		// 	//$data['data']['page_views'][$val['date_d']] = $val['page_views'];
		// 	$data['data']['categories'][] = date('d/m/Y',strtotime($val['date_d']));
		// 	$data['data']['data'][] = intval($val['page_views']);
		// 		$data['data']['title'] = "&nbsp; PAGE VIEW";
		// 		$data['data']['data_title'] = "Page views";
			
		// }

		// return $data;

		foreach ($qData as $key => $value) {
			$data[] = array((strtotime(date('Y-m-d h:i:s',strtotime($value['date_d']." 00:00:00")))*1000),intval($value['page_views']));
		}

		$result['daily'] = $data;
		return $result;
	}
	function gaPageVisit(){
		global $CONFIG;

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d DESC";
		//pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return false;
		array_reverse($qData);

		if($this->dateFilter){
			$qData = $this->hackDateGapofDailyChart($qData,false,$this->startdate,$this->enddate,array('sessions'));
		}else{
			$qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('sessions'));
		}
		
		// $qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('visits'));

		// $data = false;
		// foreach ($qData as $val){
		// 	//page view/visit daily data
		// 	//$data['data']['visits'][$val['date_d']] = $val['visits'];
		// 	$data['data']['categories'][] = date('d/m/Y',strtotime($val['date_d']));
		// 	$data['data']['data'][] = intval($val['page_views']);
		// 		$data['data']['title'] = "&nbsp; PAGE VIEW";
		// 		$data['data']['data_title'] = "Page views";
			
		// }

		// return $data;

		foreach ($qData as $key => $value) {
			$data[] = array((strtotime(date('Y-m-d h:i:s',strtotime($value['date_d']." 00:00:00")))*1000),intval($value['sessions']));
		}

		$result['daily'] = $data;
		return $result;
	}
	function gaBounceRateDaily(){
		global $CONFIG;

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d DESC";
		//pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return false;
		array_reverse($qData);
		// $qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('bounce_rate'));

		// $data = false;
		// foreach ($qData as $val){
		// 	$data['data']['categories'][] = date('d/m/Y',strtotime($val['date_d']));
		// 	$data['data']['data'][] = intval($val['bounce_rate']);
		// 		$data['data']['title'] = "&nbsp; BOUNCE RATE";
		// 		$data['data']['data_title'] = "Bounce rate";
		// 		$data['data']['suffix'] = "%";
			
		// }

		// return $data;

		if($this->dateFilter){
			$qData = $this->hackDateGapofDailyChart($qData,false,$this->startdate,$this->enddate,array('bounce_rate'));
		}else{
			$qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('bounce_rate'));
		}

		foreach ($qData as $key => $value) {
			$data[] = array((strtotime(date('Y-m-d h:i:s',strtotime($value['date_d']." 00:00:00")))*1000),intval($value['bounce_rate']));
		}

		$result['daily'] = $data;
		return $result;
	}

	function gaPercentNewSessions(){
		global $CONFIG;

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d DESC";
		//pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return false;
		array_reverse($qData);

		// $qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('new_users','visits'));

		// $data = false;
		// foreach ($qData as $val){
		// 	$data['data']['categories'][] = date('d/m/Y',strtotime($val['date_d']));
		// 	$data['data']['data'][] = round(((intval($val['new_users'])/intval($val['visits']))*100),2);
		// 		$data['data']['title'] = "&nbsp; % new visits";
		// 		$data['data']['data_title'] = "% new visits";
		// 		$data['data']['suffix'] = "%";
			
		// }

		// return $data;
		if($this->dateFilter){
			$qData = $this->hackDateGapofDailyChart($qData,false,$this->startdate,$this->enddate,array('new_users','visits'));
		}else{
			$qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('new_users','visits'));
		}

		foreach ($qData as $key => $value) {
			$data[] = array((strtotime(date('Y-m-d h:i:s',strtotime($value['date_d']." 00:00:00")))*1000),round(((intval($value['new_users'])/intval($value['visits']))*100),2));
		}

		$result['daily'] = $data;
		return $result;
	}

	function gaReturnNewVisitor(){
		global $CONFIG;

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d DESC";
		// pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return false;
		array_reverse($qData);

		if($this->dateFilter){
			$qData = $this->hackDateGapofDailyChart($qData,false,$this->startdate,$this->enddate,array('new_users','visits'));
		}else{
			$qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('new_users','visits'));
		}


		$data = false;
		foreach ($qData as $val){
			$data['data']['categories'][] = date('d/m/Y',strtotime($val['date_d']));
			$data['data']['data'][0]['name']='Returning Visitors';
			$data['data']['data'][0]['color']='#fca31d';
			//$data['data']['data'][0]['data'][]=intval($val['visits'])-intval($val['new_users']);
			$data['data']['data'][0]['data'][]=array((strtotime(date('Y-m-d h:i:s',strtotime($val['date_d']." 00:00:00")))*1000),intval($val['visits'])-intval($val['new_users']));
			$data['data']['data'][1]['name']='New Visitors';
			//$data['data']['data'][1]['data'][]=intval($val['new_users']);
			$data['data']['data'][1]['data'][]=array((strtotime(date('Y-m-d h:i:s',strtotime($val['date_d']." 00:00:00")))*1000),intval($val['new_users']));
		}

		return $data;
	}

	function gaAvgSessionDuration(){
		global $CONFIG;

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d DESC";
		//pr($sql);
		$qData = $this->apps->fetch($sql,1);
		if(!$qData) return false;
		array_reverse($qData);

		// $qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('session_duration','visits'));

		// $data = false;
		// foreach ($qData as $val){
		// 	$data['data']['categories'][] = date('d/m/Y',strtotime($val['date_d']));
		// 	$data['data']['data'][] = round(($val['session_duration']/$val['visits']));
		// 		$data['data']['title'] = "&nbsp; Average Visit Duration";
		// 		$data['data']['data_title'] = "Average Visit Duration (seconds)";
			
		// }

		// return $data;

		if($this->dateFilter){
			$qData = $this->hackDateGapofDailyChart($qData,false,$this->startdate,$this->enddate,array('session_duration','visits'));
		}else{
			$qData = $this->hackDateGapofDailyChart($qData,false,null,null,array('session_duration','visits'));
		}

		foreach ($qData as $key => $value) {
			$data[] = array((strtotime(date('Y-m-d h:i:s',strtotime($value['date_d']." 00:00:00")))*1000),round(($value['session_duration']/$value['visits'])));
		}

		$result['daily'] = $data;
		return $result;
	}

	function gaDataChart(){
		global $CONFIG;
$dateFilter="";
	// pr($this->startdate);
		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}
		// pr($dateFilter);die; 
		$sql = "SELECT * FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_data 
				WHERE 1 {$dateFilter} 
				ORDER BY date_d ASC ,page_views ASC";
		// pr($sql);die; 
		$qData = $this->apps->fetch($sql,1);
		// pr($qData);die;
		if(!$qData) return false;
		array_reverse($qData);
		$data = false;
		foreach ($qData as $val){

			
			$data['data']['time_onSite'][$val['date_d']] = $val['time_onSite'];
			$data['data']['visitDuration'][$val['date_d']] = $val['visitDuration'];
			$data['data']['time_onPage'][$val['date_d']] = $val['time_onPage'];
			$data['data']['time_onSite'][$val['date_d']] = $val['time_onSite'];
			$data['data']['visit'][$val['date_d']] = $val['visits'];
				$data['data']['new_users'][$val['date_d']] = $val['unique_visitor'];
					$data['data']['sessions'][$val['date_d']] = $val['sessions'];
			$data['data']['bounce_rate'][$val['date_d']] = $val['bounce_rate'];
			$data['data']['page_views'][$val['date_d']] = $val['page_views'];
			
		}
		return $data;
	}
	
	
	function gaAllDeviceData(){
		global $CONFIG;

		//default
		$start=0;
		$limit=20;
		$sort='total';
		$order='DESC';
		$default=true;
		$dateFilter="";
		$limit_str = "LIMIT {$limit}";
		

		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}

		$sql = "SELECT SUM( visits ) total, device
				FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_device_all_data WHERE 1 {$dateFilter}
				GROUP BY device 
				ORDER BY {$sort} {$order} {$limit_str}";
		$rs = $this->apps->fetch($sql,1);
		 //pr($sql);
		
		if($rs) return array('status'=>1,'message'=>'Success','data'=>$rs,'filter_variable'=>array('device','total'));
		else return array('status'=>0,'message'=>'No Data');
	}
	
	function gaBrowserList(array $conditional){
		global $CONFIG;

		//default
		$start=0;
		$limit=20;
		$sort='total';
		$order='DESC';
		$default=true;

		$limit_str = "LIMIT {$limit}";
		if($conditional['widget_xls']) $limit_str = '';
		if($conditional['filter']){
			if($conditional['limit']>0){
				$limit = $conditional['limit'];
				$limit_str = "LIMIT {$limit}";
			}
			if($conditional['filter']) $sort = $conditional['filter'];
			if($_SESSION['gaBrowserList']['order']=='DESC'){
				$_SESSION['gaBrowserList']['order']='ASC';
			}else{
				$_SESSION['gaBrowserList']['order']='DESC';
			}
			$order = $_SESSION['gaBrowserList']['order'];
		}


		if($this->dateFilter){
			$dateFilter="AND date_d BETWEEN '{$this->startdate}' AND '{$this->enddate}'";
		}

		$sql = "SELECT SUM( visits ) total, browser
				FROM {$CONFIG['DATABASE_REPORTS']}.ga_daily_browser_data WHERE 1 {$dateFilter}
				GROUP BY browser 
				ORDER BY {$sort} {$order} {$limit_str}";
		//pr($sql);exit;
		$rs = $this->apps->fetch($sql,1);
		
		
		if($rs) return array('status'=>1,'message'=>'Success','data'=>$rs,'filter_variable'=>array('browser','total'));
		else return array('status'=>0,'message'=>'No Data');
	}
}

?>