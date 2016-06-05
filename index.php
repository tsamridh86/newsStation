<head>
	<link rel="stylesheet" href="css/indexStyle.css">
</head>
<title>News Station</title>
<?php  require 'css/bootstrap.php'; ?>



<div class="container-fluid background-color-aliceblue">
	<div class="container background-color-white">
		<div class="row padding-top-5px background-color-slategray">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<p class = "logo"> News Station</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<form method="get" action="search.php">
				<div class="input-group padding-4px">
    				  <input type="text" class="form-control" placeholder="Search for...">
     					 <span class="input-group-btn">
       					 <button class="btn btn-default
       					 				padding-top-9px
       					 				padding-bottom-9px
       					 				" type="button">
       					 		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
       					 </button>
      					</span>
 				</div>
 				</form>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 pull-right">
			<?php 
				session_start();
				 
				if(empty($_SESSION['user']))
				 echo "<a href='loginPage.php' class = 'login'><span class='glyphicon glyphicon-user' aria-hidden='true'>Login</span></a>";
				else
				{
				 echo "<a href='userPage.php' class = 'login'><span class='glyphicon glyphicon-user' aria-hidden='true'>".$_SESSION['name']."</span></a>";
				 echo "<a href='logout.php' class = 'login'> | <span class='glyphicon glyphicon-arrow-right' aria-hidden='true'>Logout</a>";
				}
			?>	
			</div>
		</div>
		<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Categories</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">National</a></li>
      <li><a href="#">International</a></li> 
      <li><a href="#">Sports</a></li> 
      <li><a href="#">Entertainment</a></li> 
      <li><a href="#">Opinion</a></li> 
      <li><a href="#">Business</a></li> 
      <li><a href="editor.php">Write an article...</li>
    </ul>
  
</nav>
		<div class="row">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 nowTrending">
				<h4 class="heading"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Now Trending:</h4>
				<?php
					//The most trending articles will be shown here
				
				 ?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pull-right latestNews">
				<h4 class = "heading"><span class="glyphicon glyphicon-time glyphicon " aria-hidden="true"></span> Latest News: </h4>
				<?php
					//The 5 most latest article will be uploaded here

				?>
			</div>
		</div>
	</div>
</div>
