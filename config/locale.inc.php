<?php
$LOCALE['REDIRECT_LOGIN'] = '';

/*
• Follow			[Nama User] sekarang follow kamu								[Nama User] telah menjadi follower [Nama User B]
• Comment			[Nama User] telah memberikan komentar di postinganmu			[Nama User] berkomentar di [Nama Postingan]
• Favorit			[Nama User] telah menambahkan postinganmu sebagai favoritnya	[Nama User] telah memfavoritkan [Nama Postingan]
• Upload			x																[Nama User] telah mem-upload karya barunya
• Attending			x																[Nama User] berencana untuk datang ke [Nama Event]
• Play music/video	x																[Nama User] menyimak [Nama Lagu/Video]
• Cover image		x																[Nama User] telah memperbaharui foto cover-nya
• Avatar			x																[Nama User] telah memperbaharui foto profilnya
• Add playlist		x																[Nama User] punya playlist baru!
• Contest			x																[Nama User] telah ikut berpartisipasi di [Nama Kontes]
• Forum				[Nama User] telah memberikan komentar di thread kamu			[Nama User] telah memulai sebuah thread baru di Forum A360
*/


/* GENERAL */

$LOCALE[1]['datacustomer'] ='<html>
                                                                <head>
                                                                <title>Register MyBMW</title>
                                                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                                                </head>
                                                                <body bgcolor="#000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
                                                                <table  width="700" border="0" cellpadding="0" cellspacing="0">
                                                                        
                                                                        <tr>
                                                                                <td>
                                                                                        
																					<div><p>Dear Mr./Mrs. !#name !#last</p></div>
																					<div><p>Email : !#email</p></div>
																					<div><p>Phone : !#phone</p></div>
																					<div><p>!#drive1</p></div>
																					<div><p>!#drive2</p></div>
																					<div><p>!#drive3</p></div>
																					<div><p>!#drive4</p></div>
																					<div><p>!#drive5</p></div>
                                                                                </td>
                                                                        </tr>
                                                                        
                                                                </table>
                                                                <!-- End Save for Web Slices -->
                                                                </body>
                                                                </html> ';

$LOCALE[1]['fotomember'] ='<html>
                                                                <head>
                                                                <title>The all-new BMW 7 Series Launch Moments</title>
                                                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                                                </head>
                                                                
																								<img src="!#link">
																								
																								
                                                                </html> ';

/* INBOX */
$LOCALE[1]['validation']['confirmpassword']='wrong format password and your confirmed password not correct';


/* EMail */

//resendemail
$date=date('l d').' of  '.date(' F Y H:i:s A');
	$LOCALE[1]['EMAIL_Register_subject']='Register';
	$LOCALE[1]['EMAIL_Register']='<html xmlns="http://www.w3.org/1999/xhtml">
												  <head>
													<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
													<title>Register</title>
												  </head>

												 <body>
													 <div style="max-width:600px; margin:0 auto; font-size:14px; font-family:Arial, Helvetica, sans-serif;">
														<p> <strong>Hi </strong> </p>
														
														<p ><strong> Please find the registration data submission from EDM - Form Registration below.</strong></p>
														<br>
														'.$date.'
														<br>
														=========================================
														<br>
														<p>SUBMISSION DETAILS</p>
														 <p>Name: $name </p>
														 <p>Email: $email</p>
														  <p>Address: $addreas</p>
														    <p>Phone: $phone</p>
														   <p>City: $city</p>
														     <p>Vehicle: $vehicle</p>
															<p> Campaign Detail : BMW Active Tourer Launch RSVP </p>
														  <p>
														 <br> 
														=========================================
														<br>
														 
														
														
													</div>
												</body>
												</html>';



	?>
