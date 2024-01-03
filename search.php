<?php

    if (isset($_GET['search'])) {
        $search =$_GET['search'];
        } else {
        $search ="";
    }
    
    $page = "Search";
    include('includes/head.php');
    require_once('config.php');
    require_once('db_class.php');

    $connection = new dbController(HOST,USER,PASS,DB);

    //Display Search records

    echo "<div class='tile'>";
    echo "<h3 class='header'>Records related to '$search'</h3>";
    echo "<div class='search_grid'>";

    $search = "%$search%";
    $sql = "SELECT * FROM mural WHERE artist LIKE ? OR location LIKE ?";   //the ? get substituted by $search in order of appeaance, if it is not "" (blank)
    $result = $connection->prepareSearch($sql, $search, $search);

    if ($result) {
        foreach($result as $row) {
            echo "<section>";
            echo    "<h2>{$row['artist']}</h2>";
            echo    "<p class='location'>{$row['location']}</p>";
            echo    "<img class='img_details' src='{$row['image']}' alt='{$row['description']}'>";
            echo    "<h2 class ='read_more'><a href='details.php? id={$row['recommendationno']}'>Read more</a></h2>";
            echo "</section>";
        }
    } else {
    echo "<h2>No results found</h2>";
    }
    echo "</div></div>";

    include('includes/footer.php');

?>
