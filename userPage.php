<?php 
	session_start();
	require "css/bootstrap.php";
	require "config/dbaccess.php";
	$userDetails = "select * from users where userName = '".$_SESSION['user']."'";
	$userDetails = $connect->query($userDetails);
	$userDetails = $userDetails->fetch_assoc();
?>
<!doctype html>
<title>User Details</title>
<head>
	<link rel="stylesheet" type="text/css" href="css/userPageStyle.css">
	<script src = "scripts/userPageScripts.js"></script>
</head>
<body>
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<h3>Welcome, <?php echo $userDetails['firstName']; ?> </h3>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 pull-right">
				<?php
				if(!empty($userDetails['proPic']))
				echo "<img src=\"".$userDetails['proPic']."\" class='img-circle pull-right' alt='Profile Picture' style='height:100px;'>";
			?>	
			</div>
		</div>
		
		<div class="row">
			<!-- This div is for the sideBar that can be seen obviously -->
			<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
				<div class="list-group">
					<a class="list-group-item active" id="sideBar1" >User Details</a>
					<a class="list-group-item" id="sideBar2" >Articles</a>
					<a class="list-group-item" id="sideBar3" >Comments</a>
					<a href="index.php" class="list-group-item">Back to Home</a>
				</div>
			</div>
			<!--This side bar is for the other part of the story -->
			<div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
				<!--User Details Section -->
				<div id="userDetails">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<p class="details">User Name : </p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="text" class="form-control"  value = <?php echo "\"".$userDetails['userName']."\"" ; ?> disabled>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<p class="details"> Password : </p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="password" class="form-control" name="password" value=<?php echo $userDetails['password']; ?> maxlength="200">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<p class="details">First Name : </p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="text" class="form-control" name="firstName" value=<?php echo $userDetails['firstName']; ?>>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<p class="details">Last Name : </p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="text" class="form-control" name="lastName" value=<?php echo $userDetails['lastName'];?>>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<p class="details">Picture : </p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="file" class="form-control" name="lastName" value=<?php echo $userDetails['proPic'];?>>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<p class="details">Bio: </p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<textarea class="form-control" name="bio" maxlength="200" >
							</textarea>
						</div>
					</div>
				</div>
				<!--Article Section here-->
				<div id="articleSection" class="hidden">
					This is the article Section
				</div>
				<!--Comment Section here -->
				<div id="commentSection" class="hidden">
					This is the comment section
				</div>
			</div>
		</div>
	</div>
</body>
<?php 
$connect->close();
?>
</html>