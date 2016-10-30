<?php
    include "../functions.php";
    $language = get_param('lang', 'de');
    $pageId = get_param('site', "home");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Startseite</title>
    <link rel="stylesheet" href="../../css/alcoholi.css">
    <link rel="icon" href="../../pic/favicon.ico" type="image/x-icon"/>
</head>
<body>

<?php require_once("../header.php"); ?>

<div class="wrapper">
    <main>
        <div class="leftBar">
            <?php require_once("../left_sidebar.php"); ?>
        </div>
        <?php 
        if (isset($_GET['site'])){
            $site = $pageId . "_" . $language . ".php";
            if (file_exists($site)) {
                require_once($site);
            } else {
                header ("Location: index.php?site=home&lang=de");
            }
        } else {
            header ("Location: index.php?site=home&lang=de");
        }
        ?>
        <div class="rightBar">
            <?php require_once("../right_sidebar.php"); ?>
        </div>
    </main>

    <?php require_once("../footer.php"); ?>

</div>

</body>
</html>