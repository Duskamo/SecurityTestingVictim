
<?php
session_start();
require_once("Utils/db_info.php");
require_once("Utils/database.php");

$comment = $_POST['comment'];

$query = $link->prepare("SELECT Id FROM users WHERE Username = '{$_SESSION['username']}';"); 

//$query->bind_param('ss',$user,$pass);

$query->execute();
$result = $query->get_result();
$row = $result->fetch_assoc();

$query = $link->prepare("INSERT INTO comments (`Comment`,`UserId`) VALUES ('{$comment}','{$row{'Id'}}');");
$query->execute();

echo $comment;

$query->close();
$link->close();
?>