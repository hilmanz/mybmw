<?php
class userHelper{
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){			
			$this->login = true;	
		}
	}
	function getRole(){
		$sql = '
			SELECT 
				id,
				name
			FROM 
				sys_role';
				 
		$this->logger->log($sql);
		$rData = $this->apps->fetch($sql,1);
		$result = array();
		foreach($rData as $each){
			$result[$each['id']]=$each['name'];
		}
		return $result;
	}
	function getUsers($page=null,$rows=10,$keyword=null){
		$where ='';	
		if($keyword!=null){
			$where = 'WHERE
					  	firstname LIKE "%'.$keyword.'%" OR
					  	lastname LIKE "%'.$keyword.'%" OR
					  	username LIKE "%'.$keyword.'%" OR
					  	email LIKE "%'.$keyword.'%"';
		}
	//	$sql = 'SELECT avatar_pic,name, nickname, email, role, id FROM users WHERE role NOT IN (0,1)';
		$sql = '
			SELECT 
				users.first_name,
				users.last_name,
				users.username,
				users.email,
				roles.name role,
				users.id 
			FROM 
				sys_users users
			LEFT JOIN
				sys_role  roles ON roles.id = users.role_id
				 '.$where;
				 
		$this->logger->log($sql);
		$uData = $this->apps->fetch($sql,1);
		$count = count($uData);
		$pages = ceil($count/$rows);
		
		if($count>0){
			if($page == null){
				$page = 1;
			}
			$start = ($page - 1) * $rows;
			$sql = $sql.' LIMIT '.$start.','.$rows;
			$uData = $this->apps->fetch($sql,1);
			$result['data'] = $uData;
			$result['pages'] = $pages;
		}else{
			$result['data'] = false;
			$result['pages'] = false;
		}
		return $result;
	}
	function addUser($data){
		$first_name = $data['first_name'];
		$last_name = $data['last_name'];
		$username = $data['username'];
		$email = $data['email'];
		$password = $data['password'];
		$role_id = $data['role_id'];
				
		$sql = "INSERT INTO sys_users (first_name,last_name,username,email,password,role_id) VALUE ('$first_name','$last_name','$username','$email','$password',$role_id)";
		$this->logger->log($sql);
		$this->apps->query($sql);
	}
	function editUsers($data){
		$first_name = $data['first_name'];
		$last_name = $data['last_name'];
		$username = $data['username'];
		$email = $data['email'];
		$password = $data['password'];
		$role_id = $data['role_id'];
		$id =$data['id'];
		
		$sql = "UPDATE sys_users SET first_name = '$first_name',last_name = '$last_name', username = '$username', email = '$email', password = '$password', role_id = '$role_id' WHERE id = $id";
		$this->logger->log($sql);
		$this->apps->query($sql);
	}
	function deleteUser($id=null){
		if($id!=null){
			$sql = 'DELETE FROM sys_users WHERE id='.$id;
			$this->logger->log($sql);
			$this->apps->query($sql);
		}
	}
	function getUser($id=null){
		if($id!=null){
			$sql = 'SELECT * FROM sys_users WHERE id='.$id;
			$this->logger->log($sql);
			$uData = $this->apps->fetch($sql,1);
			$result = $uData[0];
			
			return $result;
		}	
	}
}
?>