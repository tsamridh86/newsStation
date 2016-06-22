<head>
	<link rel="stylesheet" href="css/indexStyle.css">
</head>
<title>News Station</title>
<?php  require 'css/bootstrap.php';
	require 'config/dbaccess.php';
	require 'config/functionBundle.php';
?>
<div class="container-fluid background-color-aliceblue">
	<div class="container background-color-white">
		<div class="row padding-top-5px background-color-slategray">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<p class = "logo"> News Station</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<form method="get" action="search.php">
					<div class="input-group padding-4px">
						<input type="text" class="form-control" name = 'query' placeholder="Search for...">
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
				<form method = "get" action = "search.php">
					<ul class="nav navbar-nav">
						
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#"><button type="submit" name="category" class="navig" value = "national">National</button></a></li>
						<li><a href="#"><button type="submit" name="category" class="navig" value = "international">International</button></a></li>
						<li><a href="#"><button type="submit" name="category" class="navig" value = "sports">Sports</button></a></li>
						<li><a href="#"><button type="submit" name="category" class="navig" value = "entertainment">Entertainment</button></a></li>
						<li><a href="#"><button type="submit" name="category" class="navig" value = "opinion">Opinion</button></a></li>
						<li><a href="#"><button type="submit" name="category" class="navig" value = "business">Business</button></a></li>
						<li><a href="editor.php">Write an article...</a></li>
					</ul>
				</form>
			</nav>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 nowTrending">
					<h4 class="heading"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Now Trending:</h4>
					<?php
						$art = "select * from article natural join users order by noOfViews desc";
						$art = $connect->query($art);
						$count = 0 ;
						while($ar = $art->fetch_assoc() and $count < 5)
						{
							$count = $count + 1;
							showArticle($ar['heading'],$ar['firstName'],$ar['textLocation'] , $ar['inputType'], $ar['category'],'', $ar['timeOfUpload'],$ar['articleID']);
						}
					?>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 pull-right latestNews">
					<h4 class = "heading"><span class="glyphicon glyphicon-time glyphicon " aria-hidden="true"></span> Latest News: </h4>
					<?php
						$art = "select * from article natural join users order by timeOfUpload desc";
						$art = $connect->query($art);
						$count = 0 ;
						while($ar = $art->fetch_assoc() and $count < 5)
						{
							$count = $count + 1;
							showArticle($ar['heading'],$ar['firstName'],$ar['textLocation'] , $ar['inputType'], $ar['category'],'', $ar['timeOfUpload'],$ar['articleID']);
						}
						$connect->close();
					?>
				</div>
			</div>
		</div>
	</div>