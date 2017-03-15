<?php 
	$path = preg_replace('/wp-content(?!.*wp-content).*/','',__DIR__);
	include($path.'wp-load.php');
	
	
	$email = $_POST['email'];
	$name = $_POST['name'];
	$message = $_POST['message'];
	$checkbox = $_POST['checkbox'];
	$attachment = WP_CONTENT_DIR.''.$_POST['attachment'];
	
	if( $checkbox == 1 )
	{
		$cc = $_POST['email'];
	}else{
		$cc = "";
	}
	
	$messages = "<html><head><title>HTML email</title></head><body>
			<table>
				<tr>
				<th>Email</th>
				<th>Name</th>
				<th>Message</th>
				</tr>
				<tr>
				<td>".$email."</td>
				<td>".$name."</td>
				<td>".$message."</td>
				</tr>
			</table>
			</body>
			</html>
			";
	$headers[] = "MIME-Version: 1.0" . "\r\n";
	$headers[] = "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers[] = 'From: Enquiry <myname@example.com>' . "\r\n";
	$headers[] = 'Cc: '.$name.' <'.$cc.'>';
	wp_mail( 'contact@onlineadspaces.com', 'Ads', $messages, $headers, $attachment );	
	
?>