<?php

	$page = 'Insert';
	include('includes/head.php');


	//Insert - Insert records page

	//style nav tab
	echo "<style>#nav_insert {
		margin: 0px 10px 0px 0px;
		padding: 5px 10px 15px 10px;
		background: rgb(223, 223, 223);
		border-radius: 3px 3px 0px 0px;
		}</style>";
?>

<form method="post" class='tile' id='muralForm' action="insert.php" enctype="multipart/form-data" onsubmit="return muralFormCheck()">
	
	<h3 class='header'>Mural submission</h3>
		
	<!--Varchar-->
	<label for="muraltype" class='muraltype'>Art Medium:</label>
	<select name="muraltype" id="muraltype">
		<option>Stencil</option>
		<option>Past-up</option>
		<option>Projection</option>
		<option>Throw-up, tag, or other</option>
	</select>
	
	<!--float-->
	<label for="width" class='width'>Width:</label>
	<input type="text" placeholder="Meters" name="width" id="width">
	
	<!--float-->
	<label for="height" class='height'>Height:</label>
	<input type="text" placeholder="Meters" name="height" id="height">

	<!--Varchar-->
	<label for="location" class='location'>Location:</label>
	<input type="text" name="location" id="location">

	<!--float-->
	<label for="price" class='price'>Price:</label>
	<input type="text" placeholder="$" name="price" id="price">

	<!--Text-->
	<label for="description" class='description'>Description:</label>
	<textarea rows="5" placeholder="" name="description" id="description"></textarea>
	
	<!--Varchar-->
	<label for="image" class='image'>Image:</label>
	<input type="file" name="image" id="image">
	<div id='imageError'></div> 

	<!--Varchar-->
	<label for="artist" class='artist'>Artist/Collective:</label>
	<input type="text" name="artist" id="artist">
	
	<input type="submit" name="submit" value="Confirm"/>
</form>



<?php
	include('includes/footer.php')
?>


