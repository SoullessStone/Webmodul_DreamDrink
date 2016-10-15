<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Startseite</title>
    <link rel="stylesheet" href="../css/alcoholi.css">
    <link rel="icon" href="../pic/favicon.ico" type="image/x-icon"/>
</head>
<body>
<?php require_once("header.php"); ?>

<div class="wrapper">
    <main>
        <div class="leftBar">
            <?php require_once("left_sidebar.php"); ?>
        </div>
        <div class="content">
            Hier werden neue Drinks und Neuigkeiten angezeigt!
        </div>
        <div class="rightBar">
            <?php require_once("right_sidebar.php"); ?>
        </div>
    </main>

    <?php require_once("footer.php"); ?>
</div>
</body>
</html>