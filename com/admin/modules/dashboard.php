<?php
class dashboard extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->dashboardHelper = $this->useHelper("dashboardHelper"); 
		$this->googleAnalyticHelper=$this->useHelper("googleAnalyticHelper"); 
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));	
		
	}
	function main(){		
		$time['time'] = '%H:%M:%S';
		$traking= $this->dashboardHelper->getTrakingAll();
			$this->assign('traking', $traking);
		$startdate=$this->_g('startdate');
		$enddate=$this->_g('enddate');
		//ga
		$gaData = $this->googleAnalyticHelper->gaData();
		// pr($gaData);
		// $gaDataChart = $this->googleAnalyticHelper->gaDataChart();
		$data = $this->googleAnalyticHelper->gaDataChart();
		// $gaMobileChart = $this->googleAnalyticHelper->gaMobileChart();
		// $gaDesktopChart = $this->googleAnalyticHelper->gaDesktopChart();
		// $gaTabletChart = $this->googleAnalyticHelper->gaTabletChart();
		$gaAllDeviceData = $this->googleAnalyticHelper->gaAllDeviceData();
		// pr($gaAllDeviceData);die;
		$this->assign("gaData",$gaData);
		$this->assign("startdate",$startdate);
		$this->assign("enddate",$enddate);
		// $this->assign("gaDataChart",json_encode($gaDataChart)); 
		$this->assign("dataChart",$data);
		// $this->assign("gaMobileChart",$gaMobileChart);
		// $this->assign("gaDesktopChart",$gaDesktopChart);
		// $this->assign("gaTabletChart",$gaTabletChart);
		$this->assign("gaAllDeviceData",$gaAllDeviceData);
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/dashboard.html');			
	}			
}
?>