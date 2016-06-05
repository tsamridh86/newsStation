<!doctype html>
<head>
<link rel="stylesheet" type="text/css" href="css/editorStyle.css">
<script src="scripts/editorScript.js"></script>
</head>
<title>Editor</title>
<?php require 'css/bootstrap.php'; ?>
<div class="container-fluid background-color-purple">
	<div class = "container background-color-white">
		<p class = "heading"> Write an article</p>
		<ul class="nav nav-tabs">
   			 <li class="active"><a href="#">Select input type:</a></li>
   			 <li><a href="#" onclick="displayNormal();">Normal</a></li>
    		 <li><a href="#" onclick="displayAdvanced();">Advanced</a></li>
 		 </ul>
 		 <div class="container-fluid help margin-5px margin-top-10px" id="help">
 		 <p> Select the normal input type, if you do not know HTML </p>
 		 <p> In the normal input type, you can insert one image, (as a banner) & the heading will be shown in bold. All the text will be shown in the normal manner.</p>
 		 <p> Advanced user can input thier article in HTML format, you as free to use all the HTML functions (bootstrap CSS included).</p>
 		 </div>
 		 <div class="container-fluid normal-user" id = "normal">
 		 <form method="post" action="preview.php" enctype="multipart/form-data">
 		 	<div class="row">
 		 		<div class="col-md-2 margin-5px margin-top-13px"> 
 		 			<p class = "subtopic"> Title of the article : </p>
 		 		</div>
 		 		<div class="col-md-8 margin-5px margin-top-10px">
 		 			<input type="text" name="title" id="inputTitle" class="form-control" value="" required="required" pattern="" title="">
 		 		</div>
 		 	</div>
 		 	<div class="row">
 		 		<div class="col-md-2 margin-5px margin-top-10px">
 		 			<p class="subtopic"> Category of article : </p>
 		 		</div>
 		 		<div class="col-md-5 margin-5px">
 		 			<select name="category" id="inputCategory" class="form-control">
 		 				<option value="">-- Select One --</option>
 		 				<option value="national">National</option>
 		 				<option value="international">International</option>
 		 				<option value="sports">Sports</option>
 		 				<option value="entertainment">Entertainment</option>
 		 				<option value="opinion">Opinion</option>
 		 				<option value="business">Business</option>

 		 			</select>
 		 		</div>
 		 		</div>
 		 		<div class="row">
 		 			<div class=" col-md-2 margin-5px margin-top-10px ">
 		 				<p class="subtopic"> Image (optional) : </p>
 		 			</div>
 		 			<div class="col-md-7 margin-5px margin-top-10px">
 		 				<input type="file"  name = "pic">
 		 			</div>
 		 		</div>
 		 		<div class="row">
 		 			<div class="col-md-2 margin-5px margin-top-10px">
 		 				<p class="subtopic"> Enter your text here : </p>
 		 			</div>
 		 		</div>	
 		 		<div class="row">
 		 			<div class="col-md-12 margin-5px">
 		 				<textarea name="normalBody" id="input" class="form-control" rows="15" required="required"></textarea>
 		 			</div>
 		 		</div>
 		 		<div class="row">
 		 			<div class="col-md-1 margin-5px margin-top-10px">
 		 				<button type="submit" class="btn btn-primary center-block" >Submit</button>
 		 			</div>
 		 		</div>
 		 	</form>	
 		 	</div>
 		 	<div class="container-fluid advanced-user margin-5px margin-top-10px" id = "advanced">
 		 	<p>You may use bootstrap css or universal css notations, it will be displayed accordingly.</p>
 		 	<p>To display images, use source as the internet itself, upload feature coming soon.</p>
 		 	<div class="row">
 		 		<div class="col-md-2 margin-5px margin-top-10px">
 		 			<p class="subtopic"> Category of article : </p>
 		 		</div>
 		 		<div class="col-md-5 margin-5px">
 		 			<select name="category" id="inputCategory" class="form-control">
 		 				<option value="">-- Select One --</option>
 		 				<option value="national">National</option>
 		 				<option value="international">International</option>
 		 				<option value="sports">Sports</option>
 		 				<option value="entertainment">Entertainment</option>
 		 				<option value="opinion">Opinion</option>
 		 				<option value="business">Business</option>

 		 			</select>
 		 		</div>
 		 		</div>
 		 	<p>< html > </p>
 		 	<textarea name="advancedBody" id="input" class="form-control" rows="25" required="required"></textarea>
 		 	<p> < /html > </p>
 		 	</div>
 		 </div>
	</div>
</div>
</html>