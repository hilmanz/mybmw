<?php
class apibmw extends App{

	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->registrationHelper = $this->useHelper('registrationHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		$this->assign('basedomain',$CONFIG['BASE_DOMAIN']); 
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));
		$this->assign('user',$this->user);
	}
	
	
	
	function main(){
		//pr("abcd"); die;
		global $CONFIG;
		error_reporting(E_ALL);
		ini_set('display_error',1);
		$this->registrationHelper = $this->useHelper('registrationHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		//if($this->_p('submit')){
			//pr('masuk sini'); die;
			
			$data['firstname']=@$_POST['firstname'];
			$data['lastname']=$_POST['lastname'];
			$data['phone']=$_POST['phone'];
			$data['email']=$_POST['email'];
			//$data['photo']=$_POST['photo'];
			//pr($data); 
			//$datamasuk=$this->memberHelper->apibmw($data);
			
			
		$file = $_FILES['myfile'];
		if($file){
		//pr('ss');exit;
		$path = $CONFIG['LOCAL_PUBLIC_ASSET']."apibmw/";
		$uploadimage= $this->uploadHelper->uploadThisImage($file,$path);
		$filenya=$uploadimage['arrImage']['filename'];
		}else{
		$filenya='';
		}
		
		//pr($filenya);exit;		
		$result=$this->registrationHelper->apibmw($filenya,$data);
			
		echo json_encode(array('status'=>1,'message'=>'berhasil')); die;
	}
	
	
}
?>
