
<?php  
//Start the Session
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

if (isset($_POST['user']) and isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];

	$query = $link->prepare("SELECT * FROM users WHERE Username='{$username}' AND Pass='{$password}'");
	//$query->bind_param('ss',$username,$password);
	
	$query->execute();
	 
	$result = $query->get_result();
	
	$count = mysqli_num_rows($result);
	
	$query->close();
	$link->close();

	if ($count == 1){
		$_SESSION['username'] = $username;
		header('Location: http://localhost/securitytesting/fun.html');
	}else{
		header('Location: http://localhost/securitytesting/index.html');
	}
}
?>