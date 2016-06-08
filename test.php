<?php

	require 'config/dbaccess.php';
	$res = $connect->query("select * from article where articleId = 1");
	$res = $res->fetch_assoc();
	echo calcTime($_SERVER['REQUEST_TIME']-$res['timeOfUpload']);

?>