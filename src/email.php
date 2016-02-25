<?php

require_once("db_info.php");

$email = $_POST["email"];

$link = new mysqli($db_hostname,$db_username,$db_password,$db_database);

$query = $link->prepare("SELECT Username, Pass FROM users WHERE Email='{$email}'");

//$query->bind_param('ss',$user,$pass);

$query->execute();

$result = $query->get_result();
while ($row = $result->fetch_assoc()) {
	echo " Name: " . $row{'Username'} . ", Password: " . $row{'Pass'} . "<br \>";
}

$query->close();
$link->close();

?>