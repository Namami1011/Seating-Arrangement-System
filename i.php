<?php
  class I{
  public function Insert($y,$t,$r)
	{
		$user = 'root';
// database password
$pass = '';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=testdb';

// data to be inserted
$data = array('y' 	=> $y,
			  't' => $t,
			 'r'   => $r);

// use try { // code } catch (PDOException $e) { // code } to trap errors
try {
	// PDO class represents the connection
	$pdo = new PDO($dsn, $user, $pass);

	// SQL
	$sql = 'INSERT INTO `stu`(`y`, `t`,`r`) '
		 . 'VALUES (:y, :t, :r)';
	
	// prepare
	$stmt = $pdo->prepare($sql);
	
	// execute
	$result = $stmt->execute($data);

	//echo 'RESULT: ', $result;
	
	// closes the database connection
	$pdo = NULL;

// traps any exceptions which might be thrown
} catch (PDOException $e) {
	echo $e->getMessage();
	echo $e->getTraceAsString();
}
	}
	public function Ins($y,$ct,$r)
	{
		$user = 'root';
// database password
$pass = '';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=testdb';

// data to be inserted
$data = array('y' 	=> $y,
			  'ct'	=> $ct,
			 'r'   => $r);

// use try { // code } catch (PDOException $e) { // code } to trap errors
try {
	// PDO class represents the connection
	$pdo = new PDO($dsn, $user, $pass);

	// SQL
	$sql = 'INSERT INTO `stu1`(`y`, `ct`, `r`) '
		 . 'VALUES (:y, :ct, :r)';
	
	// prepare
	$stmt = $pdo->prepare($sql);
	
	// execute
	$result = $stmt->execute($data);

	//echo 'RESULT: ', $result;
	
	// closes the database connection
	$pdo = NULL;

// traps any exceptions which might be thrown
} catch (PDOException $e) {
	echo $e->getMessage();
	echo $e->getTraceAsString();
}
	}
	}