<?php
class usermanagement extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('localpublicasset',$CONFIG['LOCAL_PUBLIC_ASSET']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));			
	}
	function main(){		
		$time['time'] = '%H:%M:%S';
		$page = $this->_g('p');
		$keyword = $this->_g('k');
		$keyLink = '';
		$usersData  = $this->userHelper->getUsers($page,10,$keyword);
		if($keyword){
			$keyLink = '&k='.$keyword;
		}
		if($usersData['pages']==false){			
			$this->assign('pages',0);
			$this->assign('data','nodata');
		}else{
			if($page==''){
				$page = 1;
			}
			$total_link = 5;
			$start = $page - floor($total_link/2);
			if($start<1){
				$start = 1;
			}else{
				$max_start = $usersData['pages'] - ($total_link -1);
				if($start>$max_start){
					$start = $max_start;
				}
			}
			if($start>1){
				$this->assign('leftarrow',($start-1));
			}else{
				$this->assign('leftarrow',false);
			}
			if(($start+($total_link-1))<$usersData['pages']){
				$this->assign('rightarrow',($start+($total_link)));
				$this->assign('endpage',($start+($total_link)));
			}else{
				$this->assign('rightarrow',false);
				$this->assign('endpage',$usersData['pages']+1);
			}			
			$this->assign('klink',$keyLink);
			$this->assign('startpage',$start);
			$this->assign('currentpage',$page);
			$this->assign('pages',$usersData['pages']);
			$this->assign('data',$usersData['data']);
		}				
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/usermanagement.html');			
	}			
}
?>