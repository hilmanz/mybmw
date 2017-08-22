<?php
class destinationHelper{
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){			
			$this->login = true;	
		}
	}
	function getDestinations($limit = 10,$start=0,$search=''){
		$sql = "SELECT *,DATE_FORMAT(dp.date,'%m-%d-%Y') as date,d.id as id FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id where d.n_status=1";
		$this->logger->log($sql);
		$uData = $this->apps->fetch($sql,1);
	
		$sql = $sql.'  GROUP BY dp.destionation_id order by d.id ASC LIMIT '.$start.','.$limit;
		// pr($sql);
		$uData = $this->apps->fetch($sql,1);
		if(!$uData)return false;
			$no=$start+1;
			foreach($uData as $key=>$row)
			{
				
				$uData[$key]['no']=$no;
				$no++;
			}
		$result['data'] = $uData;
		
		
		return $result;
	}
	function gettotalDestinations(){
		$sql = "SELECT * FROM `destination`  d
				LEFT JOIN `destination_page` dp ON d.id=dp.destionation_id where d.n_status=1   GROUP BY dp.destionation_id ";
		$this->logger->log($sql);
		// pr($sql);
		$uData = $this->apps->fetch($sql,1);
		
		$result['data'] = count($uData);
		
		
		return $result;
	}
	function addDestination($data){
		$title = $data['title'];
		$menu = $data['menu'];
		$share = $data['share'];
		$fbsharecopytext = $data['fbsharecopytext'];
		$twittersharecopytext = $data['twittersharecopytext'];
		//$module = $data['id'].$data['menu'];/* $data['module']; */
		$desc = $data['desc'];
		$galcontent = $data['galcontent'];
		$pagecontent = $data['pagecontent'];
		$positionpage = $data['positionpage'];
		$bg_page = $data['filename'];
		$ipad_land_page = $data['filename2'];
		$ipad_pot_page = $data['filename3'];
		$mobile_page = $data['filename4'];
		// pr($bg_page);
		if(isset($data['gallery'])){
			$gallery = 1;
		}else{
			$gallery = 0;
		}
		$sql = "select count(*) as total from `destination`";
				
		$jumlah=$this->apps->fetch($sql);
		if($jumlah['total'])
		{
		$module=$jumlah['total']+1;
		}
		/* $sql = "INSERT INTO destination (title,desc,bg_pic,pg1_content,pg1_bg_pic,pg1_option,pg2_content,pg2_bg_pic,pg2_option,pg3_content,pg3_bg_pic,pg3_option,gallery) 
				 VALUE ('$title','$desc','$bg_pic','$pg1_content','$pg1_bg_pic','$pg1_option','$pg2_content','$pg2_bg_pic','$pg2_option','$pg3_content','$pg3_bg_pic','$pg3_option',$gallery)";*/
		$sql = " INSERT INTO `destination` SET 
				`module`='$module',
				`menu`='$menu',
				`title`='$title',
				`desc`='$desc',
				`gallery`='$gallery',
				`share`='$share',
				`fbshare`='$fbsharecopytext',
				`twittershare`='$twittersharecopytext',
				`date`=NOW(),
				`n_status`='1'";
				
				
		$this->logger->log($sql);
		// pr($sql);
		//pr($_POST);exit;
		$this->apps->query($sql);
		$destination_id = $this->apps->getLastInsertId();
		// pr($destination_id);die;
		if($gallery == 1){
			foreach($data['gallery'] as $each){
				$file_name = $each['file_name'];
				$local_path = $each['local_path'];
				$status = $each['status'];
				$creator = $each['creator'];
				$sql = "INSERT INTO sys_files(file_name,local_path,status,creator)
						VALUE('$file_name','$local_path',$status,$creator)";
				$this->logger->log($sql);	
				// pr($sql);				
				$this->apps->query($sql);
				$sys_files_id = $this->apps->getLastInsertId();
				$sql = "INSERT INTO destination_gallery(destination_id,sys_files_id)
						VALUE($destination_id,$sys_files_id)";
				$this->logger->log($sql);
				// pr($sql);	
				$this->apps->query($sql);
			}
		}
		if($pagecontent)
		{
			foreach($pagecontent as $key=>$row)
			{
				$sql =" INSERT INTO `destination_page` SET 
				`destionation_id`='$destination_id',
				`content`='".addslashes($row)."',
				`baground`='".$bg_page[$key]['file_name']."',
				`ipad_land_page`='".$ipad_land_page[$key]['file_name']."',
				`ipad_pot_page`='".$ipad_pot_page[$key]['file_name']."',
				`mobile_bg`='".$mobile_page[$key]['file_name']."',
				`potition`='".$positionpage[$key+1]."',
				`date`=NOW(),
				`n_status`='1'";
				// pr($sql);  
				$this->apps->query($sql);
			}
		}
		//exit;
	}
	function proseseditDestination($data){
	//pr($data);exit;
		$title = $data['title'];
		$id = $data['id'];
		$menu = $data['menu'];
		$share = $data['share'];
		$fbsharecopytext = $data['fbsharecopytext'];
		$twittersharecopytext = $data['twittersharecopytext'];
		$module =$data['module']; 
		$desc = $data['desc'];
		$pagecontent = $data['pagecontent'];
		if(isset($data['filename']))
		{
		$bg_page = $data['filename'];
		}else{
		$bg_page['file_name'][]['file_name'] = '';
		}
		if(isset($data['filename2']))
		{
		$ipad_land_page =$data['filename2'];
		}else{
		$ipad_land_page['file_name2'][]['file_name'] ='' ;
		}
		if(isset($data['filename3']))
		{
		$ipad_pot_page = $data['filename3'];
		}else{
		$ipad_pot_page['file_name3'][]['file_name'] = '';
		}
		if(isset($data['filename4']))
		{
		$mobile_page = $data['filename4'];
		}else{
		$mobile_page['file_name4'][]['file_name'] ='';
		}
		$positionpage = $data['positionpage'];
		
	// pr($ipad_land_page);	
// pr($data);die;
		if(isset($data['gallery'])){
			$gallery = 1;
		}else{
			$gallery = 0;
		}
		
		
		$sql = " UPDATE  `destination` SET 
				`module`='$module',
				`menu`='$menu',
				`title`='$title',
				`desc`='$desc',
				`gallery`='$gallery',
				`share`='$share',
				`fbshare`='$fbsharecopytext',
				`twittershare`='$twittersharecopytext',
				`date`=NOW(),
				`n_status`='1'
				where id='$id'
				";
				
				
		$this->logger->log($sql);
		 //pr($sql);exit;
		$this->apps->query($sql);
	
		// pr($destination_id);die;
		if($gallery == 1){
			
			
			
			$sqlsysfile = " SELECT destination_id,sys_files_id FROM destination_gallery
				where destination_id='$id'
				";
				// pr($sqlsysfile);
			$fetchsysfile = $this->apps->fetch($sqlsysfile,1);
			// pr($fetchsysfile);die;
			if($fetchsysfile)
			{
				foreach($fetchsysfile as $keysyfile=>$rowsysfile)
				{
					$idsysfile=$rowsysfile['sys_files_id'];
					$sql = " DELETE FROM sys_files
						where id='$idsysfile'
						";
					$this->logger->log($sql);
					// pr($sql);
					$this->apps->query($sql);
				}
			}
			
			$sql = " DELETE FROM destination_gallery
				where destination_id='$id'";
				
				
			$this->logger->log($sql);
			// pr($sql);
			$this->apps->query($sql);
			
			
			
			foreach($data['gallery'] as $each){
				$file_name = $each['file_name'];
				$local_path = $each['local_path'];
				$status = $each['status'];
				$creator = $each['creator'];
				$sql = "INSERT INTO sys_files(file_name,local_path,status,creator)
						VALUE('$file_name','$local_path',$status,$creator)";
				$this->logger->log($sql);	
				// pr($sql);				
				$this->apps->query($sql);
				$sys_files_id = $this->apps->getLastInsertId();
				$sql = "INSERT INTO destination_gallery(destination_id,sys_files_id)
						VALUE($id,$sys_files_id)";
				$this->logger->log($sql);
				// pr($sql);	
				$this->apps->query($sql);
			}
		}
		if($pagecontent)
		{
			$sql="DELETE FROM `destination_page` where destionation_id='$id'";
			$this->apps->query($sql);
			foreach($pagecontent as $key=>$row)
			{
				
				
				$sql =" INSERT INTO `destination_page` SET 
				`destionation_id`='$id',
				`content`='".addslashes($row)."',
				`baground`='".@$bg_page[$key]['file_name']."',
				`ipad_land_page`='".@$ipad_land_page[$key]['file_name']."',
				`ipad_pot_page`='".@$ipad_pot_page[$key]['file_name']."',
				`mobile_bg`='".@$mobile_page[$key]['file_name']."',
				`potition`='".$positionpage[$key+1]."',
				`date`=NOW(),
				`n_status`='1'";
				
				// pr($sql);s
				$this->apps->query($sql);
			}
			// die;
		}
	}
	function editDestination($data){
		$title = $this->apps->_p('title');
		$content = $this->apps->_p('content');
		$image = '';
		$author = $this->apps->_p('author');
		
		$sql = "UPDATE page SET title = '$title', content = '$content', image = '$image', author = '$author' WHERE id = $id";
		$this->logger->log($sql);
		$this->apps->query($sql);
	}
	// function deleteDestination($id=null){
		// if($id!=null){
			// $sql = 'DELETE FROM destination WHERE id='.$id;
			// $this->logger->log($sql);
			// $this->apps->query($sql);
		// }
	// }
	function deleteDestination($id=null){
	global $CONFIG;
		if($id!=null){
			$sql = "UPDATE `destination`  SET  n_status='2' WHERE id=".$id;
			// $this->logger->log($sql);
			$this->apps->query($sql);
			$sql = "UPDATE `destination_page`  SET  n_status='2' WHERE destionation_id=".$id;
			// $this->logger->log($sql);
			$this->apps->query($sql);
		}
	}
	function getDestination($id=null){
		if($id!=null){
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
		return false;
	}
	function getDestinationGallery($id){
		global $CONFIG;
		$sql = "SELECT * 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.destination_gallery AS gallery 
				LEFT JOIN sys_files AS files ON  gallery.sys_files_id = files.id
				WHERE destination_id='{$id}'";
		$fetch = $this->apps->fetch($sql,1);
		return $fetch;
	}	
	function getsysfiles($file_name=null){
	
		global $CONFIG;
		if($file_name!=null)
		{
			$sql = "SELECT * 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.sys_files 
				WHERE file_name='{$file_name}'";
			// pr($sql);die;
			$fetch = $this->apps->fetch($sql);
			// pr($fetch);
			return $fetch;
		}
		else
		{
			return false;
		}
	}	
	function getpgfiles($file_name=null){
	
		global $CONFIG;
		if($file_name!=null)
		{
			$sql = "SELECT * 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.destination_page 
				WHERE baground='{$file_name}'";
			// pr($sql);die;
			$fetch = $this->apps->fetch($sql);
			// pr($fetch);
			return $fetch;
		}
		else
		{
			return false;
		}
	}	
	function getpgfiles2($file_name=null){
	
		global $CONFIG;
		if($file_name!=null)
		{
			$sql = "SELECT * 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.destination_page 
				WHERE ipad_land_page='{$file_name}'";
			// pr($sql);die;
			$fetch = $this->apps->fetch($sql);
			// pr($fetch);
			return $fetch;
		}
		else
		{
			return false;
		}
	}	
	function getpgfiles3($file_name=null){
	
		global $CONFIG;
		if($file_name!=null)
		{
			$sql = "SELECT * 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.destination_page 
				WHERE ipad_pot_page='{$file_name}'";
			// pr($sql);die;
			$fetch = $this->apps->fetch($sql);
			// pr($fetch);
			return $fetch;
		}
		else
		{
			return false;
		}
	}	
	function getpgfiles4($file_name=null){
	
		global $CONFIG;
		if($file_name!=null)
		{
			$sql = "SELECT * 
				FROM {$CONFIG['DATABASE'][0]['DATABASE']}.destination_page 
				WHERE mobile_bg='{$file_name}'";
			// pr($sql);die;
			$fetch = $this->apps->fetch($sql);
			// pr($fetch);
			return $fetch;
		}
		else
		{
			return false;
		}
	}	
}
?>
