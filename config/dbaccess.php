<?php
	//This function returns the time 
	function calcTime($secs)
{
	$bit = array(
        ' year'        => $secs / 31556926 % 12,
        ' week'        => $secs / 604800 % 52,
        ' day'        => $secs / 86400 % 7,
        ' hour'        => $secs / 3600 % 24,
        ' minute'    => $secs / 60 % 60,
        ' second'    => $secs % 60
        );
        
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . 's';
        if($v == 1)$ret[] = $v . $k;
        }
    array_splice($ret, count($ret)-1, 0, 'and');
    $ret[] = 'ago.';
    
    return join(' ', $ret);
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

	$article = "create table if not exists article ( userName varchar(25) references users(userName) , articleID int primary key auto_increment, textLocation varchar(25) , inputType char(1), category varchar(10), imgLoc varchar(50) , heading varchar(20), time int);"




?>