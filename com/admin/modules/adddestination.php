<?php
class adddestination extends App{		
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
		if('' !==$this->_p('btn_submit')){
			//pr($_FILES);exit;
			$data['menu'] = $this->_p('menu');
			$data['module'] = $this->_p('module');
			$data['title'] = $this->_p('title');
			$data['desc'] = $this->_p('desc');
			$data['pagecontent'] = @$_POST['pg_content'];
			$data['galcontent'] = @$_POST['gal_content'];
			$data['positionpage'] = @$_POST['alignment'];
			$data['bg_page'] = @$_POST['bg_page'];
			$data['share'] = @$_POST['share'];
			$data['fbsharecopytext'] = $this->_p('fbsharecopytext');
			$data['twittersharecopytext'] = $this->_p('twittersharecopytext');
			if($_FILES['pg_bg_content']['name'][0]!='')
			{
				$myfile =  $_FILES['pg_bg_content'];
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
				$myfilegallery = $_FILES['gallery'];
				$jumlahHalamangallery = count($myfilegallery['name']);
				$datagallery=array();
				for($j=0;$j<=$jumlahHalamangallery-1;$j++)
				{	
					
					if($myfilegallery['name'][$i])
					{
						$pathgallery = $CONFIG['LOCAL_PUBLIC_ASSET']."bmwpic/gallery/";
						$imggallery['name']=@$myfilegallery['name'][$j];
						$imggallery['type']=@$myfilegallery['type'][$j];
						$imggallery['tmp_name']=@$myfilegallery['tmp_name'][$j];
						$imggallery['error']=@$myfilegallery['error'][$j];
						$imggallery['size']=@$myfilegallery['size'][$j];
						
						$uploadpicallery = $this->uploadHelper->uploadThisImage($imggallery,$pathgallery,1000,false,false);
						//$data['filename_gallery'][$i]=$uploadpicallery['arrImage']['filename'];
						if(isset($uploadpicallery['arrImage']['filename'])){
							$data['gallery'][$j]['file_name'] = $uploadpicallery['arrImage']['filename'];
							$data['gallery'][$j]['local_path'] = $pathgallery;
							$data['gallery'][$j]['status'] = 1;
							$data['gallery'][$j]['creator'] = $this->user->id;					
						}
					}
				}
			}
			// pr($data);
			// die;
			$this->destinationHelper->addDestination($data);
			sendRedirect($CONFIG['ADMIN_DOMAIN'] .'home');die;
		}	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/adddestination.html');			
	}			
}
?>