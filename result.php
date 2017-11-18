<?php
 error_reporting( ~E_NOTICE ); // avoid notice
	
	
	require_once("class.user.php");
	require_once("i.php");
	$ii = new I();
	$auth_user = new USER();
   
	//echo $maxProducts;
	//echo $userRow10[20]['t'];
	
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 0;
//echo $page;
if(isset($_GET['cart']))
{ 
        
         $user = 'root';
// database password
$pass = '';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=testdb';
           $rollno=$_GET['cart'];
		   

// use try { // code } catch (PDOException $e) { // code } to trap errors
try {
	// PDO class represents the connection
	$pdo = new PDO($dsn, $user, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// SQL
	$sql = 'DELETE FROM `stu` WHERE `t` = :t;';

// prepare
$stmt = $pdo->prepare($sql);

// execute
$result = $stmt->execute(array('t' => $rollno));

   // header("refresh:0.05;table.php"); 
	
	// closes the database connection
	$pdo = NULL;

// traps any exceptions which might be thrown
} catch (PDOException $e) {
	echo $e->getMessage();
	echo $e->getTraceAsString();
}

			
			
}
if(isset($_GET['bart']))
{
	  
         $user = 'root';
// database password
$pass = '';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=testdb';
           $rollno=$_GET['bart'];

// use try { // code } catch (PDOException $e) { // code } to trap errors
try {
	// PDO class represents the connection
	$pdo = new PDO($dsn, $user, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// SQL
	$sql = 'DELETE FROM `stu1` WHERE `ct` = :ct;';

// prepare
$stmt = $pdo->prepare($sql);

// execute
$result = $stmt->execute(array('ct' => $rollno));

   // header("refresh:0.05;table.php"); 
	
	// closes the database connection
	$pdo = NULL;

// traps any exceptions which might be thrown
} catch (PDOException $e) {
	echo $e->getMessage();
	echo $e->getTraceAsString();
}

			
			
}
 $year=(int) $_GET['year'];
	//echo $year;
$stmt10 = $auth_user->runQuery("SELECT * FROM stu WHERE y=:y");
	$stmt10->execute(array(":y"=>$year));
	
	$userRow10=$stmt10->fetchAll();
	$maxProducts=count($userRow10);
$stmt11 = $auth_user->runQuery("SELECT * FROM stu1 WHERE y=:y");
	$stmt11->execute(array(":y"=>$year));
	
	$userRow11=$stmt11->fetchAll();
	$maxProducts1=count($userRow11);

//$id+= $cart;
// use "ternary" operator to check to see if page is 0
$prev = ($page == 0) ? 0 : $page - 1;
$next = $page + 1;
$linesPerPage = 20;

function displayProducts($page, $linesPerPage, $maxProducts, $userRow10,$userRow11)
{
	$line=$linesPerPage/2;
	$offset = $page * $linesPerPage;
	$output = '';
	for($x = 0; $x < $line; $x++) {
		if (($x + $offset >= $maxProducts)) {
			break;
		}
		                              
		                            
		                           $output .= '<div class="row" >';
                      
                           $output .=' <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">';
                           $output .=' <div class="col-md-6" id="cse">'.$userRow10[$x+$offset]['t'].'<a href="result.php?cart='.$userRow10[$x+$offset]['t']. '&year='.$userRow10[$x+$offset]['y'].'"><i class="glyphicon glyphicon-remove"></i></a></div>';
                      	$output .= '</div>';
                        $output .= '<div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> ';
						$output .=' <div class="col-md-6" id="cse">'.$userRow11[$x+$offset]['ct'].'<a href="result.php?bart='.$userRow11[$x+$offset]['ct']. '&year='.$userRow11[$x+$offset]['y'].'"><i class="glyphicon glyphicon-remove"></i></a></div>';
						$output.='</div>';
                      
                        $output.='</div>';  
	}
	return $output;
}
function displayP($page, $linesPerPage, $maxProducts, $userRow10,$userRow11)
{
	$offset = $page * $linesPerPage;
	$output = '';
	$line=$linesPerPage/2;
	for($x = $line; $x < $linesPerPage; $x++) {
		if ($x + $offset >= $maxProducts) {
			break;
		}
		             $output .= '<div class="row" >';
                      
                           $output .=' <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">';
                           $output .=' <div class="col-md-6" id="cse">'.$userRow10[$x+$offset]['t'].'<a href="result.php?cart='.$userRow10[$x+$offset]['t']. '&year='.$userRow10[$x+$offset]['y'].'"><i class="glyphicon glyphicon-remove"></i></a></div>';
                      	$output .= '</div>';
                        $output .= '<div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> ';
						$output .=' <div class="col-md-6" id="cse">'.$userRow11[$x+$offset]['ct'].'<a href="result.php?bart='.$userRow11[$x+$offset]['ct']. '&year='.$userRow11[$x+$offset]['y'].'"><i class="glyphicon glyphicon-remove"></i></a></div>';
						$output.='</div>';
                      
                        $output.='</div>'; 
		                              	}
	return $output;
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
                        <h1> Result </h1>
                      </div>
                    </div>
            
        </div>
		<div class="col-lg-4" style="background-color: #ffffff" ></div>
	</div>

   <!--<div class="row">
       <div class="col-lg-4" style="background-color: #ffffff"></div>
		<div class="col-lg-4"  ><div align=center><div data-wow-delay="0.5s" class="span3 wow bounceInDown center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInDown;"><h1><kbd>
                Room no : <?php echo $room ?> </kbd>
            </h1></div>
            </div>
       </div>
    -->
		<div class="col-lg-4" style="background-color: #ffffff" ></div>
    </div>

    <div class="row">
       
    <div class="col-lg-3" style="background-color: #ffffff">
       
        </div>
      <div class="col-lg-3" style="background-color: #ffffff">
            	<div class="well well-lg" align=middle >
               
                 <!-- <div class="row" >
                      
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    -->

                  <?php echo displayProducts($page, $linesPerPage, $maxProducts, $userRow10,$userRow11); ?>
           </div>
         
        
        </div>

     <div class="col-lg-3" style="background-color: #ffffff">
            	<div class="well well-lg" align=middle >
            
                  <!--<div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    
                     <div class="row" >
                      <div data-wow-iteration="5" data-wow-duration="0.15s" class="span3 wow pulse" style="visibility: visible; animation-duration: 0.15s; animation-iteration-count: 5; animation-name: pulse;">
                      <div class="col-md-6" id="cse"><?php echo $rollno++ ?>
                      </div>	
                      </div>
                      <div data-wow-delay="0.5s" class="span3 wow bounceInUp center" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;"> <div class="col-md-6" id="it"><?php echo $roll++ ?>
                      </div></div>
                      
                    </div>
                    -->
					
									<?php echo displayP($page, $linesPerPage, $maxProducts, $userRow10,$userRow11); ?>
                                        
                                  
                 
           </div>
         
        
        </div>
        
        
        
        <div class="col-lg-3" style="background-color: #ffffff">
       
        </div>
		</br>
		 
   </ul>
    </div>
   <div class="row">
		<div class="col-lg-4" style="background-color: #ffffff"></div>
		<div class="col-lg-4" id="signup" style="background-color: ##228B22;" align=middle>
            <div id="signup" class="wow rubberBand" data-wow-delay="2000ms" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 2000ms; animation-name: rubberBand;">
                      <div class="wow pulse animated" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 300ms; animation-iteration-count: infinite; animation-name: pulse;">
                        <ul class="pager">
  <li class="previous"><a href="result.php?page=<?php echo $prev;?>&year=<?php echo $year?>">Previous</a></li>
  <li class="next"><a href="result.php?page=<?php echo $next;?>&year=<?php echo $year?>">Next</a></li>
  
   </ul>
                      </div>
                    </div>
            
        </div>
		<div class="col-lg-4" style="background-color: #ffffff" ></div>
	</div>

   
    
</div>
</body>
</html>



