<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container">
<article class="my-article">
    <div class="title-search-block">
        <div class="title-block">

            <div class="card col-lg-12">

                <div class="card-body">

                    <div class="row">
                        <form action="" method="post">
                            <button type="button" class="btn btn-success btn-sm" style="float: left;" onclick="addQuestion()">Create Question</button>
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

                            <form action="save_form.php" method="post">
                                <input type="hidden" name="CSRFkey" value="<?php echo $key ?>" id="CSRFkey">
                                <input type="hidden" name="token" value="<?php echo $token ?>" id="CSRFtoken">
                                <div id="additional_questions"></div>


                                <button type="submit" class="btn btn-success btn-sm " style="float: right;" name="addform">Submit Questions</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</article>

    </div>
    <?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>
 
