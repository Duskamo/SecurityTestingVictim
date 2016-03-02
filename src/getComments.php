<?php
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

$query = $link->prepare("SELECT c.Comment AS Comment FROM users u, comments c WHERE u.Id = c.UserId AND u.Username = '" . $_SESSION['username'] . "'"); 

//$query->bind_param('ss',$user,$pass);

$query->execute();

$result = $query->get_result();

while ($row = $result->fetch_assoc()) {
	echo $row{'Comment'} . ",";
}

$query->close();
$link->close();
?>