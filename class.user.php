<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	/*public function register($id,$user_name,$password,$ad,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass) 
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	*/
	public function Insert($y,$t,$ct,$r)
	{
		$user = 'root';
// database password
$pass = 'password';
// data source = mysql driver, localhost, database = class
$dsn = 'mysql:host=localhost;dbname=testdb';

// data to be inserted
$data = array('y' 	=> $y,
			  't' => &$t,
			  'ct'	=> $ct,
			 'r'   => $r);

// use try { // code } catch (PDOException $e) { // code } to trap errors
try {
	// PDO class represents the connection
	$pdo = new PDO($dsn, $user, $pass);

	// SQL
	$sql = 'INSERT INTO `stu`(`y`, `t`, `ct`, `r`) '
		 . 'VALUES (:y :t, :ct, :r)';
	
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
		
	public function doLogin($user_name,$password)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id, user_name, password, Ad FROM tbl_users WHERE user_name=:user_name ");
			$stmt->execute(array(':user_name'=>$user_name));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($password, $userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
                    $_SESSION['user_cart']=0;
                    $GLOBALS['ca']=0;
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
    
}
?>