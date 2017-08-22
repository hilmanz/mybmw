<?php
class dashboardHelper{
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){			
			$this->login = true;	
		}
	}
	function getTrakingAll(){
		$sql = "SELECT * FROM tbl_tracking ";
		$this->logger->log($sql);		
		$uData = $this->apps->fetch($sql,1);
		return $uData;
	
	}
	function getTrakingtestdrive(){
		$sql = "SELECT *,DATE_FORMAT(dp.date,'%m-%d-%Y') as date,d.id as id FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id where d.n_status=1";
		$this->logger->log($sql);
		$uData = $this->apps->fetch($sql,1);
		$count = count($uData);
		$pages = ceil($count/$rows);
		
		if($page == null){
			$page = 1;
		}
		$start = ($page - 1) * $rows;
		$sql = $sql.'  GROUP BY dp.destionation_id  LIMIT '.$start.','.$rows;
		$uData = $this->apps->fetch($sql,1);
		$result['data'] = $uData;
		$result['page'] = $page;
		
		return $result;
	}
	function getTrakingdownload(){
		$sql = "SELECT *,DATE_FORMAT(dp.date,'%m-%d-%Y') as date,d.id as id FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id where d.n_status=1";
		$this->logger->log($sql);
		$uData = $this->apps->fetch($sql,1);
		$count = count($uData);
		$pages = ceil($count/$rows);
		
		if($page == null){
			$page = 1;
		}
		$start = ($page - 1) * $rows;
		$sql = $sql.'  GROUP BY dp.destionation_id  LIMIT '.$start.','.$rows;
		$uData = $this->apps->fetch($sql,1);
		$result['data'] = $uData;
		$result['page'] = $page;
		
		return $result;
	}
	function getTrakingregister(){
		$sql = "SELECT *,DATE_FORMAT(dp.date,'%m-%d-%Y') as date,d.id as id FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id where d.n_status=1";
		$this->logger->log($sql);
		$uData = $this->apps->fetch($sql,1);
		$count = count($uData);
		$pages = ceil($count/$rows);
		
		if($page == null){
			$page = 1;
		}
		$start = ($page - 1) * $rows;
		$sql = $sql.'  GROUP BY dp.destionation_id  LIMIT '.$start.','.$rows;
		$uData = $this->apps->fetch($sql,1);
		$result['data'] = $uData;
		$result['page'] = $page;
		
		return $result;
	}
	function getTrakingtwitter(){
		$sql = "SELECT *,DATE_FORMAT(dp.date,'%m-%d-%Y') as date,d.id as id FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id where d.n_status=1";
		$this->logger->log($sql);
		$uData = $this->apps->fetch($sql,1);
		$count = count($uData);
		$pages = ceil($count/$rows);
		
		if($page == null){
			$page = 1;
		}
		$start = ($page - 1) * $rows;
		$sql = $sql.'  GROUP BY dp.destionation_id  LIMIT '.$start.','.$rows;
		$uData = $this->apps->fetch($sql,1);
		$result['data'] = $uData;
		$result['page'] = $page;
		
		return $result;
	}
	function getTrakingkeepme(){
		$sql = "SELECT *,DATE_FORMAT(dp.date,'%m-%d-%Y') as date,d.id as id FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id where d.n_status=1";
		$this->logger->log($sql);
		$uData = $this->apps->fetch($sql,1);
		$count = count($uData);
		$pages = ceil($count/$rows);
		
		if($page == null){
			$page = 1;
		}
		$start = ($page - 1) * $rows;
		$sql = $sql.'  GROUP BY dp.destionation_id  LIMIT '.$start.','.$rows;
		$uData = $this->apps->fetch($sql,1);
		$result['data'] = $uData;
		$result['page'] = $page;
		
		return $result;
	}
}
?>
