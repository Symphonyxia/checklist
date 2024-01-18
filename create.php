<?php
include 'header.php';
?>
<div class="container">
    <form action="yearcode.php" method="post">
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
        <input type="submit" name="selected_year" value="Submit">
        <!-- Add a hidden input field to pass the selected year to form_page.php -->
    </form>
</div>
<?php
include 'footer.php';
?>
