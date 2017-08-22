<?php
class tracking extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->viewcountHelper = $this->useHelper('viewcountHelper');				
	
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages','home');		
		$this->assign('navigation',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/navigation.html"));
		$this->assign('footer',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/footer.html"));
	}

	function main(){
		global $LOCALE,$CONFIG; 
		$time['time'] = '%H:%M:%S';
		if($this->_p('typenya')=='1')
		{
		$testdrive=$this->viewcountHelper->testdrive();
		if($testdrive)
		{
				print json_encode(array('status'=>true));
			die;
		}
		}
		
		if($this->_p('typenya')=='2')
		{
		$twittertrack=$this->viewcountHelper->twittertrack();
		if($twittertrack)
		{
				print json_encode(array('status'=>true));
			die;
		}
		}
		if($this->_p('typenya')=='3')
		{
		$downloadtrack=$this->viewcountHelper->downloadtrack();
		if($downloadtrack)
		{
				print json_encode(array('status'=>true));
			die;
		}
		}
		if($this->_p('typenya')=='4')
		{
		$registertrack=$this->viewcountHelper->registertrack();
		if($registertrack)
		{
				print json_encode(array('status'=>true));
			die;
		}
		}
			if($this->_p('typenya')=='6')
		{
		$jointhetour=$this->viewcountHelper->jointhetour();
		if($jointhetour)
		{
				print json_encode(array('status'=>true));
			die;
		}
		}
		
	}
		
		
	
	
}
?>
