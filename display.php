<?php
	//access to the database, it's various functions are required for this procedure.
	require "config/dbaccess.php";
	require "config/functionBundle.php";
	require "css/bootstrap.php";
	//retrieve the required contents of the database :
	$query = "select * from article natural join users where articleId = ".$_GET['id'];
	$result = $connect->query($query);
	$result = $result->fetch_assoc();
	$viewIncrease = "update article set noOfViews = ".($result['noOfViews']+1)." where articleId = ".$_GET['id'];
	$connect->query($viewIncrease);
	$connect->close();
?>
<!DOCTYPE html>
<!--set the title of the page according to the title that has been given to it.-->
<title><?php echo $result['heading'];?></title>
<head>
	<link rel="stylesheet" type="text/css" href="css/displayStyle.css">
	<link rel = "stylesheet" href="css/searchStyle.css"> <!-- This css file is need for the nav bar -->
	<script src="scripts/displayScript.js"></script>
</head>
<body>
	<div class="container-fluid bigBack">
		<div class="container reading">
		<!--The nav tag here is exclusively for the navigation bar appearing on the top -->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand">Categories</a>
            </div>
            <form method = "get" action = "search.php">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li id="national"><a><button type="submit" name="category" class="navig" value = "national">National</button></a></li>
                    <li id="international"><a><button type="submit" name="category" class="navig" value = "international">International</button></a></li>
                    <li id="sports"><a><button type="submit" name="category" class="navig" value = "sports">Sports</button></a></li>
                    <li id="entertainment"><a><button type="submit" name="category" class="navig" value = "entertainment">Entertainment</button></a></li>
                    <li id="opinion"><a><button type="submit" name="category" class="navig" value = "opinion">Opinion</button></a></li>
                    <li id="business"><a><button type="submit" name="category" class="navig" value = "business">Business</button></a></li>
                    <li><a href="editor.php">Write an article...</a></li>
                </ul>
            </form>
            <!-- Two seperate form are used here so that both the category & the query search may not happen at the same time -->
            <form method="get" action="search.php">
                <div class="input-group">
                    <input type="text" class="form-control" name = 'query' placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </span>
                </div>
            </form>
        </nav>
			<div class="alert alert-warning alert-dismissible" role="alert" id="topAlert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" id="closer"><span aria-hidden="true">&times;</span></button>
				Don't like the brightness? <strong>Click here </strong> to go <span id="bright"></span>.
			</div>
			<h3 class="heading"><?php echo $result['heading']; ?></h3>
			<p class="credit">By, <?php echo $result['firstName']." ".$result['lastName'];
										if(!empty($result['category']))
										 echo " on #".$result['category'];?> </p>
			<p class="credit">Last Updated on : <?php echo calcTime($result['timeOfUpload']);?></p>
			<div class="container-fluid"> <!-- This div is used to display the image -->
				<img src=<?php echo "\"".$result['imgLoc']."\"" ;?> class = "img-responsive">
			</div>
			<!--Now to actually display the text that has been inside it-->
			<?php
				if($result['inputType'] == 'N') //This for the normal input that the users have inputted into it.
					{echo "<p class='textArea'>"; showText($result['textLocation']); echo "</p>";}
				else 
					showText($result['textLocation']);
			?>
			<p class="credit">Viewed : <?php echo ($result['noOfViews']+1); ?> time(s).</p>
			<div class="writerDetails">
			<!-- This div contains the details of the writer which is an optional input. If they are empty they are not displayed at all-->

			</div>
			<div class="commentSection">
			<!-- This section is for the comments that various users can discuss about, since there is no administrator anybody can post whatever they please -->	
			</div>
		</div>
	</div>
</body>
</html>