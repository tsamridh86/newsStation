<!DOCTYPE html>
<link rel = "stylesheet" href = "css/previewStyle.css">
<?php
	
	session_start();
	if(empty($_SESSION['user']))
		header("location:index.php");
	else 
	{
		require 'config/dbaccess.php';
		require 'css/bootstrap.php';
		require 'config/functionBundle.php';
		
		

		//This portions writes the body of the file into a text file.
		$name =  nameOfFile($_POST['category']);
		$name = "text/".$name;
		$file = fopen($name,"w");
		if(empty($_POST['advancedBody']))
		{
			$text = $_POST['normalBody'];
			$type = 'N';
		}
		else if(empty($_POST['normalBody']))
		{
			$text = $_POST['advancedBody'];
			$type = 'A';
		}
		
		fwrite($file, $text);
		fclose($file);


        
        //upload the image into the server
        //import image to the server page
		$file_temp = $_FILES['pic']['tmp_name'];
		$file_name = $_FILES['pic']['name'];
		$file_name = nameOfImage($file_name);
		move_uploaded_file($file_temp,"images/".$file_name);

		//to insert the things into the database.
		$ins = "insert into article (userName , textLocation , inputType , category , imgLoc , heading, timeOfUpload ) values ('".$_SESSION['user']."','".$name."','".$type."','".$_POST['category']."','"."images/".$file_name."','".$_POST['title']."',".$_SERVER['REQUEST_TIME'].")";
		$connect->query($ins);
		

		//now to generate the actual preview of the item:
		$res = "select * from article where textLocation = '".$name."';";
		$res = $connect->query($res);
		$res = $res->fetch_assoc();
		echo "
			<div class = 'container-fluid background-color-thistle'>
			<div class = 'container background-color-white'>
			<div class = 'row'> <div class = 'col-md-2'>
				<h2>".$res['heading']."</h2> </div>
				<div class = 'col-md-2 pull-right'><a href='index.php' class = 'redirect'>&rarr;Return to Home.</a></div></div>";
				if(!$res['imgLoc'])
					echo "<div class = 'banner'><img src = ".$res['imgLoc']." class = 'img-responsive'></div>";
			echo"<p class = 'time'>".calcTime(($_SERVER['REQUEST_TIME']-$res['timeOfUpload']))."</p>";
			if(!$res['category'])
				echo "<p class = 'hashtag'> #".$res['category']."</p>";
			if($res['inputType'] == 'N')
			{
			   echo "<p class = 'body-text'>";showText($res['textLocation']); echo "</p>";
			}
			else showText($res['textLocation']);
			echo "</div>
				   </div>
					";
		$connect->close();
	}

?>	
</html>