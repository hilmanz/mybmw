<?php 
error_reporting(0);
class newsletterHelper {

	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) {
				$uid = intval($this->apps->_request('uid'));
				if($uid==0) $this->uid = intval($this->apps->user->id);
				else $this->uid = $uid;
		}

		$this->dbshema = "beat";	
		$this->topclass = array(100,4,6);
	}
	function gettotalNewsletters($search=''){
		$wseearch='';
			if($search)
			{
				$wseearch='and email like "%'.$search.'%"';
			
			}
			
			
			$sql = "
			SELECT count(*) as total FROM custom_newsletter	WHERE status =1 {$wseearch}";
			 // pr($sql);
			
			$qData = $this->apps->fetch($sql);
			return $qData;
	}
	
	function getNewsletters($limit = 10,$start=0,$search=''){
		global $CONFIG;
		
			$wseearch='';
			if($search)
			{
				$wseearch='and email like "%'.$search.'%"';
			
			}
			
			
			$sql = "SELECT * FROM custom_newsletter WHERE status =1 {$wseearch} group by id DESC LIMIT {$start},{$limit}";
			$this->logger->log($sql);
			$qData = $this->apps->fetch($sql,1);			
			if(!$qData)return false;
			$no=$start+1;
			foreach($qData as $key=>$row)
			{
				
				$qData[$key]['no']=$no;
				$no++;
			}
			return $qData;
		
		
	}
	function deleteNewsletter($id)
	{
		$sql ="UPDATE custom_newsletter SET `status`='2' WHERE id={$id}  LIMIT 1";
		$rs = $this->apps->query($sql);
		if($rs)
		{
			return true;
		}
		return false;
	}
	function aktiveNewsletter($id)
	{
		$sql ="UPDATE custom_newsletter SET `status`='0' WHERE id={$id}  LIMIT 1";
		$rs = $this->apps->query($sql);
		if($rs)
		{
			return true;
		}
		return false;
	}
	function addNewsletter($email)
	{
		$query="insert into custom_newsletter set
				`email`='{$email}',
				`status`='1'";
				// pr($query);die;
		$rs = $this->apps->query($query);
		if($rs)
		{
			return true;
		}
		return false;
	}
}

?>

