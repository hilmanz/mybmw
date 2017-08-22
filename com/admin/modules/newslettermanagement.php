<?php
class newslettermanagement extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 		
		$this->newsletterHelper = $this->useHelper("newsletterHelper");
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
		$limit=10;
		$start = $this->_request('start');
		if($start=='')
		{
			$start=0;
		}
		$search= $this->_request('search');
		$newsletterData  = $this->newsletterHelper->getNewsletters($limit,$start,$search);
		$total = $this->newsletterHelper->gettotalNewsletters($search);
		// pr($total);
		$this->assign('newsletterData', $newsletterData);
		$this->assign('search', $search);
		$this->assign('total', $total['total']);
		$ajax = $this->_request('ajax');
			if($ajax)
			{
				if($newsletterData)
				{
					print_r(json_encode( array('status'=>1,'data'=>$newsletterData)));die;
				}
				else
				{
					print_r(json_encode( array('status'=>0,'data'=>$newsletterData)));die;
				}
			}
			else
			{
				return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/newslettermanagement.html');		
			}
			
	}	
	function delete(){	
		global $LOCALE,$CONFIG; 
		$id = $this->_request('id');
		
		$newsletterData  = $this->newsletterHelper->getNewsletters($id);
		if($newsletterData)
		{
			$ajax = $this->_request('ajax');
			if($ajax)
			{
				echo array('status'=>1,'msg'=>'sucsess');die;
			}
			else
			{
				sendRedirect("{$CONFIG['ADMIN_DOMAIN']}newslettermanagement");
				return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
				die();
			}
			
		}
		else
		{
			$ajax = $this->_request('ajax');
			if($ajax)
			{
				echo array('status'=>0,'msg'=>'problem');die;
			}
		}
		sendRedirect("{$CONFIG['ADMIN_DOMAIN']}newslettermanagement");
				return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
				die();
	}
	function changeAktive()
	{
		global $LOCALE,$CONFIG; 
		$id = $this->_request('id');
		
		$newsletterData  = $this->newsletterHelper->aktiveNewsletter($id);
		if($newsletterData)
		{
			$ajax = $this->_request('ajax');
			if($ajax)
			{
				echo array('status'=>1,'msg'=>'sucsess');die;
			}
			else
			{
				sendRedirect("{$CONFIG['ADMIN_DOMAIN']}newslettermanagement");
				return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
				die();
			}
			
		}
		else
		{
			$ajax = $this->_request('ajax');
			if($ajax)
			{
				echo array('status'=>0,'msg'=>'problem');die;
			}
		}
		sendRedirect("{$CONFIG['ADMIN_DOMAIN']}newslettermanagement");
				return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
				die();
	
	}
	function add(){
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/addnewsletter.html');	
	}
	function prosesadd(){	
		global $LOCALE,$CONFIG; 
		$email = $this->_request('email');
		
		$newsletterData  = $this->newsletterHelper->addNewsletter($email);
		if($newsletterData)
		{
			$ajax = $this->_request('ajax');
			if($ajax)
			{
				echo array('status'=>1,'msg'=>'sucsess');die;
			}
			else
			{
				sendRedirect("{$CONFIG['ADMIN_DOMAIN']}newslettermanagement");
				return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
				die();
			}
			
		}
		else
		{
			$ajax = $this->_request('ajax');
			if($ajax)
			{
				echo array('status'=>0,'msg'=>'problem');die;
			}
		}
		sendRedirect("{$CONFIG['ADMIN_DOMAIN']}newslettermanagement");
				return $this -> out(TEMPLATE_DOMAIN_ADMIN . 'login_message.html');
				die();
	}
}
?>