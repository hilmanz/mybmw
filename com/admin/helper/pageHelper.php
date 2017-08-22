<?php
class pageHelper{
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){			
			$this->login = true;	
		}
	}
	function getPages($page=null,$rows=10){
		$sql = 'SELECT * FROM page';
		$this->logger->log($sql);
		$uData = $this->apps->fetch($sql,1);
		$count = count($uData);
		$pages = ceil($count/$rows);
		
		if($page == null){
			$page = 1;
		}
		$start = ($page - 1) * $rows;
		$sql = $sql.' LIMIT '.$start.','.$rows;
		$uData = $this->apps->fetch($sql,1);
		$result['data'] = $uData;
		$result['page'] = $page;
		
		return $result;
	}
	function addPage($data){
		$title = $data['title'];
		$content = $data['content'];
		$image = $data['image'];
		$author = $data['author'];	
		
		$sql = "INSERT INTO page (title,content,image,author) VALUE ('$title','$content','$image','$author')";
		$this->logger->log($sql);
		$this->apps->query($sql);
	}
	function editPage(){
		$title = $this->apps->_p('title');
		$content = $this->apps->_p('content');
		$image = '';
		$author = $this->apps->_p('author');
		
		$sql = "UPDATE page SET title = '$title', content = '$content', image = '$image', author = '$author' WHERE id = $id";
		$this->logger->log($sql);
		$this->apps->query($sql);
	}
	function deletePage($id=null){
		if($id!=null){
			$sql = 'DELETE FROM page WHERE id='.$id;
			$this->logger->log($sql);
			$this->apps->query($sql);
		}
	}
	function getPage($id=null){
		if($id!=null){
			$sql = 'SELECT * FROM page WHERE id='.$id;
			$this->logger->log($sql);
			$uData = $this->apps->fetch($sql,1);
			$result['data'] = $uData;
			
			return $result;
		}	
	}
}
?>