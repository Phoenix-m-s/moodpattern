<?php
error_reporting(E_ALL);
ini_set('error_display',0);
error_reporting(0);

session_start();
define("DB_TYPE","mysqli");
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");

define("DB_DATABASE","moodpatt_sensory_graph");
define("ROOT_DIR",dirname(__FILE__) ."/");

define("SUB_FOLDER","/moodpattern/");

define("RELA_DIR","http://".$_SERVER['HTTP_HOST']."/".SUB_FOLDER."");

///// Email Setting
define("SMTP_USERNAME","support@moodupper.com");
define("SMTP_PASSWORD","XK{,dL{C[rdi");
define("SMTP_SERVER","mail.moodupper.com");
define("SMTP_FROM","support@moodupper.com");
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);