<?php
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

$query = $link->prepare("SELECT Email FROM users WHERE Username='{$_SESSION['username']}'"); 

//$query->bind_param('ss',$user,$pass);

$query->execute();

$result = $query->get_result();
$row = $result->fetch_assoc();

echo $row{'Email'};

$query->close();
$link->close();

?>