<?php
if (empty($_SESSION['username'])) {
	header("Location: /securitytesting/index.html");
} 
?>