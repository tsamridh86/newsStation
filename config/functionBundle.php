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

	function showArticle ( $heading, $uploader,$textLocation , $inputType, $category,$imgLoc, $timeOfUpload)
	{
		echo "<div class = 'row'><div class = 'col-md-11 small-box'>";
		echo "<p class = 'heading'>".$heading."</p>";
		echo "<p class = 'm-detail'> By,".$uploader." on #".$category."</p>";
		if(file_exists($imgLoc))
			echo "<div class = 'imgshow'><img class = 'img-responsive' src = '".$imgLoc."'></div>";
		echo "<p class= 'm-detail'> Posted : ".calcTime($_SERVER['REQUEST_TIME']-$timeOfUpload)."</p>";
		echo "</div></div>";
	}
?>