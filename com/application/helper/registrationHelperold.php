<?php
class registrationHelper{
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){			
			$this->login = true;	
		}
	}
	function addRegistration($data){
		$field = '';
		$value = '';
		foreach($data as $key=>$each){
			$field = $field.$key.',';
			if(is_numeric($each)){
				$value = $value.$each.',';
			}else{
				$value = $value.'\''.$each.'\',';
			}
			
		}
		$field = substr($field,0,-1);
		$value = substr($value,0,-1);
		
		$sql = "INSERT INTO registration ($field) VALUE ($value)";
		$this->logger->log($sql);
		$this->apps->query($sql);
	}
}
?>