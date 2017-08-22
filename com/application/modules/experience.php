<?php
class experience extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->destinationHelper = $this->useHelper('destinationHelper');				
		$menugetDestinations = $this->destinationHelper->menugetDestinations();
		$this->assign('menugetDestinations', $menugetDestinations);	
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages','experience');		
	}

	function main(){
		$time['time'] = '%H:%M:%S';
				
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/experience.html');	
	}	
}
?>