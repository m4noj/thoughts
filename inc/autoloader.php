<?php 

function autoload($class){
	$file_name = str_replace('\\', '/', $class).'.php'; 
	$file = __DIR__.'/../classes/'.$file_name;
	include_once $file;
}

spl_autoload_register('autoload');
