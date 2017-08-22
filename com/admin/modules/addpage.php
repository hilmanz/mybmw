<?php
class addpage extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->uploadHelper = $this->useHelper("uploadHelper");
		$this->pageHelper = $this->useHelper("pageHelper"); 
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));			
	}
	function main(){
		global $LOCALE,$CONFIG;
		if('' !==$this->_p('btn_submit')){
			$path = '/Users/dewarajasakatong/Sites/sandbox/'.$CONFIG['LOCAL_PUBLIC_ASSET']."page/";
			//check image...
			
			$img['name']=@$_FILES['image']['name'];
			$img['type']=@$_FILES['image']['type'];
			$img['tmp_name']=@$_FILES['image']['tmp_name'];
			$img['error']=@$_FILES['image']['error'];
			$img['size']=@$_FILES['image']['size'];
			
			$uploadpic = $this->uploadHelper->uploadThisImage($img,$path,1000,false,false);
			
			
			$data['title'] = $this->_p('title');
			$data['content'] = $this->_p('content');
			$data['author'] = $this->user->id;			
			if(isset($uploadpic['arrImage']['filename'])){
				$data['image'] = $uploadpic['arrImage']['filename'];
			}else{
				$data['image'] = '';
			}
			
			$this->pageHelper->addPage($data);
			sendRedirect($CONFIG['ADMIN_DOMAIN'] .'page');
		}	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/addpage.html');			
	}			
}
?>