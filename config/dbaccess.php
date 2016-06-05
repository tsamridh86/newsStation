<?php

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

	$article = "create table if not exists article ( userName varchar(25) references users(userName) , articleID int primary key auto_increment, textLocation varchar(25) , inputType char(1), category varchar(10) );"

?>