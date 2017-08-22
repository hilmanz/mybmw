<?php

include_once "db.php";
include_once "gapi/gapi.class.php";
set_time_limit(100);
class ga_bot extends db{

	var $gaData;
	var $ga_email;
	var $ga_password;
	var $ga_profile;

	function __construct(){
		global $CONFIG;
		$this->DB = $CONFIG['DATABASE_REPORTS'];
		// $this->DB = "marlboro_pursuit_2013";
		$this->ga_email = 'kana.digital@gmail.com';
		$this->ga_password = 'Kana9i8u';
		$this->ga_profile = '98133719';
		$this->init_ga();
		sleep(1);
		$this->init_ga_OS();
		sleep(1);
		$this->init_ga_browser();

	}



	function init_ga(){
		$ga = new gapi($this->ga_email,$this->ga_password);
		$ga->requestReportData($this->ga_profile,array('date','deviceCategory'),array('sessionDuration','pageviews','timeOnPage','sessions','bounces','exits','visitors','newUsers'), array('date'),null,
				date('2015-03-01'), // Start Date
				date("Y-m-d"), // End Date 
				1,  // Start Index
				500 // Max results
		);
		// echo"<pre>";
	 
		foreach ($ga->getResults() as $result){
				$this->gaRaw[date('Y-m-d',strtotime($result->getDate()))][$result->getDeviceCategory()] = array(
				'pageViews'=>$result->getPageviews(),
				'visits'=>$result->getSessions(),
				'timeOnSite'=>$result->getSessionDuration(),				
				'timeOnPage'=>$result->getTimeOnPage(),			
				'exits'=>$result->getExits(),			
				'bounces'=>$result->getBounces(),
				'uniqueVisitors'=>$result->getVisitors(),
				'newUsers'=>$result->getNewUsers(),
				'sessionDuration'=>$result->getSessionDuration(),
				'sessions'=>$result->getSessions()
				 );
				$this->gaDataDevice[date('Y-m-d',strtotime($result->getDate()))][$result->getDeviceCategory()] = $result->getSessions();
		}
		 // print_r($this->gaRaw);die;
		foreach ($this->gaRaw as $key => $value) {
			$pageViews=0;$visits=0;$timeOnSite=0;$timeOnPage=0;$exits=0;$bounces=0;$uniqueVisitors=0;$newUsers=0;$sessionDuration=0;$sessions=0;
			if($value['desktop']){
				$pageViews += $value['desktop']['pageViews'];
				$visits += $value['desktop']['visits'];
				$timeOnSite += $value['desktop']['timeOnSite'];
				$timeOnPage += $value['desktop']['timeOnPage'];
				$exits += $value['desktop']['exits'];
				$bounces += $value['desktop']['bounces'];
				$uniqueVisitors += $value['desktop']['uniqueVisitors'];
				$newUsers += $value['desktop']['newUsers'];
				$sessions += $value['desktop']['sessions'];
				$sessionDuration += $value['desktop']['sessionDuration'];
			}
			if(@$value['mobile']){
				$pageViews += $value['mobile']['pageViews'];
				$visits += $value['mobile']['visits'];
				$timeOnSite += $value['mobile']['timeOnSite'];
				$timeOnPage += $value['mobile']['timeOnPage'];
				$exits += $value['mobile']['exits'];
				$bounces += $value['mobile']['bounces'];
				$uniqueVisitors += $value['mobile']['uniqueVisitors'];
				$newUsers += $value['mobile']['newUsers'];
				$sessions += $value['mobile']['sessions'];
				$sessionDuration += $value['mobile']['sessionDuration'];
			}
			if(@$value['tablet']){
				$pageViews += $value['tablet']['pageViews'];
				$visits += $value['tablet']['visits'];
				$timeOnSite += $value['tablet']['timeOnSite'];
				$timeOnPage += $value['tablet']['timeOnPage'];
				$exits += $value['tablet']['exits'];
				$bounces += $value['tablet']['bounces'];
				$uniqueVisitors += $value['tablet']['uniqueVisitors'];
				$newUsers += $value['tablet']['newUsers'];
				$sessions += $value['tablet']['sessions'];
				$sessionDuration += $value['tablet']['sessionDuration'];
			}


			$this->gaData[$key]=array(
				'page_views'=>$pageViews,
				'visits'=>$visits,
				'visitDuration'=>$timeOnSite,				
				'time_onPage'=>@round($timeOnPage/($pageViews - $exits)),
				'bounce_rate'=>@round(($bounces/$visits) *100),
				'unique_visitor'=>($uniqueVisitors),
				'new_users'=>($newUsers),
				'sessions'=>($sessions),
				'session_duration'=>($sessionDuration),
				'time_onSite'=>@round($timeOnSite/$visits)
			);
		}
		
	 

	}

function init_ga_OS(){
		$ga = new gapi($this->ga_email,$this->ga_password);
		$ga->requestReportData($this->ga_profile,array('date','operatingSystem'),array('sessionDuration','pageviews','timeOnPage','sessions','bounces','exits','visitors','newUsers'), array('date'),null,
				date('2015-03-01'), // Start Date
				date("Y-m-d"), // End Date
				1,  // Start Index
				500 // Max results
		);

		foreach ($ga->getResults() as $result){
				 
				$this->gaDataDeviceAll[date('Y-m-d',strtotime($result->getDate()))][$result->getOperatingSystem()] = $result->getSessions();
		}
	 

	}

	
	function init_ga_browser(){
		$ga = new gapi($this->ga_email,$this->ga_password);
		$ga->requestReportData($this->ga_profile,array('date','browser'),array('sessionDuration','pageviews','timeOnPage','sessions','bounces','exits','visitors','newUsers'), array('date'),null,
				date('2015-03-01'), // Start Date
				date("Y-m-d"), // End Date
				1,  // Start Index
				500 // Max results
		);

		foreach ($ga->getResults() as $result){
				 
				$this->gaDataBrowserAll[date('Y-m-d',strtotime($result->getDate()))][$result->getBrowser()] = $result->getSessions();
		}
		 
		// print_r('<pre>');
		// print_r($this->gaDataDeviceAll);
	 
		  
		 // exit;

	}


