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
</head>
<body>
	<div class="container-fluid bigBack">
		<div class="container reading">
			hello there
		</div>
	</div>

</body>
</html>