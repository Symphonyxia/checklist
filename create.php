<?php
include 'header.php';
?>
<<<<<<< Updated upstream
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
=======


<section class="row">
    <div class="card col-lg-12">
        <div class="card-body">
            <div class="card-body">
                <div class="card card-block">
                    <div class="container">
                        <form action="resources/yearcode.php" method="post">
                            <div class="row form-group">
                                <div class="form-group col-xs-4">
                                    <label for="year">Choose a year:</label>
                                    <select name="year" id="year">
                                        <?php
                                        $currentYear = date("Y");
                                        $yearsToShow = 10;

                                        echo "<option value=''>Select Year</option>";

                                        for ($i = $currentYear - $yearsToShow; $i <= $currentYear + $yearsToShow; $i++) {
                                            echo "<option value=\"$i\">$i</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-sm" name="yearbtn" value="Submit">ADD</button>

                                </div>


                            </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


>>>>>>> Stashed changes
<?php
include 'footer.php';
?>
