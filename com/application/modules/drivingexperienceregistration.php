<?php
class drivingexperienceregistration extends App{		
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
				global $LOCALE,$CONFIG;
	
		$time['time'] = '%H:%M:%S';
		
		if('' !==$this->_p('btn_submit')){
			/* $data['salutation'] = $this->_p('salutation'); */
			$data['firstname'] = $this->_p('firstname');
			$data['lastname'] = $this->_p('lastname');
			$data['email'] = $this->_p('email');
			$data['phone'] = $this->_p('phone'); 
			$data['newsletter'] = $this->_p('newsletter');
			$data['privacy'] = $this->_p('privacy');
			$data['tanggalsubmit'] = date("Y-m-d H:i:s");
			/* $data['address'] = $this->_p('address'); */
			/* $data['city'] = $this->_p('city'); */
			$data['vehicle'] = $this->_p('vehicle');
			foreach($data as $key=>$each){
				if($each==null){
					unset($data[$key]);
				}
			}
			// pr($_POST);
			// pr($data);
			$result= $this->registrationHelper->addRegistrationcrul($data);
			
			if($result)
			{
				if($this->_p('ajax')==1)
				{
					print_r(json_encode(array('status'=>1,'msg'=>'sucksess')));die;
				}
				else
				{
						sendRedirect("{$CONFIG['BASE_DOMAIN']}missionimpossible");
						return $this->out(TEMPLATE_DOMAIN_ADMIN . '/login_message.html');
						die();
				}
			}
			else
			{
				if($this->_p('ajax')==1)
				{
					print_r(json_encode(array('status'=>0,'msg'=>'proses gagal ulangi')));die;
				}
				
			}
			//pr('sss');die;
		}
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/drivingexperienceregistration.html');	
	}	
}
?>