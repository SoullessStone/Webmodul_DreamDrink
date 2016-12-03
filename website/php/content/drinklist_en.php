<div class="leftBar">

</div>
<div class="content">
    <h1>All drinks</h1>
    <p>All drinks with your rating!</p>

    Suche mit AJAX machen!
    <table id="drinks">
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td><b>Description</b></td>
                <td><b>Creator</b></td>
                <td><b>Date</b></td>
                <td><b>Rating</b></td>
            </tr>
            <?php
                foreach ($this->model->getAllDrinksFromDb() as $drink) {
                    $link = "index.php?site=drink&id=".$drink->getId();
                    echo "<tr>";
                    echo "    <td><a href='$link'>".$drink->getName()."</a></td>";
                    echo "    <td>".$drink->getDescription()."</td>";
                    echo "    <td>".$drink->getCreatedAt()."</td>";
                    echo "    <td>".$drink->getCreator()."</td>";
                    echo "    <td>TODO</td>";
                    echo "</tr>";
                } 
            ?>
        </tbody>
    </table>

</div>
<div class="rightBar">
    
</div>