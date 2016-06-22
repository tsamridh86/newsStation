<title> Logout </title>
<?php
	require 'css/bootstrap.php';
	session_start();
	session_destroy();
?>

<div class="container">
	<p>Stay with us to remain updated.</p>
	<a href="index.php">Click here</a><p>To return to the website</p>
</div>