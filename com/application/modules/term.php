<?php
class term extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages','term');		
	}

	function main(){
		$time['time'] = '%H:%M:%S';
				
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/term.html');	
	}	
}
?>