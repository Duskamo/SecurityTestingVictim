<?php
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

$query = $link->prepare("SELECT c.Comment AS Comment FROM users u, comments c WHERE u.Id = c.UserId AND u.Username =?"); 
$query->bind_param('s',$_SESSION['username']);

$query->execute();

$result = $query->get_result();

while ($row = $result->fetch_assoc()) {
	echo $row{'Comment'} . ",";
}

$query->close();
$link->close();
?>