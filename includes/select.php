<?php

    require_once('config.php');
    require_once('db_class.php');

    $connection = new dbController(HOST,USER,PASS,DB);

    $sql = "SELECT recommendationno, muraltype, width, height, location, description, image, artist FROM mural ORDER BY artist";
    $result = $connection->getAllRecords($sql);
?>

<form action="details.php" method="GET">
    <select name="id">
        <option value ="">Select an artist</option>

        <?php 
        foreach ($result as $row) {
            echo "<option value='{$row['recommendationno']}'>{$row['artist']}</option>";
        }
        ?>
        
    </select>
    <button type="submit" value="submit">Find</button>
</form>