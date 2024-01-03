<?php

//ini_set('display_errors',0); // 1 = display error, 0 = hide errors
$page = 'Details';
include('includes/head.php');
require_once('config.php');
require_once('db_class.php');

$connection = new dbController(HOST,USER,PASS,DB);

//$connection->dbConnect(HOST,USER,PASS,DB);

$sql = "select * from mural where recommendationno={$_GET['id']}";
$result = $connection->getAllRecords($sql);


//Display Mural Detail

foreach ($result as $row){
    foreach ($row as $key => $val) {
        $$key = $val;
    }
}
echo "<div class='tile'>";
echo "<h3>$artist</h3>";
echo "<p class='location'>$location</p>";
echo "<img src='$image' alt='$description' class='img_details'>";
echo "<p class='desc'>$description</p>";
echo "  <ul class='specs'>
            <li><p>Art medium: $muraltype</p></li>
            <li><p>Commision fee: $$price</p></li>    
            <li><p>Width: $width meters</p></li>   
            <li><p>Height: $height meters</p></li>
            
        </ul>";
echo "</div>";

include('includes/footer.php');

?>