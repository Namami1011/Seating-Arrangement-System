<?php

	$DB_HOST = 'www.ccbul.com';
	$DB_USER = 'codev4jm_market';
	$DB_PASS = 'market12#$';
	$DB_NAME = 'codev4jm_marketplace';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}