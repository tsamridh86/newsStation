<!DOCTYPE html>
<head>
    <link rel = "stylesheet" href="css/searchStyle.css">
</head>
<title><?php if(!empty($_GET['category'])) echo $_GET['category']." news";
else echo "News related to ".$_GET['query'];?></title>
<script type="text/javascript">
function highlight(category)
{
var allCategory =  ["national", "international", "sports", "entertainment", "opinion", "business"];
for(var i = 0; i < allCategory.length; i++)
{
document.getElementById(allCategory[i]).className = '';
}
document.getElementById(category).className = 'active';
}
<?php if(!empty($_GET['category']))
{
echo "window.onload = function() { ";
echo "highlight('".$_GET['category']."');";
} ?>
};
</script>
<?php require 'css/bootstrap.php';?>
<div class="container-fluid background-color-orange">
    <div class="container background-color-white">
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
            <div class="input-group padding-top-4px">
                <input type="text" class="form-control" name = 'query' placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </span>
            </div>
            </form>
        </nav>
        <?php
        if (!empty($_GET['category']))
        {
        echo "<h3 class = 'heading' > News for ".$_GET['category']." : </h3>";
        require 'config/dbaccess.php';
        require 'config/functionBundle.php';
        $que = "select * from article natural join users where category = '".$_GET['category']."' order by timeOfUpload desc; ";
        $result = $connect->query($que);
        while($row = $result->fetch_assoc())
        showArticle($row['heading'],$row['firstName']." ".$row['lastName'],$row['textLocation'] , $row['inputType'], $row['category'],$row['imgLoc'], $row['timeOfUpload'],$row['articleID']);
        $connect->close();
        }
        if (!empty($_GET['query']))
        {
        echo "<h3 class = 'heading' > News for ".$_GET['query']." : </h3>";
        require 'config/dbaccess.php';
        require 'config/functionBundle.php';
        $que = "select * from article natural join users where heading like '%".$_GET['query']."%' order by timeOfUpload desc; ";
        $result = $connect->query($que);
        while($row = $result->fetch_assoc())
        showArticle($row['heading'],$row['firstName']." ".$row['lastName'],$row['textLocation'] , $row['inputType'], $row['category'],$row['imgLoc'], $row['timeOfUpload'],$row['articleID']);
        $connect->close();
        }
        ?>
    </div>
</div>
</html>