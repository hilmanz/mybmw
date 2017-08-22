<?php
class edituser extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('localpublicasset',$CONFIG['LOCAL_PUBLIC_ASSET']);
		$this->uploadHelper = $this->useHelper("uploadHelper"); 
		$this->loginHelper = $this->useHelper("loginHelper");
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));			
	}
	function main(){
		global $LOCALE,$CONFIG;
		$ENC_KEY='youknowwho2014';
		if('' !==$this->_p('btn_submit')){					
			$data['first_name'] = $this->_p('first_name');
			$data['last_name'] = $this->_p('last_name');
			$data['username'] = $this->_p('username');
			$data['email'] = $this->_p('email');
			$data['role_id'] = $this->_p('role');		
			$data['share'] = @$_POST['share'];
			$data['password'] =  base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $this->_p('password'), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
			$data['id'] = $this->_p('id');
			$this->userHelper->editUsers($data);
			sendRedirect($CONFIG['ADMIN_DOMAIN'] .'usermanagement');
		}else{
			if(null !== $this->_g('id')){
				$roles = $this->userHelper->getRole();
				$userid = $this->_g('id');
				$data = $this->userHelper->getUser($userid);
				$this->assign('first_name',$data['first_name']);
				$this->assign('last_name',$data['last_name']);
				$this->assign('username',$data['username']);
				$this->assign('email',$data['email']);
				$this->assign('password',$data['password']);
				$this->assign('role_id',$data['role_id']);
				$this->assign('id',$userid);
				$this->assign('roles',$roles);
				return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/edituser.html');
			}else{
				//id not found
				sendRedirect($CONFIG['ADMIN_DOMAIN'] .'usermanagement');
			}
		}										
	}			
}
?>