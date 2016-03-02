<?php
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

$email = $_POST["email"];

$query = $link->prepare("UPDATE users SET Email='{$email}' WHERE Username='{$_SESSION['username']}'");

//$query->bind_param('ss',$user,$pass);

$query->execute();

$result = $query->get_result();

if ($result == false) {
	echo $email;
}

$query->close();
$link->close();
?>