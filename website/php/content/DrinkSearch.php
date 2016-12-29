<script>
function search(link) {
    var searchWord = $("#searchWord").val();
    link = link + "?search=" + searchWord;
    $.get(link, function(data){
        $("#results").html(data);
    });
}
</script>
<?php
    class DrinkSearch {
        public function render($language) {
                $baseLink = $_SESSION["baseURL"]."php/ajax/searchDrinks.php";
                $text = "Drink suchen";
                if ($language=="en") {
                    $text = "Search Drink";
                }
            ?>
                <input type='text' id='searchWord' placeholder='<?php echo $text; ?>' onkeyup='search(<?php echo '"'.$baseLink.'"'; ?>)'>
                 <p id="results"></p>
            <?php
        }
    }
?>