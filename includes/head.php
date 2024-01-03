<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php if (isset($page)) {
        echo "<title>Tourism Victoria: $page</title>";
     } else {
        echo "<title>Tourism Victoria</title>";}
     ?>
    <link rel="stylesheet" href="styles\main_style.css">
    <script src="scripts/checkForm.js"></script>
</head>

<body>
    <div class="banner" alt="banner image"></div>
    <?php include('nav.php'); ?>