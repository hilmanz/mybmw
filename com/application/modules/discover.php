<?php
class discover extends App{		
	function beforeFilter(){ 
		global $LOCALE,$CONFIG; 

		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->destinationHelper = $this->useHelper('destinationHelper');				
		$menugetDestinations = $this->destinationHelper->menugetDestinations();
		$this->assign('menugetDestinations', $menugetDestinations);	
		$listdestination = $this->destinationHelper->getDestinations();
		$this->assign('listdestination', $listdestination);
		$this->assign('locale', $LOCALE[1]);
		$this->assign('pages','discover');
		$this->assign('user', $this->user);	
		$this->assign('navigation',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/navigation.html"));
		$this->assign('footer',$this->View->toString(TEMPLATE_DOMAIN_WEB . "/footer.html"));		
	}

	function main(){
				
		
		$time['time'] = '%H:%M:%S';
		$listDestination = $this->destinationHelper->getDestinations();
		$this->assign('listDestination', $listDestination);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/destination.html');	
	}	
	function detail(){
		$time['time'] = '%H:%M:%S';
		$id=$this->_g('id');
		$dataDestination = $this->destinationHelper->getDestination($id);
		//\pr($dataDestination);die;

		if($dataDestination[0]['gallery']!='' || $dataDestination[0]['gallery']!=0){
			$dataDestinationGallery = $this->destinationHelper->getDestinationGallery($id);
			//pr($dataDestinationGallery);die;
			$this->assign('dataGallery',$dataDestinationGallery);
		}
		
		$this->assign('dataDestination', $dataDestination);
		$this->assign('totalpagedataDestination', count($dataDestination));
		$this->assign('lastpagedataDestination', count($dataDestination)+1);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/destination_detail.html');	
	}
}
?>