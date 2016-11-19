<?php
    include "../functions.php";
    include "../db/DbHelper.php";
    include "../db/include_entities.php";
    include "../baseSession.php";
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
    <link href="https://fonts.googleapis.com/css?family=Alegreya:900|Questrial" rel="stylesheet">
    <script src="../../lib/lodash.js"></script>
</head>
<body>

<?php require_once("../header.php"); ?>

<div class="wrapper">
    <main>
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
    </main>
    

    <?php 
        require_once("../footer.php"); 
    ?>

</div>

</body>
</html>