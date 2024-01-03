<?php

    $page = 'Home';
    include('includes/head.php');
    require_once('config.php');
    require_once('db_class.php');

    //$connection->dbConnect(HOST,USER,PASS,DB);
    $connection = new dbController(HOST,USER,PASS,DB);



    //Home - Display All Records

    $sql = "select * from mural";
    $record = $connection->getAllRecords($sql);

    //style nav tab
    echo "<style>#nav_home {
        margin: 0px 10px 0px 0px;
        padding: 5px 10px 15px 10px;
        background: rgb(223, 223, 223);
        border-radius: 3px 3px 0px 0px;
        }</style>";

    //page content
    echo   "<div class='tile'>
            <h3 class='header'>Murals of Melbourne</h3>
                <ul class='record_grid'>";

    foreach ($record as $row) {
        foreach ($row as $key => $val) {
            $$key = $val;
        }
        echo "<li>";
            echo "<h2 class ='grid_name'>$artist</h2>";
            echo "<img src='$image' alt='$description' class ='grid_image'>";
            echo "<h2 class ='read_more'><a href='details.php? id={$row['recommendationno']}'>Read more</a></h2>";
        echo "</li>";
    }
    echo "</ul></div>";

    include('includes/footer.php');

?>