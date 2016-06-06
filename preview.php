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
		$currentTime = $_SERVER['REQUEST_TIME'];
		

		//This portions writes the body of the file into a text file.
		$name =  nameOfFile($_POST['category']);
		$name = "text/".$name;
		$file = fopen($name,"w");
		$text = $_POST['normalBody'];
		fwrite($file, $text);
		fclose($file);

		//This is for displaying the text file on the screen
		$file = fopen($name, "r") or exit("Unable to open file.");
        while(!feof($file)){
            echo fgets($file). "<br />";
        }
        fclose($file);

        //upload the image into the server
        //import image to the server page
		$file_temp = $_FILES['pic']['tmp_name'];
		$file_name = $_FILES['pic']['name'];
		$file_name = nameOfImage($file_name);
		move_uploaded_file($file_temp,"images/".$file_name);

	}

?>	