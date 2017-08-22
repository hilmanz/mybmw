<?php
class inform extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->subcribeHelper = $this->useHelper("subcribeHelper");
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('menugetDestinations', $menugetDestinations);	
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages','inform');		
	}

	function main(){
		$time['time'] = '%H:%M:%S';
				
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/inform.html');	
	}	
	function subcribe()
	{
		global $LOCALE,$CONFIG;
		$post=$this->_p('subcribe');
		if($post)
		{
			$email=$this->_p('email');
			$result=$this->subcribeHelper->inputSubcribe($email);
			echo '<script type="text/javascript">
					window.history.go(-1);
				</script>';
			die;
		}
		else
		{
			sendRedirect("{$CONFIG['BASE_DOMAIN']}home");
			die();
		}
	}
}
?>