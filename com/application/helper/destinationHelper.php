<?php
class destinationHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	function menugetDestinations(){
		global $CONFIG;
		$sql = "SELECT menu,DATE_FORMAT(dp.date,'%m-%d-%Y') as date,d.id as id FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id where d.n_status=1 group by id";
		$fetch = $this->apps->fetch($sql,1);	
		//pr($fetch);exit;
		return $fetch;
		
		}		
	
	function getDestinations(){
		global $CONFIG;
		$sql = "select * from {$CONFIG['DATABASE'][0]['DATABASE']}.destination";
		$fetch = $this->apps->fetch($sql,1);	
		//pr($fetch);exit;
		return $fetch;
		
		}			
	function getDestination($id){
		global $CONFIG;
		$sql = "SELECT *,DATE_FORMAT(dp.date,'%m-%d-%Y') as date,d.id as id FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id
				
				WHERE d.id='{$id}' ";
				// pr($sql);
		$fetch = $this->apps->fetch($sql,1);
		$i=1;
		foreach ($fetch as $key=>$row)
		{
			$fetch[$key]['idPages']=$i++;
		}
		// pr($fetch);die;
		return $fetch;
		
		}
	function getDestinationGallery($id){
		global $CONFIG;
		$sql = "SELECT * 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.destination_gallery AS gallery 
				LEFT JOIN sys_files AS files ON  gallery.sys_files_id = files.id
				WHERE destination_id='{$id}'";
		$fetch = $this->apps->fetch($sql,1);
		$i=1;
		if($fetch)
		{
			foreach ($fetch as $key=>$row)
			{
				$fetch[$key]['idPages']=$i++;
			}
		}
		return $fetch;
	}	
}
	
