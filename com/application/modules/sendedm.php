<?php
class sendedm extends App{	

	function main() {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$rname = $_POST['rname'];
		$remail = $_POST['remail'];
		for ($i=0; $i < count($remail) ; $i++) { 
			$message = '<html><body>';
			$message .= '<a href="http://www.mybmw.co.id/greetingcard"><img src="http://www.mybmw.co.id/assets/images/piano/edm.jpg" alt="EDM" /></a>';
		
			$message .= "</body></html>";
	     
			$to = $remail[$i];
		
			$subject = 'EDM to '.$rname[$i];
		
			$headers = "From: contact.us@bmw.co.id\r\n";
			$headers .= "Reply-To: contact.us@bmw.co.id\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	    		if (mail($to, $subject, $message, $headers)) {
	      			$fp = fopen('/home/mybmw/public_html/assets/data/data.csv', 'a+');
				fwrite($fp,$name.",".$email.",".$rname[$i].",".$remail[$i]."\r\n");
				fclose($fp);
				echo 'Your message has been sent.';
	    		} else {
	      			echo 'There was a problem sending the email.';
	    		}
		}
	}
}
