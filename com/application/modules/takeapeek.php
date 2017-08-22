<?php
class takeapeek extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->destinationHelper = $this->useHelper('destinationHelper');				
		$menugetDestinations = $this->destinationHelper->menugetDestinations();
		$this->assign('menugetDestinations', $menugetDestinations);				
				
		$listdestination = $this->destinationHelper->getDestinations();
		$this->assign('listdestination', $listdestination);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages','takeapeek');		
		$this->assign('navigation',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/navigation.html"));
		$this->assign('footer',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/footer.html"));
	}

	function main(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
				
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/takeapeekdetail.html');	
	}	
}
?>
