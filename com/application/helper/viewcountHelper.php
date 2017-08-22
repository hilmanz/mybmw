<?php
class viewcountHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	function jointhetour(){
		global $CONFIG;
		$id = intval($this->apps->_request('typenya'));
		$array=array();
		
		if(@$_COOKIE['jointhetour'])
		{
	
			$tmp= unserialize($_COOKIE['jointhetour']);
		
			if(in_array($id,unserialize($_COOKIE['jointhetour'])))
			{
				return true;
			}
			else
			{
				
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("jointhetour", $arry,  time()+86400);
				
				
				$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
				
				
				$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=6
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
				
				
				return true;
			}
		}
		else
		{

			$array[]=$id;
			$arry=serialize($array);
			setcookie("jointhetour", $arry,  time()+86400);
			
			
			$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
			";
			//pr($sql);exit;
			$res = $this->apps->query($sql);
			
			
			$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=6
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
			return true;
		}
		
		return true;
		
		}	
		function testdrive(){
		global $CONFIG;
		$id = intval($this->apps->_request('typenya'));
		$array=array();
		
		if(@$_COOKIE['testdrive'])
		{
	
			$tmp= unserialize($_COOKIE['testdrive']);
		
			if(in_array($id,unserialize($_COOKIE['testdrive'])))
			{
				return true;
			}
			else
			{
				
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("testdrive", $arry,  time()+86400);
				
				
				$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
				
				
				$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=1
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
				
				
				return true;
			}
		}
		else
		{

			$array[]=$id;
			$arry=serialize($array);
			setcookie("testdrive", $arry,  time()+86400);
			
			
			$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
			";
			//pr($sql);exit;
			$res = $this->apps->query($sql);
			
			
			$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=1
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
			return true;
		}
		
		return true;
		
		}	
	function twittertrack(){
		global $CONFIG;
		$id = intval($this->apps->_request('typenya'));
		$array=array();
		
		if(@$_COOKIE['twittertrack'])
		{
	
			$tmp= unserialize($_COOKIE['twittertrack']);
		
			if(in_array($id,unserialize($_COOKIE['twittertrack'])))
			{
				return true;
			}
			else
			{
				
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("twittertrack", $arry,  time()+86400);
				
				
				$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
				";
				//pr($sql);exit;
				$res = $this->apps->query($sql);
				$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=2
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
				return true;
			}
		}
		else
		{

			$array[]=$id;
			$arry=serialize($array);
			setcookie("twittertrack", $arry,  time()+86400);
			
			
			$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
			";
			//pr($sql);exit;
			$res = $this->apps->query($sql);
			$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=2
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
			
			return true;
		}
		
		return true;
		
		}	
		function downloadtrack(){
		global $CONFIG;
		$id = intval($this->apps->_request('typenya'));
		$array=array();
		
		if(@$_COOKIE['downloadtrack'])
		{
	
			$tmp= unserialize($_COOKIE['downloadtrack']);
		
			if(in_array($id,unserialize($_COOKIE['downloadtrack'])))
			{
				return true;
			}
			else
			{
				
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("downloadtrack", $arry,  time()+86400);
				
				
				$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
				";
				//pr($sql);exit;
				$res = $this->apps->query($sql);
				
				$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=3
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
				return true;
			}
		}
		else
		{

			$array[]=$id;
			$arry=serialize($array);
			setcookie("downloadtrack", $arry,  time()+86400);
			
			
			$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
			";
			//pr($sql);exit;
			$res = $this->apps->query($sql);
			
			
				$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=3
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
			return true;
		}
		
		return true;
		
		}	
		function registertrack(){
		global $CONFIG;
		$id = intval($this->apps->_request('typenya'));
		$array=array();
		
		if(@$_COOKIE['registertrack'])
		{
	
			$tmp= unserialize($_COOKIE['registertrack']);
		
			if(in_array($id,unserialize($_COOKIE['registertrack'])))
			{
				return true;
			}
			else
			{
				
				array_push($tmp,$id);
				$arry=serialize($tmp);
				setcookie("registertrack", $arry,  time()+86400);
				
				
				$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
				";
				//pr($sql);exit;
				$res = $this->apps->query($sql);
				
				$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=4
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
				return true;
			}
		}
		else
		{

			$array[]=$id;
			$arry=serialize($array);
			setcookie("registertrack", $arry,  time()+86400);
			
			
			$sql = "insert {$CONFIG['DATABASE'][0]['DATABASE']}.sys_tracking
				SET type='{$id}', date=NOW(),n_status=1
			";
			//pr($sql);exit;
			$res = $this->apps->query($sql);
			
				$sql = "UPDATE  {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_tracking 
				SET count=count+1 where id=4
				";
				// pr($sql);exit;
				$res = $this->apps->query($sql);
			return true;
		}
		
		return true;
		
		}	
	
}
	