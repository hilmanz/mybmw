<?php
class programs extends App{
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->destinationHelper = $this->useHelper('destinationHelper');
		$menugetDestinations = $this->destinationHelper->menugetDestinations();
		$this->assign('menugetDestinations', $menugetDestinations);		
		$listdestination = $this->destinationHelper->getDestinations();
		
		$this->trackingHelper = $this->useHelper('trackingHelper');
		$this->assign('pages','programs');		
		$this->assign('listdestination', $listdestination);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('navigation',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/navigation.html"));
		$this->assign('footer',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/footer.html"));
	}

	function main(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/promotion.html');
	}

	function BMW5Series(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/BMW5SeriesDriveMove.html');
	}
	//
	// function BMWX1(){
	// 	$time['time'] = '%H:%M:%S';
	// 	// echo"Ssss";die;
	// 	return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/BMW_X1.html');
	// }
	function BMWATGT(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/BMW_X1.html');
	}
	function NationalPromo(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/NationalPromo.html');
	}
	function GIIAS2016(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/giias2016.html');
	}
	function THEBMWX1(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/THEBMWX1.html');
	}

	function  BMW3Series(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/BMW3Series.html');
	}

	function  BMW3SeriesBestindo(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/BMW3SeriesBestindo.html');
	}
	
	function tracking(){
			
		$trackingList = $this->trackingHelper->tracking();
		//$testdrive=$this->viewcountHelper->testdrive();
		
		if($trackingList==true){
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}

}
?>
