<?php
class subcribeHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	function inputSubcribe($email)
	{
		global $CONFIG;
		$query="insert into {$CONFIG['DATABASE'][0]['DATABASE']}.custom_newsletter set
				`email`='{$email}',`date`=NOW(),
				`status`='1'";
		 $qdata = $this->apps->query($query);
		 // pr($query);die;
		 $id=5;
		 $array=array();
		
		//setcookie("subscribe","");
		if(@$_COOKIE['subscribe'])
		{
	
			$tmp= unserialize($_COOKIE['subscribe']);
			
			if(in_array($id,unserialize($_COOKIE['subscribe'])))
			{
				return true;
			}
			else
			{
				
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("subscribe", $arry);
				
				
				$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='5', date=NOW(),n_status=1
				";
				//pr($sql);exit;
				$res = $this->apps->query($sql);
				
				return true;
			}
		}
		else
		{

			$array[]=$id;
			$arry=serialize($array);
			setcookie("subscribe", $arry);
			
			
			$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='5', date=NOW(),n_status=1
			";
			//pr($sql);exit;
			$res = $this->apps->query($sql);
			$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=5
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
			return true;
		}
		 return true;
	
	}
	
	
}
	