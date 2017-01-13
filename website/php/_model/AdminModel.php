<?php
include_once("./php/db/DbHelper.php");
class AdminModel {
    private $db;
    
    public function __construct() {
        $this->db = DbHelper::getInstance();
    }

    public function formSubmitted($postinfo) {
        if (isset($postinfo)) {
            $escape = htmlspecialchars($postinfo["submittedAddimage"]);
            if (isset($escape) && $escape != "") {
                $drink = htmlspecialchars($postinfo["drink"]);
                $imageId = $this->getMaxImageId() + 1;
                $imageName = $imageId . "_" . $this->db->escape_string($_FILES["fileToUpload"]["name"]);
                $drink = $this->db->escape_string($postinfo["drink"]);

                $target_dir = getcwd().DIRECTORY_SEPARATOR."pic/Drinks/";
                $target_file = $target_dir . $imageId . "_" . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        header("Location: ".$_SESSION["baseURL"]."Admin?failed&1");
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    header("Location: ".$_SESSION["baseURL"]."Admin?failed&2");
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    header("Location: ".$_SESSION["baseURL"]."Admin?failed&3");
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    header("Location: ".$_SESSION["baseURL"]."Admin?failed&4");
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    header("Location: ".$_SESSION["baseURL"]."Admin?failed&5");
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    } else {
                        header("Location: ".$_SESSION["baseURL"]."Admin?failed&6");
                    }
                }
                echo "INSERT INTO Image (id, `path`) VALUES ($imageId, '$imageName');";
                $res = DbHelper::doQuery("INSERT INTO Image (id, `path`) VALUES ($imageId, '$imageName');");
                echo "INSERT INTO Images_for_Drink (drink_id, image_id) VALUES ($drink, $imageId);";
                $res = DbHelper::doQuery("INSERT INTO Images_for_Drink (drink_id, image_id) VALUES ($drink, $imageId);");
                header("Location: ".$_SESSION["baseURL"]."Drink?id=".$drink);
                
            } else {
                $name = htmlspecialchars($_POST["name"]);
                $image_path = htmlspecialchars($_POST["imagepath"]);
                $unit_id = htmlspecialchars($_POST["unit"]);
                $name = $this->db->escape_string($name);
                $image_path = $this->db->escape_string($image_path);
                $unit_id = $this->db->escape_string($unit_id);
                echo "INSERT INTO ingredient (name, image_path, unit) VALUES ('$name', '$image_path', $unit_id);";
                $res = DbHelper::doQuery("INSERT INTO Ingredient (name, image_path, unit) VALUES ('$name', '$image_path', $unit_id);");   
                header("Location: ".$_SESSION["baseURL"]."Admin");
            }
        }
    }

    function getMaxImageId() {
        $dbRes = DbHelper::doQuery("select max(id) as maximum from Image;");
        return $dbRes->fetch_assoc()["maximum"];
    }

    function getAllUnitsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Unit;");
        while($ingredient = $dbRes->fetch_object("Unit")){
            array_push($res, $ingredient);
        }
        return $res;
    }
    
    function getAllIngredientsFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Ingredient;");
        while($ingredient = $dbRes->fetch_object("Ingredient")){
            array_push($res, $ingredient);
        }
        return $res;
    }
    
    function isIngredientUsed($id) {
        $dbRes = DbHelper::doQuery("SELECT id FROM Ingredient where id IN (SELECT DISTINCT ingredient_id FROM Ingredients_for_Drink) and id=$id;");
        return ! ($dbRes->num_rows === 0);        
    }

    function removeNewIngredientIfPresent($id) {
        if ($this->isIngredientUsed($id)) {
            return;
        }
        $ingId = htmlspecialchars($id);
        $ingId = $this->db->escape_string($ingId);
        $db = DbHelper::getInstance();
        $res = DbHelper::doQuery("delete from Ingredient where id = '$ingId';");
        if ($res instanceof DbError) {
            echo $res.getError();
        } else {
            echo "noerror";
        }
        header("Location: ".$_SESSION["baseURL"]."Admin");
    }

    public function getAllDrinksFromDb() {
        $res = array();
        $dbRes = DbHelper::doQuery("select * from Drink;");
        while($drink = $dbRes->fetch_object("Drink")){
            array_push($res, $drink);
        }
        return $res;
    }
}

?>