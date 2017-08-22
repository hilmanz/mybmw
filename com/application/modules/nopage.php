<?php
class nopage extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages','video');		
		$this->assign('navigation',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/navigation.html"));
		$this->assign('footer',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/footer.html"));
	}

	function main(){
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
				
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/404.html');	
	}	
}
?>
