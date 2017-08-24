<?php
	
	spl_autoload_register(function($class){
  		require_once 'classes/'.$class.'.php';
	});

	$system     = new Database;
	$baseurl    = new BaseURL;
	$upload     = new Upload;
	$unduh      = new Unduh;
	$validation = new validation;
	$fileid     = new FileID;

?>