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
                $baseLink = $_SESSION["baseURL"]."php/ajax/searchDrinks.php";
            ?>
                <input type='text' id='searchWord' onkeyup='search(<?php echo '"'.$baseLink.'"'; ?>)'>
                 <p id="results"></p>
            <?php
        }
    }
?>