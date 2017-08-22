<?php
class login extends App {

	function beforeFilter() {
		$this -> loginHelper = $this -> useHelper('loginHelper');
	}

	function main() {
		$this -> local();
	}

	function local() {
		global $CONFIG, $logger;
		$basedomain = $CONFIG['ADMIN_DOMAIN'];
		$this -> assign('basedomain', $basedomain);		
		if ($this -> _p('username') && $this -> _p('password')) {
			$res = $this -> loginHelper -> loginSession();
			if ($res) {
				$this -> log('login', 'welcome');
				$this -> assign("msg", "login-in.. please wait");
				$this -> assign("link", "{$CONFIG['ADMIN_DOMAIN']}{$CONFIG['DINAMIC_MODULE']}");
				sendRedirect("{$CONFIG['ADMIN_DOMAIN']}dashboard");
				return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
				die();
			}
		}
		$this -> assign("msg", "failed to login..");
		print $this -> View -> toString(TEMPLATE_DOMAIN_ADMIN . 'login.html');
		exit ;
	}

}
?>