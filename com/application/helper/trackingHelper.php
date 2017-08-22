<?php
class trackingHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	
	function tracking(){
	global $CONFIG;
	
	//pr($_POST['linkname']);die;
	$linkname=$_POST['linkname'];
		
		
	if($linkname)
	{
	$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.tracking_log
				SET link_name='{$linkname}', date=NOW()
			";
			
	$res = $this->apps->query($sql);
	return true;
	}else{
	return false;
	}
	
	}
	
}
	