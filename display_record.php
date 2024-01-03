<?php

//THIS DOC WAS NOT USE IN MY FINAL WEBSITE, AS IT WAS SUBSTITUTED FOR display_all.php (USED 'LIMIT 1' IN SQL QUERY).
//IT IS HOWEVER REQUIRED AS PART OF THIS ASSESSMENT (PART C).

//ini_set('display_errors',0); // 1 = display error, 0 = hide errors
$page = 'Tourism Victoria: Melbourne Mural';
include('includes/head.php');
require_once('config.php');
require_once('db_class.php');


//Display One Record

$connection = new dbController(HOST,USER,PASS,DB);
//$connection->dbConnect(HOST,USER,PASS,DB);

$sql = "select * from mural limit 1";

$record = $connection->getAllRecords($sql);

foreach ($record as $row){
    foreach ($row as $key => $val) {
        $$key = $val;
    }
}
echo "<h2>$artist</h2>";
echo "<p>$description</p>";
echo "<img src='$image' alt='$description'>";

include('includes/footer.php');

?>