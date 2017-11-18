<?php
$myfile = fopen("maketp.html", "w") or die("Unable to open file!");

 $user = 'codev4jm_market';
// database password
$pass = 'market12#$';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=www.ccbul.com;dbname=codev4jm_marketplace';

// PDO class represents the connection
$dbh = new PDO($dsn, $user, $pass);

// SQL statement
$sql = 'SELECT * FROM `market_run`';

$output="";
                                      $output .=   '<html>';
                                      $output .=  	'<head>';
                                       $output .= 	'</head>';
                                                     
										$output .= 	'<body>';
										$output .= 	'<table>';
foreach ($dbh->query($sql, PDO::FETCH_ASSOC) as $row) {
	// each $row = an associative array representing one row in the database
	// the key = the column name
	$output .='<tr><td>' .implode('</td><td>', $row). '</td></tr>';
}
$output .='</table>';

// closes the database connection
$dbh = NULL;
 
                                      $output .=  	'<head>';
                                      
                                                     
										$output .= 	'</body>';
  
                                          $output .= 	'</html>';            
                                        
                                                     
                                  
fwrite($myfile, $output);
fclose($myfile);

header("refresh:2;marketp.html");
?>