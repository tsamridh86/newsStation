<?php
	//This function returns the time 
	function calcTime ($deadLine)
	{
		$timeRemaining = $deadLine - $_SERVER['REQUEST_TIME'];
		if($timeRemaining < 0)
		{
		  $timeRemaining = abs($timeRemaining);
		  $end = "ago.";
		}
		else if(!$timeRemaining) return 0;
		else $end = "remaining.";
		$timeRemaining = $timeRemaining / (60*60*24*365);	//converted into years
		$yrs = floor($timeRemaining);						//removed the decimal part if any
		$timeRemaining = (($timeRemaining - $yrs)*365);				//converted into days
		$days = floor($timeRemaining);					//removed the decimal part if any
		$timeRemaining = (($timeRemaining-$days)*24);				//converted into hrs
		$hrs = floor($timeRemaining);						//removed the decimal part if any
		$timeRemaining = (($timeRemaining-$hrs)*60);					//converted into mins
		$min = floor($timeRemaining);						//removed decimals if any
		$timeRemaining = (($timeRemaining-$min)*60);					//converted into seconds
		$sec = floor($timeRemaining);						//removed decimals
		$str = '';
		if($yrs) $str = $str.$yrs." years ";			//concatnating stuff
		if($days) $str = $str.$days." days ";
		if($hrs) $str = $str.$hrs." hours ";
		if($min) $str = $str.$min." minutes ";
		if($sec) $str = $str.$sec." seconds ";
		$str = $str.$end;
		return $str;
	}

	//This page is just for the access of the database.
	//This page also assigns the use of $connect as the connection medium to the database.
	$serverName = "localhost";
	$userName = "root";
	$password= "";
	$dbName = "news";
	$connect = mysqli_connect($serverName,$userName,$password) or die("Unable to connect to MYSQL server.");
	$createdb = "create database if not exists ".$dbName;
	$connect->query($createdb);
	mysqli_select_db($connect , $dbName);

	//To create a table of the users.
	$userTable  = "create table if not exists users ( userName varchar(25) primary key , password varchar(25) , firstName varchar(25) , lastName varchar(25));";
	$connect->query($userTable);

	$article = "create table if not exists article ( userName varchar(25) references users(userName) , articleID int primary key auto_increment, textLocation varchar(50) , inputType char(1), category varchar(30), imgLoc varchar(50) , heading varchar(50), timeOfUpload int, noOfViews int default 0);";

	$connect->query($article);


?>