<?php 
 error_reporting( ~E_NOTICE ); // avoid notice
	
	
	require_once("class.user.php");
	require_once("i.php");
	$ii = new I();
	$auth_user = new USER();
    $year=(int) $_GET['year'];
	echo $year;
$stmt10 = $auth_user->runQuery("DELET * FROM stu ");
	$stmt10->execute();
?>