<?php
class adduser extends App{		
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
		$ENC_KEY='youknowwho2014';
		$role = $this->userHelper->getRole();
		
		$this->assign('roles',$role);
		if('' !==$this->_p('btn_submit')){									
			$data['first_name'] = $this->_p('first_name');
			$data['last_name'] = $this->_p('last_name');
			$data['username'] = $this->_p('username');
			$data['email'] = $this->_p('email');
			$data['role_id'] = $this->_p('role');			
			$data['password'] =  base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $this->_p('password'), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
			
			
			$this->userHelper->addUser($data);
			sendRedirect($CONFIG['ADMIN_DOMAIN'] .'usermanagement');
			die;
		}
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/adduser.html');			
	}		
}
?>