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
        public function render() {
            ?>
                 <input type="text" id="searchWord" onkeyup="search('http://localhost/Webmodul_DreamDrink/website/php/ajax/searchDrinks.php')">
                 <p id="results"></p>
            <?php
        }
    }
?>