<?php
	//access to the database, it's various functions are required for this procedure.
	require "config/dbaccess.php";
	require "config/functionBundle.php";
	require "css/bootstrap.php";
	//retrieve the required contents of the database :
	$query = "select * from article where articleId = ".$_GET['id'];
	$result = $connect->query($query);
	$result = $result->fetch_assoc();
	$connect->close();
?>
<!DOCTYPE html>
<!--set the title of the page according to the title that has been given to it.-->
<title><?php echo $result['heading'];?></title>
<head>
	<link rel="stylesheet" type="text/css" href="css/displayStyle.css">
	<script src="scripts/displayScript.js"></script>
</head>
<body>
	<div class="container-fluid bigBack">
		<div class="container reading">
			<div class="alert alert-warning alert-dismissible" role="alert" id="topAlert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" id="closer"><span aria-hidden="true">&times;</span></button>
				<strong>Warning!</strong> Better check yourself, you're not looking too good.
			</div>
		</div>
	</div>
</body>
</html>