	function insertDataGa(){
		$datas = $this->gaData;
		
		$devicedatas = $this->gaDataDevice;
		if($datas){
		$this->setSocketDB(0);
			foreach($datas as $key => $val){
			
			// tbl_ga_average_page_view_daily
				$gaDataQuery = "
				INSERT INTO {$this->DB}.ga_daily_data (page_views, visits, visitDuration, time_onPage, bounce_rate, unique_visitor, time_onSite,  date_d,  new_users,  sessions,  session_duration) VALUES ({$val['page_views']},{$val['visits']},{$val['visitDuration']},{$val['time_onPage']},{$val['bounce_rate']},{$val['unique_visitor']},{$val['time_onSite']},'{$key}',{$val['new_users']},{$val['sessions']},{$val['session_duration']}) ON DUPLICATE KEY UPDATE page_views={$val['page_views']},visits={$val['visits']},visitDuration={$val['visitDuration']},time_onPage={$val['time_onPage']},bounce_rate={$val['bounce_rate']},unique_visitor={$val['unique_visitor']},time_onSite={$val['time_onSite']},new_users={$val['new_users']},sessions={$val['sessions']},session_duration={$val['session_duration']};
				";
				// echo"<pre>";print_r($gaDataQuery);
				$gaData = $this->query($gaDataQuery);
				// tbl_ga_time_on_site_daily num, date_d
			
				if($gaData) $data['gaData'][] ="success";
				else $data['gaData'][] ="failed".$gaDataQuery;
				
				$sql[] = $gaDataQuery;
			}
		}else $data[]='there is not left data of GA';
		
		if($devicedatas){
			$this->setSocketDB(0);
			foreach($devicedatas as $datetimes => $devicedata){
				foreach($devicedata as $key => $val){
				// tbl_ga_average_page_view_daily
					$gaDataQuery = "
					INSERT INTO {$this->DB}.ga_daily_device_data ( visits , device, date_d) VALUES ( {$val},'{$key}','{$datetimes}') ON DUPLICATE KEY UPDATE  visits={$val},device='{$key}' ;
					";
					$gaData = $this->query($gaDataQuery);
					// tbl_ga_time_on_site_daily num, date_d
				
					if($gaData) $data['gaData'][] ="success";
					else $data['gaData'][] ="failed".$gaDataQuery;
					
					$sql[] = $gaDataQuery;
				}
			}
		}else $data[]='there is not left data DEVICE of GA';
		print_r('<pre>');print_r($data);
		// print_r (array( 0 => implode("; ",$sql)));
		// print "
		// ";
	}
	function insertDataGaAllDevice(){
	 
		$devicedatas = $this->gaDataDeviceAll;
		 
		if($devicedatas){
			$this->setSocketDB(0);
			foreach($devicedatas as $datetimes => $devicedata){
				foreach($devicedata as $key => $val){
				// tbl_ga_average_page_view_daily
					$gaDataQuery = "
					INSERT INTO {$this->DB}.ga_daily_device_all_data ( visits , device, date_d) VALUES ( {$val},'{$key}','{$datetimes}') ON DUPLICATE KEY UPDATE  visits={$val},device='{$key}' ;
					";
					$gaData = $this->query($gaDataQuery);
					// tbl_ga_time_on_site_daily num, date_d
				
					if($gaData) $data['gaData'][] ="success";
					else $data['gaData'][] ="failed".$gaDataQuery;
					
					$sql[] = $gaDataQuery;
				}
			}
		}else $data[]='there is not left data DEVICE of GA';
		print_r('<pre>');print_r($data);
		// print_r (array( 0 => implode("; ",$sql)));
		// print "
		// ";
	}
	
	function insertDataGaAllBrowser(){
	 
		$browserdatas = $this->gaDataBrowserAll;
		 
		if($browserdatas){
			$this->setSocketDB(0);
			foreach($browserdatas as $datetimes => $browserdata){
				foreach($browserdata as $key => $val){
				// tbl_ga_average_page_view_daily
					$gaDataQuery = "
					INSERT INTO {$this->DB}.ga_daily_browser_data ( visits , browser, date_d) VALUES ( {$val},'{$key}','{$datetimes}') ON DUPLICATE KEY UPDATE  visits={$val},browser='{$key}' ;
					";
					$gaData = $this->query($gaDataQuery);
					// tbl_ga_time_on_site_daily num, date_d
				
					if($gaData) $data['gaData'][] ="success";
					else $data['gaData'][] ="failed".$gaDataQuery;
					
					$sql[] = $gaDataQuery;
				}
			}
		}else $data[]='there is not left data Browser of GA';
		print_r('<pre>');print_r($data);
	 
	}
}

$class = new ga_bot;
$class->insertDataGa();
$class->insertDataGaAllDevice();
$class->insertDataGaAllBrowser();
die();



?>