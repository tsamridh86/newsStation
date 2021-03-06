<?php
	
	//function ucfirst() (used in search.php) has been used to captilize the 1st letter of any string as the category of news is saved in lowercase format.


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

	function nameOfProfile($fileName)
	{
		$i = 0;
		while(file_exists("propic/".$fileName))
		{
			if(!$i) 
			$fileName = substr($fileName,0,-4).$i.substr($fileName, -4);
			else 	 
				$fileName= substr($fileName,0,-(numberOfDigits($i)+4)).$i.substr($fileName, -4);
			$i++;
		}

		return $fileName;
	}


	//This function is used to display the words on the screen, the 2nd parameter is used to limit the no of words
	function showText($location,$limit = 0)
	{
		$myfile = fopen($location, "r") or die("Unable to open file!");
		$count = 1 ;
		while(!feof($myfile) && $count != $limit) {
 			 echo fgets($myfile) . "<br>";
 			 $count = $count + 1 ;
			}
		fclose($myfile);
	}


	//This function is used to display the div in the search page.
function showArticle ( $heading, $uploader,$textLocation , $inputType, $category,$imgLoc, $timeOfUpload,$articleId)
	{
		echo "<div class = 'row'><div class = 'col-md-11 small-box'>";
		echo "<form method = 'get' action = 'display.php'>";
		echo "<div class = 'row'><div class = 'col-md-5'>";
		echo "<p class = 'heading'>".$heading."</p>";
		echo "<p class = 'm-detail'> By, ".$uploader." on #".$category."</p>";
		if(file_exists($imgLoc))
			echo "<div class = 'imgshow'><img class = 'img-responsive' src = '".$imgLoc."'></div>";
		echo "<p class= 'm-detail'> Posted : ".calcTime($timeOfUpload)."</p>";
		echo "</div>";
		if($inputType == 'N')
		{	
			echo "<div class = 'col-md-6'><p class = 'body-text'>";showText($textLocation,5); echo "</p>";
		}
		else
			{echo "<div class = 'col-md-6'>"; showText($textLocation,5);}
		echo "<input type = 'hidden' name = 'id' value = ".$articleId.">";
		echo "<button type='submit' class='btn btn-primary' >Read on >></button></div></div>";
		echo "</form></div></div>";

	}

	//This function is to write into the a text file
	//Using the function will write it in the text file (if the name is repeated a new file is created) & will return the location of the saved file.
	function writeText ($name, $text)
	//the first parameter is the name of the text file, this name is used to be saved inside the database.
	//the second parameter is the content of the text file, it is blindly written into the text files
	{
		$name =  nameOfFile($name);
		$name = "text/".$name;
		$file = fopen($name,"w");
		fwrite($file, $text);
		fclose($file);
		return $name;
	}


	//This function is used to see whether the two inputs are different or not
	//this returns the output in either 0 or 1
	//if the argument is different it returns 1 else it returns 0
	function isDifferent($arg1 ,$arg2)
	{
		if($arg1==$arg2) return 0;
		else return 1; 
	}

?>