<?php
class deleteuser extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG;
		$this->uploadHelper = $this->useHelper("uploadHelper"); 
		$this->loginHelper = $this->useHelper("loginHelper");		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));			
	}
	function main(){
		global $LOCALE,$CONFIG;		
		$time['time'] = '%H:%M:%S';
		if(null !== $this->_g('id')){
			$userid = $this->_g('id');
			$this->userHelper->deleteUser($userid);
		}
		sendRedirect($CONFIG['ADMIN_DOMAIN'] .'usermanagement');		
	}		
}
?>