<?php 
	require_once("class.user.php");
	require_once("i.php");
	$ii = new I();
	$auth_user = new USER();
	
    
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
     $rollno=$rollno+3001;
     $roll=$roll+5001;
 }
else if($trade=="cse"){
    $rollno=$rollno+1001;
    $roll=$roll+4001;
}
else if($trade=="ce"){
    $rollno=$rollno+4001;
    $roll=$roll+1001;
}
else if($trade=="ee"){
    $rollno=$rollno+2001;
    $roll=$roll+6001;
}
    
else if($trade=="aeie"){
    $rollno=$rollno+6001;
    $roll=$roll+2001;
}
else if($trade=="ece"){
    $rollno=$rollno+5001;
    $roll=$roll+3001;
}
$stmt10 = $auth_user->runQuery("DELETE FROM stu WHERE y=:y");
	$stmt10->execute(array(":y"=>$year));
$stmt11 = $auth_user->runQuery("DELETE FROM stu WHERE y=:y");
	$stmt11->execute(array(":y"=>$year));
for($i=0;$i<$stu;$i++){
	if($i%20==0)
		$room=$room+1;
    $ii->Insert($year,$rollno,$room);
	$ii->Ins($year,$roll,$room);
	
	$rollno+=1;
	$roll+=1;
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seat Arrangement System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/wow.min.js"></script>
    <script>
         new WOW().init();
       
    </script>
</head>
<body>
<div class="container">
<div class="row small center wow fadeInDown top__element" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
          <h1 align=center>  Seat Arrangement System</h1>
          </div>
</div>
    <br>
<div class="container-fluid">
    
	<div class="row">
		<div class="col-lg-4" style="background-color: #ffffff"></div>
		<div class="col-lg-4" id="signup" style="background-color: ##228B22;" align=middle>
            <div id="signup" class="wow rubberBand" data-wow-delay="2000ms" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 2000ms; animation-name: rubberBand;">
                      <div class="wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 300ms; animation-iteration-count: infinite; animation-name: pulse;">
                        <h1> Result produced </h1>
                      </div>
                    </div>
            
        </div>
	</div>
	<div class="row">
		<div class="col-lg-4" style="background-color: #ffffff"></div>
		<div class="col-lg-4" id="signup" style="background-color: ##228B22;" align=middle>
            <div id="signup" class="wow rubberBand" data-wow-delay="2000ms" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 2000ms; animation-name: rubberBand;">
                      <div class="wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 300ms; animation-iteration-count: infinite; animation-name: pulse;">
                       <a href="result.php?year= <?php echo $year ?>" > <h1> See Result </h1> </a>
                      </div>
                    </div>
            
        </div>
	</div>