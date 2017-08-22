<?php
class areatrackingHelper{
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){			
			$this->login = true;	
		}
	}
	function getArea(){
		$sql = 'SELECT id, city FROM cities';
		$this->logger->log($sql);
		$aData = $this->apps->fetch($sql,1);
		
		return $aData;
	}
	function getSales($areaId=null){
		if($areaId!=null){
			$sql = "SELECT * FROM users WHERE city_id = $areaId AND role NOT IN (2,3,4,5)";
			$this->logger->log($sql);
			$aData = $this->apps->fetch($sql,1);
			
			return $aData;
		}
		
	}
}
?>