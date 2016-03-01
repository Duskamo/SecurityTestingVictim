
<?php  
//Start the Session
header('Location: http://localhost/securitytesting/fun.html');
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

if (isset($_POST['user']) and isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];

	$query = $link->prepare("SELECT Username, Pass FROM users WHERE Username='{$username}' AND Pass='{$password}'");
	//$query->bind_param('ss',$user,$pass);
	
	$query->execute();
	 
	$result = $query->get_result();
	
	$count = mysqli_num_rows($result);
	
	$query->close();
	$link->close();

	if ($count == 1){
		$_SESSION['username'] = $username;
		//echo "http://localhost/securitytesting/fun.html";
		header('Location: http://localhost/securitytesting/fun.html');
	}else{
		echo "Invalid Login Credentials.";
	}
}


/*
$result = $query->get_result();
while ($row = $result->fetch_assoc()) {
	echo " Name: " . $row{'Username'} . ", Password: " . $row{'Pass'} . "<br \>";
}
*/
?>