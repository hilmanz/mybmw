<?php
class registrationHelper{
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){			
			$this->login = true;	
		}
	}
	function addRegistration($data){
		GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
		$field = '';
		$value = '';
		foreach($data as $key=>$each){
			$field = $field.$key.',';
			if(is_numeric($each)){
				$value = $value.$each.',';
			}else{
				$value = $value.'\''.$each.'\',';
			}
			
		}
		$field = substr($field,0,-1);
		$value = substr($value,0,-1);
		
		$sql = "INSERT INTO custom_registration ($field) VALUE ($value)";
		
		$this->logger->log($sql);
		// pr($sql);die;
		$hasilresult = $this->apps->query($sql);
		if($hasilresult)
		{
		
				if(isset($data['email']))
				{
					require_once $ENGINE_PATH."Utility/PHPMailer/class.phpmailer.php";
					
					
					
					$mail = new PHPMailer();
								
						$mail->isSMTP();        
						
						$mail->Host       = $CONFIG['EMAIL_SMTP_HOST'];
						$mail->Hostname   = $CONFIG['EMAIL_SMTP_HOST'];			// sets the SMTP server
						$mail->SMTPAuth   = true;                  // enable SMTP authentication
						$mail->SMTPSecure = "tsl";
						$mail->Port       = $CONFIG['EMAIL_SMTP_PORT'];                    // set the SMTP port for the GMAIL server
						$mail->Username   = $CONFIG['EMAIL_SMTP_USER']; // SMTP account username
						$mail->Password   = $CONFIG['EMAIL_SMTP_PASSWORD'];        // SMTP account password
						
						$mail->From = $data['email'];
						$mail->FromName = 'mybmw';
					$mail->addAddress('bmwmissionimpossible@gmail.com','bmwmissionimpossible@gmail.com');  // Add a recipient
					
					$mail->Subject    = $LOCALE[1]['EMAIL_Register_subject'];
					
					$mail->WordWrap = 50;
				
					$mail->isHTML(true);
					$tmplate=$LOCALE[1]['EMAIL_Register'];
					$name='';
					$email='-';
					$phone='-';
					$address='-';
					$city='-';
					$vehicle='-';
					
					if(isset($data['city']))
					{
						$city =' '.$data['city'];
						
						
						
					}
					if(isset($data['phone']))
					{
						$phone =' '.$data['phone'];
						
						
						
					}
					if(isset($data['vehicle']))
					{
						$vehicle =' '.$data['vehicle'];
						
						
						
					}
					if(isset($data['address']))
					{
						$address =' '.$data['address'];
						
						
						
					}
					if(isset($data['email']))
					{
						$email =' '.$data['email'];
						
						
						
					}
					if(isset($data['salutation']))
					{
						$name.=' '.$data['salutation'];
						
						
						
					}
					if(isset($data['firstname']))
					{
						$name.=' '.$data['firstname'];
						
						
						
					}
					if(isset($data['lastname']))
					{
						$name.=' '.$data['lastname'];
						
						
						
					}
					
					$tmplate=str_replace('$name',$name,$tmplate);
					$tmplate=str_replace('$email',$email,$tmplate);
					$tmplate=str_replace('$addreas',$address,$tmplate);
					$tmplate=str_replace('$city',$city,$tmplate);
						$tmplate=str_replace('$vehicle',$vehicle,$tmplate);
					$tmplate=str_replace('$phone',$phone,$tmplate);
						
					$mail->MsgHTML($tmplate);

					$result = $mail->Send();
					// pr('sss');
					// pr( $mail);die;
					// return $result;
				}
				// pr($sql);die;
				
				
			return true;
			
		}
		else
		{
			return false;
		}
	}
	function addRegistrationcrul($data){
		GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
		$field = '';
		$value = '';
		foreach($data as $key=>$each){
			$field = $field.$key.',';
			if(is_numeric($each)){
				$value = $value.$each.',';
			}else{
				$value = $value.'\''.$each.'\',';
			}
			
		}
		$field = substr($field,0,-1);
		$value = substr($value,0,-1);
		
		/* pr($field);
		pr($value);exit; */
		$sql = "INSERT INTO custom_registration ($field) VALUE ($value)";
		
		$this->logger->log($sql);
		// pr($sql);die;
		$hasilresult = $this->apps->query($sql);
		if($hasilresult)
		{
		
				if(isset($data['email']))
				{
					$tmplate=$LOCALE[1]['EMAIL_Register'];
					$name='';
					$email='-';
					$phone='-';
					$address='-';
					$city='-';
					$vehicle='-';
					
					/* if(isset($data['city']))
					{
						$city =' '.$data['city'];
						
						
						
					} */
					if(isset($data['phone']))
					{
						$phone =' '.$data['phone'];
						
						
						
					} 
					if(isset($data['vehicle']))
					{
						$vehicle =' '.$data['vehicle'];
						
						
						
					}
				/* 	if(isset($data['address']))
					{
						$address =' '.$data['address'];
						
						
						
					} */
					if(isset($data['email']))
					{
						$email =' '.$data['email'];
						
						
						
					}
					/* if(isset($data['salutation']))
					{
						$name.=' '.$data['salutation'];
						
						
						
					} */
					if(isset($data['firstname']))
					{
						$name.=' '.$data['firstname'];
						
						
						
					}
					if(isset($data['lastname']))
					{
						$name.=' '.$data['lastname'];
						
						
						
					}
					


					$tmplate=str_replace('$name',$name,$tmplate);
					$tmplate=str_replace('$email',$email,$tmplate);
					/* $tmplate=str_replace('$addreas',$address,$tmplate); */
					/* $tmplate=str_replace('$city',$city,$tmplate); */
						$tmplate=str_replace('$vehicle',$vehicle,$tmplate);
					$tmplate=str_replace('$phone',$phone,$tmplate); 
				
						$ch = curl_init();
					  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					  curl_setopt($ch, CURLOPT_USERPWD, 'api:key-031f6c645c2c27d331e152ba8a959e28');
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
					  curl_setopt($ch, CURLOPT_URL, 
								  'https://api.mailgun.net/v3/mybmw.co.id/messages');
                                          curl_setopt($ch, CURLOPT_POSTFIELDS,
                                                                        array('from' => 'Registration <registration@mybmw.co.id>',
                                                                                  'to' => 'BMW Mission Impossible <bmwmissionimpossible@gmail.com>',
                                                                                  //'cc' => 'rifky.prakoso@kana.co.id',
                                                                                  'subject' => $LOCALE[1]['EMAIL_Register_subject'],
                                                                                  'html' => $tmplate,));
                                          $result = curl_exec($ch);
                                          $info = curl_getinfo($ch);            
                                          //curl_close($ch);
                                          //return true;

                                          // pr($info);exit;
                                          //pr($result);exit;
                                          $res = json_decode($result,TRUE);

                                          if($info['http_code']!='200'){
                                                $results['msg']=$res['message'];
                                                $results['status']='0';
                                          }
                                          else{
                                                $results['msg']=$res['message'];
                                                $results['status']='1';
                                          }
                                          curl_close($ch);
                                          return $results;

				}
				
		}
		else
		{
			return false;
		}
		// pr( $info);
	// die;
	}
	
	function apibmw($files=null,$data){
		// pr('data'); die;
		global $CONFIG;
	
		$firstname = $data['firstname'];
		$lastname = $data['lastname'];
		$phone = $data['phone'];
		$email = $data['email'];
		//$photo = $data['photo'];
		
		if($files==null || $files==''){
		
			$sql = "
					INSERT {$this->config['DATABASE'][0]['DATABASE']}.apibmw SET
					`firstname`= '{$firstname}',
					`lastname`='{$lastname}',
					`phone`='{$phone}',
					`email`='{$email}',
					`photo`='',
					`created`=NOW()
					
					";
			
		}else{
		
			$sql = "
					INSERT {$this->config['DATABASE'][0]['DATABASE']}.apibmw SET
					`firstname`= '{$firstname}',
					`lastname`='{$lastname}',
					`phone`='{$phone}',
					`email`='{$email}',
					`photo`='{$files}',
					`created`=NOW()
					";	
		}
		
		//pr($sql);
		$rs = $this->apps->query($sql); 
		$idusers=$this->apps->getLastInsertId();
		
		$sql = "SELECT * FROM apibmw
				WHERE id={$idusers}";
			//pr($sql);
			$resGetMember = $this->apps->fetch($sql); 
			$dataArray = array(
				'firstname'=>$resGetMember['firstname'],
				'lastname'=>$resGetMember['lastname'],
				'email'=>$resGetMember['email'],
				'phone'=>$resGetMember['phone'],
				'link'=>'http://www.mybmw.co.id/public_assets/apibmw/'.$resGetMember['photo']
			);
			$link = urlencode64(serialize(array(
				'status'=>'1',
				'abc'=>$resGetMember['photo']
			))); 
		//pr($link);
		//pr($dataArray);
		//pr($link);
		
		if($resGetMember > 0){
		$returnEmail = $this->send_member($dataArray,$link);
		echo json_encode(array('status'=>1,'message'=>'send email')); die;}
		
		return true;
	}
	
	function send_member($dataArray=null,$link=null) {  
		global $LOCALE;
		$link1 = 'mybmw.co.id/public_assets/apibmw/'.$link;
		//pr($link);
		if($dataArray){
			$results['msg']='';
			$results['status']='';
			$template = $LOCALE[1]['fotomember'];
			$template = str_replace('!#name',$dataArray['firstname'],$template);
			$template = str_replace('!#chaptername',$dataArray['lastname'],$template);
			$template = str_replace('!#link',$dataArray['link'],$template);			
			//$template = str_replace('!#link',$this->config['BASE_DOMAIN'].'memberreg/'.$link,$template);
				// pr($template);die;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, 'api:key-031f6c645c2c27d331e152ba8a959e28');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_URL, 
					  'https://api.mailgun.net/v3/mybmw.co.id/messages');
			curl_setopt($ch, CURLOPT_POSTFIELDS, 
							array('from' => 'MY BMW <personal.concierge@mybmw.co.id>',
								  'to' => $dataArray['email'],
								  'subject' => "Greeting from BMW Indonesia",
								  'html' => $template,
								  'o:campaign' => 'fkdf5'));
			$result = curl_exec($ch);
			$info = curl_getinfo($ch);
			// pr($info);
			// pr($result);
			$res = json_decode($result,TRUE);
			 
			if($info['http_code']!='200'){
					$results['msg']=$res['message'];
					$results['status']='0';
			}
			else{
				$results['msg']=$res['message'];
				$results['status']='1';				  
			}
			curl_close($ch);
			return $results;
		}
		$results['status']='0';
		return $results;
	}
	function addcustomer($data){
		global $CONFIG;
		//pr($data); exit;
		$salutation = $data['salutation'];
		$first = $data['firstname'];
		$last = $data['lastname'];
		$email = $data['email'];
		$phone = $data['phone'];
		$drive1 = $data['drive1'];
		$drive2 = $data['drive2'];
		$drive3 = $data['drive3'];
		$drive4 = $data['drive4'];
		$drive5 = $data['drive5'];
		
		
		$sql = "INSERT INTO `custom_registration` SET
							`salutation`='{$salutation}',
							`firstname`='{$first}',
							`lastname`='{$last}',							
							`email`='{$email}',
							`phone`='{$phone}',
							`drive1`='{$drive1}',
							`drive2`='{$drive2}',
							`drive3`='{$drive3}',
							`drive4`='{$drive4}',
							`drive5`='{$drive5}',
							
							`tanggalsubmit`=NOW()
							
							";
			//pr($sql);exit;
			
			$result= $this->apps->query($sql);
			$lastid=$this->apps->getLastInsertId();
			//pr($lastid); die;
			$sql = "select * from custom_registration where id=".$lastid;
			$hasil = $this->apps->fetch($sql);
			$dataArray = array(
				'email'=>$hasil['email'],
				'first'=>$hasil['firstname'],
				'last'=>$hasil['lastname'],
				'phone'=>$hasil['phone'],
				'drive1'=>$hasil['drive1'],
				'drive2'=>$hasil['drive2'],
				'drive3'=>$hasil['drive3'],
				'drive4'=>$hasil['drive4'],
				'drive5'=>$hasil['drive5']
			);
			$returnEmail = $this->send_addmemeber($dataArray);
			//pr($dataArray); die;
			return true;
	}
	function send_addmemeber($dataArray=null) {  
		global $LOCALE;
		
		if($dataArray){
			$results['msg']='';
			$results['status']='';
			$template = $LOCALE[1]['datacustomer'];
			$template = str_replace('!#name',$dataArray['first'],$template);
			$template = str_replace('!#email',$dataArray['email'],$template);
			$template = str_replace('!#phone',$dataArray['phone'],$template);
			$template = str_replace('!#drive1',$dataArray['drive1'],$template);
			$template = str_replace('!#drive2',$dataArray['drive2'],$template);
			$template = str_replace('!#drive3',$dataArray['drive3'],$template);
			$template = str_replace('!#drive4',$dataArray['drive4'],$template);
			$template = str_replace('!#drive5',$dataArray['drive5'],$template);
			//$template = str_replace('!#link','http://www.supersoccer.co.id/sscrregion1/memberreg/reactivate/'.$link,$template);
			//$template = str_replace('!#link',$this->config['BASE_DOMAIN'].'memberreg/reactivate/'.$link,$template);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, 'api:key-031f6c645c2c27d331e152ba8a959e28');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_URL, 
					  'https://api.mailgun.net/v3/mybmw.co.id/messages');
			curl_setopt($ch, CURLOPT_POSTFIELDS, 
							array('from' => 'Registration <registration@mybmw.co.id>',
                                  'to' => 'BMW Driving Experience <contact.us@bmw.co.id>',
                                  'cc' => 'BMW Driving Experience <call.center@partner.bmw.co.id>',
                                  'bcc' => 'BMW Driving Experience <Alexander.Hartantyo-Widodo@bmw.co.id>',
							
								  'subject' => $LOCALE[1]['EMAIL_Register_subject'],
                                  'html' => $template,));
			$result = curl_exec($ch);
			$info = curl_getinfo($ch);
			// pr($info);
			// pr($result);
			$res = json_decode($result,TRUE);
			 
			if($info['http_code']!='200'){
					$results['msg']=$res['message'];
					$results['status']='0';
			}
			else{
				$results['msg']=$res['message'];
				$results['status']='1';				  
			}
			curl_close($ch);
			return $results;
		}
		$results['status']='0';
		return $results;
	}
}
?>
