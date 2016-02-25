<?php

require_once("db_info.php");

$user = $_POST["user"];
$pass = $_POST["pass"];

$link = new mysqli($db_hostname,$db_username,$db_password,$db_database);

$query = $link->prepare("SELECT Username, Pass FROM users WHERE Username='{$user}' AND Pass='{$pass}'");

//$query->bind_param('ss',$user,$pass);

$query->execute();

$result = $query->get_result();
while ($row = $result->fetch_assoc()) {
	echo " Name: " . $row{'Username'} . ", Password: " . $row{'Pass'} . "<br \>";
}

$query->close();
$link->close();

?>