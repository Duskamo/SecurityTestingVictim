<?php
if (empty($_SESSION['username'])) {
	echo "";
} else {
	echo "<ul class='nav navbar-nav navbar-right'><li><a href='/securitytesting/src/logout.php'>Logout</a></li></ul>";
}
?>