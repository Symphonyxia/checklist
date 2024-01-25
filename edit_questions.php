<?php
include 'header.php';
include 'sidebar.php';

$getQuestionsStmt = $pdo->prepare('SELECT * FROM questions');
$getQuestionsStmt->execute();
$questions = $getQuestionsStmt->fetchAll(PDO::FETCH_ASSOC);



?>

<article class="my-article">
    <div class="title-search-block">
        <div class="title-block">
            <?php

            // Display delete message if set
            if (isset($_SESSION['delete_message'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['delete_message'] . '</div>';
                unset($_SESSION['delete_message']); // Clear the message after displaying
            }
            ?>

            <div class="card col-lg-12">
                <div class="card-body">
                    <div class="container">
                        <form action="resources/dr/search.php" method="post" class="row g-3">

                            <?php foreach ($questions as $question) : ?>
                                <br>
                                <hr>
                                <div class="edit-panel">

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="group">Enter Group:</label>
                                            <input type="text" class="form-control" name="group[]" value="<?= htmlspecialchars($question['group']); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="display_text">Enter Text:</label>
                                            <input type="text" class="form-control" name="display_text[]" value="<?= htmlspecialchars($question['display_text']); ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="max_points">Enter Points:</label>
                                            <input type="number" class="form-control" name="max_points[]" value="<?= $question['max_points']; ?>">
                                            <input type="hidden" name="question_id[]" value="<?= $question['questions_id']; ?>">
                                        </div>

                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-danger btn-sm" name="deleteQuestion" value="<?= $question['questions_id']; ?>">Delete</button>
                                        </div>
                                    </div>

                                    <br>
                                <?php endforeach; ?>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary" name="updateform">Update Questions</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<?php include 'footer.php'; ?>