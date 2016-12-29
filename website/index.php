<?php
    include_once("./php/content/IngredientList.php");
    include_once("./php/content/DrinklistTable.php");
    include_once("./php/content/DrinkSearch.php");
    include_once("./php/_controller/DrinkController.php");
    include_once("./php/_controller/CreateDrinkController.php");
    include_once("./php/_controller/AboutController.php");
    include_once("./php/_controller/MixerController.php");
    include_once("./php/_controller/HomeController.php");
    include_once("./php/_controller/AdminController.php");
    include_once("./php/_controller/DrinklistController.php");
    include_once("./php/_controller/LoginController.php");
    include_once("./php/_controller/LogoutController.php");
    include_once("./php/_controller/RegistrationController.php");
    include_once "./php/db/include_entities.php";
    include_once "./php/baseSession.php";
    //echo $_GET['controller']."<br/>";
    //echo $_GET['action']."<br/>";
    //echo $_SERVER['REQUEST_URI']."<br/>";
    $pageId = getCurPage("Home");
    setLanguage($pageId);
    $language = getLanguage();
    //$_SESSION["baseURL"] = "http://localhost/DreamDrinks/";
    $_SESSION["baseURL"] = "http://localhost/Webmodul_DreamDrink/website/";

    if (! isset($_GET["controller"])){
        header ("Location: ".$_SESSION['baseURL']."Home");
    }
    $controllerclass = $_GET['controller'];
    
    if (class_exists($controllerclass)) {
        $controller = new $controllerclass($language);

        if (isset($_POST["submit"])) {
            $controller->submitedForm($_POST);
        }

        if (isset($_GET['action']) && strlen($_GET['action'])>0) {
            $arr = explode("=",$_GET['action']);
            if (sizeof($arr)==2) {
                if (method_exists($controller, $arr[0])) {
                    $controller->{$arr[0]}($arr[1]);
                }
                else {
                    header ("Location: ".$_SESSION['baseURL'].$pageId);
                }
            } elseif (sizeof($arr)==1){
                if (method_exists($controller, $arr[0])) {
                    $controller->{$arr[0]}();
                }
                else {
                    header ("Location: ".$_SESSION['baseURL'].$pageId);
                }
            } else {
            }
        } else {
        }
    } else {
        header ("Location: ".$_SESSION['baseURL']."Home");
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="initial-scale=1.0" name="viewport">
    <title>Startseite</title>
    <link rel="stylesheet" href="<?php echo $_SESSION['baseURL'].'css/alcoholi.css'; ?>">
    <link rel="stylesheet" href="<?php echo $_SESSION['baseURL'].'css/font-awesome.css'; ?>">
    <link rel="icon" href="<?php echo $_SESSION['baseURL'].'pic/favicon.ico'; ?>" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Alegreya:900|Questrial" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-1.6.2.min.js"></script>
</head>
<body>

<?php include_once("./php/header.php"); ?>

<div class="wrapper">
    <main>
    <?php
        $controller->renderView();
    ?>
    </main>
    

    <?php 
        include_once("./php/footer.php"); 
    ?>

</div>

</body>
</html>

<?php
    function getCurPage($default) {
        if (!isset($_GET['controller'])) {
            return $default;
        }
        $temp = substr($_GET['controller'], 0, -10);
        return urldecode($temp);
    }

    function getLanguage(){
        if (isset($_COOKIE["lang"])) {
            return $_COOKIE["lang"];
        }
        setcookie("lang","de");
        return "de";
    }

    function setLanguage($pageId){
        if (isset($_GET["lang"])) {
            setcookie("lang", $_GET["lang"]);
            header ("Location: ".$_SESSION['baseURL'].$pageId);
        }
    }
?>