<?php
//Initial Time zone
date_default_timezone_set('Asia/Phnom_Penh');

//Application path
define('BASE_PATH',str_replace("\\","/",dirname(__FILE__)).'/');

$seftPath= strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
$seftPath .=$_SERVER['HTTP_HOST'].'/';
$seftPath .= trim(str_replace($_SERVER['DOCUMENT_ROOT'],'',BASE_PATH),"");

define('BASE_URL',$seftPath);
define('ADMIN_URL',BASE_PATH. 'admin/');

unset($seftPath);
//echo BASE_PATH ."<br>";
//echo ADMIN_URL;


