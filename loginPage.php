<!DOCTYPE HTML>
<head>
	<link rel="stylesheet" href="css/loginStyle.css">
	<script src="scripts/loginScripts.js"></script>
</head>
<?php
	//This section is for login.
	require '/config/dbaccess.php';
	require 'css/bootstrap.php';
	if(!empty($_POST['userName']) && !empty($_POST['password']))
	{
		$que = "select * from users where userName = '".$_POST['userName']."' and password = '".$_POST['password']."';";
		$res = $connect->query($que);
		$res = $res->fetch_assoc();
		if(empty($res))
		{
			echo "<p class = 'errormsg'> Invalid login details</p>";
		}
		else
		{
			
			session_start();
			$_SESSION['user'] = $res['userName'];
			$_SESSION['name'] = $res['firstName'];
			header("location:index.php");
		}
	}

	//this section is for signup
	if(!empty($_POST['newUserName']) && !empty($_POST['newPassword']) && !empty($_POST['firstName']) && !empty($_POST['lastName']))
	{
			
		$que = "select * from users where userName = '".$_POST['newUserName']."';";
		$res = $connect->query($que);
		$res = $res->fetch_assoc();
		echo $res['userName'];
		if(!empty($res['userName']))
		{
			echo "<p class = 'errormsg'> The User Name already exists, please try another one.</p>";
		}
		else
		{
			$que = "insert into users values ('".$_POST['newUserName']."','".$_POST['newPassword']."','".ucfirst($_POST['firstName'])."','".ucfirst($_POST['lastName'])."');";
			//ucfirst has been used in the first name & the last name to ensure that they are automatically uppercased whenever they are inserted into the database.
			$connect->query($que);
			session_start();
			$_SESSION['user'] = $res['newUserName'];
			$_SESSION['name'] = $res['firstName'];
			header("location:index.php");
			}
	}
	$connect->close();
?>
<div class="container ">
	<div class="row">
		<form method = "post" action = loginPage.php>
			<div id = "login" class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-md-offset-3
				margin-top-10px login">
				<p> Enter your login details: </p>
				<input type = 'text' name = 'userName' class="form-control margin-bottom-10px" placeholder="Enter your User Name."  required  >
				<input type="password" name="password" class="form-control margin-bottom-10px" placeholder="Enter your Password." required >
				<button type="submit" class="btn btn-primary center-block" >Login</button>
				<a href="#" onclick="displayToggle();">Not a member? Sign Up</a>
			</div>
		</form>
		<form method = "post" action = loginPage.php>
			<div id = "signUp" class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-md-offset-3
				margin-top-10px signUp">
				<p> Alright let's get started: </p>
				<input type = 'text' name = 'firstName' class="form-control margin-bottom-10px" placeholder="First Name." required  >
				<input type = 'text' name = 'lastName' class="form-control margin-bottom-10px" placeholder="Last Name." required  >
				<input type = 'text' name = 'newUserName' class="form-control margin-bottom-10px" placeholder="Enter your User Name." required  >
				<input type="password" name="newPassword" class="form-control margin-bottom-10px" placeholder="Enter your Password." required >
				<p class="warning">The password must be 1-25 characters long.</p>
				<button type="submit" class="btn btn-primary center-block" >Sign Up</button>
				<a href="#" onclick="displayToggle();">Already a member? Login</a>
			</div>
		</form>
	</div>
</div>
</html>