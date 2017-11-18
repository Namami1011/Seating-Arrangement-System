<?php
	class DBConfig1 {
    private $crossHostName = 'www.codeversal.com';
	private $crossBDUsername = 'codevers_admin';
	private $crossDBPass = 'admin12#$';
	private $crossDBName = 'codevers_admin';
	
	
	function __construct(){
	$CODES_DB_CONN = $this->connectDB();
		if(!empty($CODES_DB_CONN)){
			$this->selectDB($CODES_DB_CONN);
		}
	}
	
	// database connect mysqli
	function connectDB(){
		global $CODES_DB_CONN;
		$CODES_DB_CONN = mysqli_connect($this->crossHostName,$this->crossBDUsername,$this->crossDBPass,$this->crossDBName);
		return $CODES_DB_CONN;
	}
	
	//mysqli connect
	function selectDB($CODES_DB_CONN){
		mysqli_select_db($CODES_DB_CONN,$this->crossDBName);
	}
	
	function runQuery($query){
	$result = mysqli_query($CODES_DB_CONN,$query);
	if(result){
		while($row=mysqli_fetch_assoc($results)){
				$resultset[] = $row;
		}
	}
	if(!empty($resultset))
		return $resultset;
	}
	
	function numRows($query){
		$result = mysqli_query($CODES_DB_CONN,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}
?>