<?php
class thankyou extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->destinationHelper = $this->useHelper('destinationHelper');	
		$this->registrationHelper = $this->useHelper("registrationHelper"); 		
		$menugetDestinations = $this->destinationHelper->menugetDestinations();
		$this->assign('menugetDestinations', $menugetDestinations);		
		$listdestination = $this->destinationHelper->getDestinations();
		$this->assign('listdestination', $listdestination);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('pages','home');		
		$this->assign('navigation',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/navigation.html"));
		$this->assign('footer',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/footer.html"));
	}

	function main(){
		//global $LOCALE,$CONFIG;	
		$time['time'] = '%H:%M:%S';
		// echo"Ssss";die;
		/* sendRedirect("{$CONFIG['BASE_DOMAIN']}missionimpossible");
		return $this->out(TEMPLATE_DOMAIN_ADMIN . '/login_message.html');
		die(); */
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/thanks.html');	
	}
	
	function adddata(){
		global $LOCALE,$CONFIG;	
		$time['time'] = '%H:%M:%S';
		
			$data['salutation'] = $this->_p('salutation');
			$data['firstname'] = $this->_p('firstname');
			$data['lastname'] = $this->_p('lastname');
			$data['email'] = $this->_p('email');
			$data['phone'] = $this->_p('phone'); 
			$data['newsletter'] = $this->_p('newsletter');
			$data['privacy'] = $this->_p('privacy');
			$data['tanggalsubmit'] = date("Y-m-d H:i:s");			
			$data['vehicle'] = $this->_p('vehicle');
			$data['drive1'] = $this->_p('drive1');
			$data['drive2'] = $this->_p('drive2');
			$data['drive3'] = $this->_p('drive3');
			$data['drive4'] = $this->_p('drive4');
			$data['drive5'] = $this->_p('drive5');
					
			//pr($data);exit;
			$addmember = $this->registrationHelper->addcustomer($data);
			//pr($data);exit;
			if($addmember){
				sendRedirect("{$CONFIG['BASE_DOMAIN']}thankyou");
			}
			
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/thanks.html');	
	}

}
?>
