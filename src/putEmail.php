<?php
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

$email = $_POST["email"];

$query = $link->prepare("UPDATE users SET Email=? WHERE Username=?");
$query->bind_param('ss',$email,$_SESSION['username']);

$query->execute();

$result = $query->get_result();

if ($result == false) {
	echo $email;
}

$query->close();
$link->close();
?>