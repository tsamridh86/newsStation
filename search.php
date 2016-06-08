<!DOCTYPE html>
<head>
<link rel = "stylesheet" href="css/searchStyle.css">
</head>
<title><?php if(!empty($_GET['category'])) echo $_GET['category']." news"; ?></title>
<?php require 'css/bootstrap.php';?>
<div class="container-fluid background-color-orange">
<div class="container background-color-white">
 <?php
    if (!empty($_GET['category']))
    	{
    		echo "<h3 class = 'heading' > News for ".$_GET['category']." : </h3>";
    		require 'config/dbaccess.php';
    		require 'config/functionBundle.php';
    		$que = "select * from article natural join users where category = '".$_GET['category']."' order by timeOfUpload desc; ";
    		$result = $connect->query($que);
    		while($row = $result->fetch_assoc())
    		  showArticle($row['heading'],$row['firstName']." ".$row['lastName'],$row['textLocation'] , $row['inputType'], $row['category'],$row['imgLoc'], $row['timeOfUpload']);
    		$connect->close();
    	}
    if (!empty($_GET['category']))
        {
            echo "<h3 class = 'heading' > News for ".$_GET['category']." : </h3>";
            require 'config/dbaccess.php';
            require 'config/functionBundle.php';
            $que = "select * from article natural join users where category = '".$_GET['category']."' order by timeOfUpload desc; ";
            $result = $connect->query($que);
            while($row = $result->fetch_assoc())
              showArticle($row['heading'],$row['firstName']." ".$row['lastName'],$row['textLocation'] , $row['inputType'], $row['category'],$row['imgLoc'], $row['timeOfUpload']);
            $connect->close();
        }   	
 ?>
</div>	
</div>
</html>