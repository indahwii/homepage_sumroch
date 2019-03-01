	<?php
	/**
	* This example shows settings to use when sending via Google's Gmail servers.
	* This uses traditional id & password authentication - look at the gmail_xoauth.phps
	* example to see how to use XOAUTH2.
	* The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
	*/
	//Import PHPMailer classes into the global namespace
	use PHPMailer\PHPMailer\PHPMailer;
	require 'vendor/autoload.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 2;
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "sumrochkaryaindonesia@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "jakmania28";
	//Set who the message is to be sent from
	$mail->setFrom('sumrochkaryaindonesia@gmail.com', 'Email from customer');
	//Set who the message is to be sent to
	$mail->addAddress('official@sumroch.com', 'Sumroch Official');
	//Set the subject line
	$mail->Subject = 'Message from '. $_POST['email'] . ' - ' . $_POST['handphone'];
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//Replace the plain text body with one created manually
	$mail->Body = 'About ' . $_POST['about'] . "\r\n\r\n". htmlspecialchars($_POST['message']);

	//send the message, check for errors
	if (!$mail->send()) {
	   echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	   echo "Message sent!";
	   header('location:'.$_SERVER['HTTP_REFERER']);
	   //Section 2: IMAP
	}

	?>