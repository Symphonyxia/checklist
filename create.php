<?php 
include 'header.php';
?>
<div class="container">
    <form action="resources/yearcode.php" method="post">
        <label for="year">Choose a year:</label>
        <select name="year" id="year">
            <?php
                $currentYear = date("Y");
                for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
            ?>
        </select>
        <br>
        <input type="submit" name="yearbtn" value="Submit">
    </form>
    </div>

<?php 
include 'footer.php';
?>
