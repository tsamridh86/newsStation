<!DOCTYPE html>
<link rel = "stylesheet" href = "css/previewStyle.css">
<?php
	
	//this function calculates the number of digits of a number, this is used the algorithms below
	function numberOfDigits($num)
	{
		if($num == 1 ) return 1;
		 return ceil(log10($num));
		
	}

	//this function calculates the name of the text file.
	function nameOfFile($category)
	{
		$category = $category.".txt";
		$i = 0;
		while(file_exists("text/".$category))
		{
			if(!$i) 
			$category = substr($category,0,-4).$i.substr($category, -4);
			else 	 
				$category= substr($category,0,-(numberOfDigits($i)+4)).$i.substr($category, -4);
			$i++;
		}

		return $category;
	}

	//this function calculates the name of the image file. 
	//The basic difference between these two functions here, that one of them has .txt extension manager & the other one does not
	//also one is directed toward the text folder whilst the other one is at the image folder
	function nameOfImage($fileName)
	{
		$i = 0;
		while(file_exists("images/".$fileName))
		{
			if(!$i) 
			$fileName = substr($fileName,0,-4).$i.substr($fileName, -4);
			else 	 
				$fileName= substr($fileName,0,-(numberOfDigits($i)+4)).$i.substr($fileName, -4);
			$i++;
		}

		return $fileName;
	}
	session_start();
	if(empty($_SESSION['user']))
		header("location:index.php");
	else 
	{
		require 'config/dbaccess.php';
		require 'css/bootstrap.php';
		$currentTime = $_SERVER['REQUEST_TIME'];
		

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
		$ins = "insert into article (userName , textLocation , inputType , category , imgLoc , heading ) values ('".$_SESSION['user']."','".$name."','".$type."','".$_POST['category']."','"."images/".$file_name."','".$_POST['title']."')";
		$connect->query($ins);
		

		//now to generate the actual preview of the item:
		$res = "select * from article where textLocation = '".$name."';";
		$res = $connect->query($res);
		$res = $res->fetch_assoc();
		echo "
			<div class = 'container-fluid background-color-thistle'>
			<div class = 'container background-color-white'>
				<h2>".$res['heading']."</h2>
				<img src = ".$res['imgLoc']." class = 'img-responsive banner'>
				<p>".calcTime(abs($_SERVER['REQUEST_TIME']-strtotime($res['timeOfUpload'])))."</p>
			</div>
			</div>
		";
		$connect->close();
	}

?>	
</html>