<?php 

include('includes/head.php');
require_once('config.php');
require_once('db_class.php');

$connection = new dbController(HOST,USER,PASS,DB);
//Server data cleansing method

$muraltype = $connection->cleanUp($_POST['muraltype']);
$width = $connection->cleanUp($_POST['width']);
$height = $connection->cleanUp($_POST['height']);
$location = $connection->cleanUp($_POST['location']);
$description = $connection->cleanUp($_POST['description']);
$image = 'images/'.$_FILES['image']['name']; //With the 'images/.' concat, $image now holds destination path
$artist = $connection->cleanUp($_POST['artist']);
$price = $connection->cleanUp($_POST['price']);
$temp = $_FILES['image']['tmp_name'];

//SQL Query statement
$sqlquery = "INSERT INTO mural(muraltype, width, height, location, description, image, artist, price) VALUES('$muraltype', '$width', '$height', '$location', '$description', '$image', '$artist', '$price')";

if($connection->executeQuery($sqlquery)){
    echo 
    '<div class="tile"> 
        <h3 class="header">Thank you, your find has been successfully submitted.</h3>
        <a href="insert_form.php" class="return">Return</a>
    </div>';
    $connection->uploadImage($temp,$image);
}
 
include('includes/footer.php');

?>