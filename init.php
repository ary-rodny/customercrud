<?php


require_once './vendor/autoload.php';

if(session_id() == ""){
  session_start();
}


// ini_set('display_errors','stderr');

define("APP_ROOT",dirname(__FILE__));
define("CONFIG_FILE",APP_ROOT. DIRECTORY_SEPARATOR. 'config.php');


// //load classes
//  spl_autoload_register(function($class){
//     include APP_ROOT. DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.$class.'.php';
//  });


function testInput($data)
{
  $data = stripslashes($data);
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
}








