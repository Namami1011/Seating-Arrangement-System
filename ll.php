<?php 
error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig1.php';
 $trade=$_POST['trade'];
  $year=$_POST['year'];
  $stu=$_POST['stu'];
  $room=$_POST['room'];
$stu=$_POST['stu'];
  $rollno=0;
  $roll=0;
 $rollno=$year*10000;
 $roll=$year*10000;
 if($trade=="it"){
     $rollno=$rollno+3000;
     $roll=$roll+5000;
 }
else if($trade=="cse"){
    $rollno=$rollno+1000;
    $roll=$roll+4000;
}
else if($trade=="ce"){
    $rollno=$rollno+4000;
    $roll=$roll+1000;
}
else if($trade=="ee"){
    $rollno=$rollno+2000;
    $roll=$roll+6000;
}
    
else if($trade=="aeie"){
    $rollno=$rollno+6000;
    $roll=$roll+2000;
}
else if($trade=="ece"){
    $rollno=$rollno+5000;
    $roll=$roll+3000;
}
$stmt = $DB_con->prepare('INSERT INTO tbl_list(rollno,roll) VALUES(:rollno,:roll)');
			$stmt->bindParam(':rollno',$rollno);
			$stmt->bindParam(':roll',$roll);
			
			$stmt->execute();

			
