<?php
class registration extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG;
		$this->registrationHelper = $this->useHelper("registrationHelper"); 
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages','registration');	
		$this->assign('navigation',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/navigation.html"));
		$this->assign('footer',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/footer.html"));	
	}

	function main(){
				
		
		$time['time'] = '%H:%M:%S';
		if('' !==$this->_p('btn_submit')){
			$data['salutation'] = $this->_p('salutation');
			$data['firstname'] = $this->_p('firstname');
			$data['lastname'] = $this->_p('lastname');
			$data['email'] = $this->_p('email');
			$data['phone'] = $this->_p('phone');
			$data['newsletter'] = $this->_p('newsletter');
			$data['privacy'] = $this->_p('privacy');
			
			foreach($data as $key=>$each){
				if($each==null){
					unset($data[$key]);
				}
			}
			$this->registrationHelper->addRegistration($data);
		}
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/registration.html');	
	}	
}
?>