<?php
class destination extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->uploadHelper = $this->useHelper("uploadHelper");
		$this->destinationHelper = $this->useHelper("destinationHelper"); 
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));			
	}
	function main(){
		global $LOCALE,$CONFIG;
		$limit=10;
		$start = $this->_request('start');
		if($start=='')
		{
			$start=0;
		}
		$search= $this->_request('search');
		$listDestination=$this->destinationHelper->getDestinations($limit,$start,$search);
		$totalDestination=$this->destinationHelper->gettotalDestinations();
		// pr($totalDestination);die;
			$this->assign('listDestination', $listDestination['data']);
			$this->assign('totalDestination', $totalDestination['data']);
			$ajax = $this->_request('ajax');
			if($ajax)
			{
				if($listDestination)
				{
					print_r(json_encode( array('status'=>1,'data'=>$listDestination)));die;
				}
				else
				{
					print_r(json_encode( array('status'=>0,'data'=>$listDestination)));die;
				}
			}
			else
			{
				return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/destinationlist.html');		
			}
			
			
		//return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/destinationlist.html');			
	}		
	function deletedestination()
	{
		global $CONFIG;
		$id=$this->_request('id');
		if($id!=null)
		{
			$this->destinationHelper->deleteDestination($id);
		}
		sendRedirect("{$CONFIG['ADMIN_DOMAIN']}destination");
		return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
		die();
	}
	function editdestination()
	{
		global $CONFIG;
		$id=$this->_request('id');
		if($id!=null)
		{
			$result= $this->destinationHelper->getDestination($id);
			$this->assign('dataGallery','');
			if($result[0]['gallery']!='' || $result[0]['gallery']!=0){
				$dataDestinationGallery = $this->destinationHelper->getDestinationGallery($id);
				$this->assign('dataGallery',$dataDestinationGallery);
			}
			 // pr($dataDestinationGallery);die;
			$this->assign('listDestination', $result);
			return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/editdestination.html');
			// pr($result);die;
		}
		sendRedirect("{$CONFIG['ADMIN_DOMAIN']}destination");
		return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
		die();
	}
	function prosesEdit()
	{
		global $CONFIG;
		if('' !==$this->_p('btn_submit')){
//pr($_POST);exit;
			$data['menu'] = $this->_p('menu');
			$data['id'] = $this->_p('id');
			$data['module'] = $this->_p('module');
			$data['title'] = $this->_p('title');
			$data['desc'] = $this->_p('desc');
			$data['pagecontent'] = @$_POST['pg_content'];
			$data['positionpage'] = @$_POST['alignment'];
			$data['bg_page'] = @$_POST['bg_page'];
			$data['share'] = @$_POST['share'];
			$data['fbsharecopytext'] = $this->_p('fbsharecopytext');
			$data['twittersharecopytext'] = $this->_p('twittersharecopytext');
				$myfile = $_FILES['pg_bg_content'];
				$myfile2 = $_FILES['ipad_lands_content'];
				$myfile3 = $_FILES['ipad_potrait_content'];
				$myfile4 = $_FILES['mobile_content'];
				$jumlahHalaman = count($myfile['name']);
				$datafile=array();
				for($i=0;$i<=$jumlahHalaman-1;$i++)
				{	
					
					if($myfile['name'][$i])
					{
						$path = $CONFIG['LOCAL_PUBLIC_ASSET']."bmwpic/page/";
						$img['name']=@$myfile['name'][$i];
						$img['type']=@$myfile['type'][$i];
						$img['tmp_name']=@$myfile['tmp_name'][$i];
						$img['error']=@$myfile['error'][$i];
						$img['size']=@$myfile['size'][$i];
						
						$uploadpic = $this->uploadHelper->uploadThisImage($img,$path,1000,false,false);
						//$data['filename'][$i]=$uploadpic['arrImage']['filename'];
						if(isset($uploadpic['arrImage']['filename'])){
							$data['filename'][$i]['file_name'] = $uploadpic['arrImage']['filename'];
							$data['filename'][$i]['local_path'] = $path;
							$data['filename'][$i]['status'] = 1;
							$data['filename'][$i]['creator'] = $this->user->id;					
						}
					}
					
					if($myfile2 != '')
					{
					if($myfile2['name'][$i])
					{
						$path2 = $CONFIG['LOCAL_PUBLIC_ASSET']."bmwpic/page/";
						$img2['name']=@$myfile2['name'][$i];
						$img2['type']=@$myfile2['type'][$i];
						$img2['tmp_name']=@$myfile2['tmp_name'][$i];
						$img2['error']=@$myfile2['error'][$i];
						$img2['size']=@$myfile2['size'][$i];
						
						$uploadpic2 = $this->uploadHelper->uploadThisImage($img2,$path2,1000,false,false);
						//$data['filename'][$i]=$uploadpic['arrImage']['filename'];
						if(isset($uploadpic2['arrImage']['filename'])){
							$data['filename2'][$i]['file_name'] = $uploadpic2['arrImage']['filename'];
							$data['filename2'][$i]['local_path'] = $path2;
							$data['filename2'][$i]['status'] = 1;
							$data['filename2'][$i]['creator'] = $this->user->id;					
						}
					}
					}
					if($myfile3 != '')
					{
					if($myfile3['name'][$i])
					{
						$path3 = $CONFIG['LOCAL_PUBLIC_ASSET']."bmwpic/page/";
						$img3['name']=@$myfile3['name'][$i];
						$img3['type']=@$myfile3['type'][$i];
						$img3['tmp_name']=@$myfile3['tmp_name'][$i];
						$img3['error']=@$myfile3['error'][$i];
						$img3['size']=@$myfile3['size'][$i];
						
						$uploadpic3 = $this->uploadHelper->uploadThisImage($img3,$path3,1000,false,false);
						//$data['filename'][$i]=$uploadpic['arrImage']['filename'];
						if(isset($uploadpic3['arrImage']['filename'])){
							$data['filename3'][$i]['file_name'] = $uploadpic3['arrImage']['filename'];
							$data['filename3'][$i]['local_path'] = $path3;
							$data['filename3'][$i]['status'] = 1;
							$data['filename3'][$i]['creator'] = $this->user->id;					
						}
					}
					
					}
					if($myfile4 != '')
					{
					if($myfile4['name'][$i])
					{
						$path4 = $CONFIG['LOCAL_PUBLIC_ASSET']."bmwpic/page/";
						$img4['name']=@$myfile4['name'][$i];
						$img4['type']=@$myfile4['type'][$i];
						$img4['tmp_name']=@$myfile4['tmp_name'][$i];
						$img4['error']=@$myfile4['error'][$i];
						$img4['size']=@$myfile4['size'][$i];
						
						$uploadpic4 = $this->uploadHelper->uploadThisImage($img4,$path4,1000,false,false);
						//$data['filename'][$i]=$uploadpic['arrImage']['filename'];
						if(isset($uploadpic4['arrImage']['filename'])){
							$data['filename4'][$i]['file_name'] = $uploadpic4['arrImage']['filename'];
							$data['filename4'][$i]['local_path'] = $path4;
							$data['filename4'][$i]['status'] = 1;
							$data['filename4'][$i]['creator'] = $this->user->id;					
						}
					}
					}
				}
			
			
			
			
			
			
			 if($_FILES['gallery']['name'][0]!='')
			 {
				$myfilegallery = @$_FILES['gallery'];
				
				$jumlahHalamangallery = count($myfilegallery['name']);
				$datagallery=array();
				for($i=0;$i<=$jumlahHalamangallery-1;$i++)
				{	
					
					if($myfilegallery['name'][$i])
					{
						$pathgallery = $CONFIG['LOCAL_PUBLIC_ASSET']."bmwpic/gallery/";
						$imggallery['name']=@$myfilegallery['name'][$i];
						$imggallery['type']=@$myfilegallery['type'][$i];
						$imggallery['tmp_name']=@$myfilegallery['tmp_name'][$i];
						$imggallery['error']=@$myfilegallery['error'][$i];
						$imggallery['size']=@$myfilegallery['size'][$i];
						
						$uploadpicallery = $this->uploadHelper->uploadThisImage($imggallery,$pathgallery,1000,false,false);
						//$data['filename_gallery'][$i]=$uploadpicallery['arrImage']['filename'];
						if(isset($uploadpicallery['arrImage']['filename'])){
							$data['gallery'][$i]['file_name'] = $uploadpicallery['arrImage']['filename'];
							$data['gallery'][$i]['local_path'] = $pathgallery;
							$data['gallery'][$i]['status'] = 1;
							$data['gallery'][$i]['creator'] = $this->user->id;					
						}
						// echo"sdsasdsds";
					}

				}
			 }
			
			
			
			
			// pr($_POST);
			if(isset($_POST['imgpageold']))
			{
				foreach ($_POST['imgpageold'] as $key=>$row)
				{
					$filesystem=$row;
				
					$systmfile=$this->destinationHelper->getpgfiles($filesystem);
						// pr($filesystem);
					if($systmfile)
						{
								$data['filename'][$key]['file_name'] = $systmfile['baground'];
								
						}
					
				}
			}
			if(isset($_POST['imglandold']))
			{
				foreach ($_POST['imglandold'] as $key2=>$row2)
				{
					$filesystem2=$row2;
				
					$systmfile2=$this->destinationHelper->getpgfiles2($filesystem2);
					// pr($filesystem);
					if($systmfile2)
						{
								$data['filename2'][$key2]['file_name'] = $systmfile2['ipad_land_page'];
								
						}
					
				}
			}
			
			if(isset($_POST['imgpotold']))
			{
				foreach ($_POST['imgpotold'] as $key3=>$row3)
				{
					$filesystem3=$row3;
				
					$systmfile3=$this->destinationHelper->getpgfiles3($filesystem3);
						// pr($filesystem);
					if($systmfile3)
						{
								$data['filename3'][$key3]['file_name'] = $systmfile3['ipad_pot_page'];
								
						}
					
				}
			}
			
				if(isset($_POST['imgmobold']))
			{
				foreach ($_POST['imgmobold'] as $key4=>$row4)
				{
					$filesystem4=$row4;
				
					$systmfile4=$this->destinationHelper->getpgfiles4($filesystem4);
						// pr($filesystem);
					if($systmfile4)
						{
								$data['filename4'][$key4]['file_name'] = $systmfile4['mobile_bg'];
								
						}
					
				}
			}
			
			
			if(isset($_POST['imggaleold']))
			{
				foreach ($_POST['imggaleold'] as $keygal=>$rowgal)
				{
					$filesystemgal=$rowgal;
				
					$systmfilegal=$this->destinationHelper->getsysfiles($filesystemgal);
						// pr($filesystemgal);
					if($systmfilegal)
						{
								// $data['filename'][$keygal]['filename'] = $systmfilegal['file_name'];
								$data['gallery'][$keygal]['file_name'] = $systmfilegal['file_name'];
								$data['gallery'][$keygal]['local_path'] =  $systmfilegal['local_path'];
								$data['gallery'][$keygal]['status'] = 1;
								$data['gallery'][$keygal]['creator'] = $this->user->id;	
						}
					
				}
			}
			
			
			// pr($_POST['imggaleold'] );
			// pr($_FILES);
			// pr($data);die;
			$this->destinationHelper->proseseditDestination($data);
			sendRedirect($CONFIG['ADMIN_DOMAIN'] .'destination');die;
		}	
	}
	function spek()
	{
		pr(phpinfo());die;
	}
}
?>
