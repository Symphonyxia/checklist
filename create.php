<?php
include 'header.php';
include 'sidebar.php';

?>
<article class="my-article">
    <div class="title-search-block">
        <div class="title-block">

            <div class="card col-lg-12">

                <div class="card-body">

                    <div class="row">
                        <form action="resources/dr/yearcode.php" method="post">
                        <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
    <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">
                            <div class="row form-group">
                                <div class="form-group col-xs-4">
                                    <label for="year">
                                        Select Year:
                                    </label>
                                    <select name="year" id="year" required>
                                        <?php
                                        $currentYear = date("Y");
                                        $yearsToShow = 10;

                                        echo "<option value=''></option>";

                                        for ($i = $currentYear; $i <= $currentYear + $yearsToShow; $i++) {
                                            echo "<option value=\"$i\">$i</option>";
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm" value="submit"
                                        name="yearbtn">Add Year</button>
                                    <button type="button" class="btn btn-success btn-sm" style="float: right;"
                                        onclick="addQuestion()">Create Question</button>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>


    <section class="my-section">
        <div class="card col-lg-12" id="form-section">
            <div class="card-body">
                <div class="card-body">
                    <div class="card-body">
                        <div class="container">

                            <form action="resources/dr/save_form.php" method="post">
                            <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
    <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">

                                <div id="additional_questions"></div>


                                <button type="submit" class="btn btn-success " style="float: right;"
                                    name="addform">Submit Questions</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <?php
    include 'footer.php';
    ?>
