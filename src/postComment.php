
<?php
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

$comment = $_POST['comment'];

$query = $link->prepare("SELECT Id FROM users WHERE Username = ?;"); 
$query->bind_param('s',$_SESSION['username']);
$query->execute();

$result = $query->get_result();
$row = $result->fetch_assoc();

$query = $link->prepare("INSERT INTO comments (`Comment`,`UserId`) VALUES (?,?);");
$query->bind_param('si',$comment,$row['Id']);
$query->execute();

$query->close();
$link->close();
?>