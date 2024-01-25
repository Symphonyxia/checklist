<?php
include 'header.php';
include 'sidebar.php';
$getAllQuestionsStmt = $pdo->prepare('SELECT `group`, display_text, max_points, questions_id FROM questions');
$getAllQuestionsStmt->execute();
$allQuestions = $getAllQuestionsStmt->fetchAll(PDO::FETCH_ASSOC);

?>

<article class="my-article">
    <div class="title-search-block">
        <form method="post" action="resources/dr/submit_results.php" class="resultsForm">
            <div class="title-block">

                <div class="card col-lg-12">

                    <div class="card-body">

                        <div class="row form-group">
                            <div class="form-group col-md-3">
                                <label for="year"><strong> Enter Year:</strong></label>
                                <input type="text" class="form-control" name="year" placeholder="Input Year" id="year" required>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <Br>

            <section class="section">

                <div class="card col-lg-12">
                    <div class="card-body">
                        <div class="card-body">
                            <section class="example">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th> Yes</th>
                                            <th> No</th>
                                            <th>Max Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $currentGroup = null; // Initialize a variable to store the current group name
                                        foreach ($allQuestions as $question) {
                                            if ($currentGroup !== $question['group']) {
                                                // Display the group name only if it has changed
                                                echo '<tr><td colspan="5"><strong>' . htmlspecialchars($question['group']) . '</strong></td></tr>';
                                                $currentGroup = $question['group'];
                                            }
                                        ?>
                                            <tr>
                                                <td></td> <!-- Empty cell for indentation -->
                                                <td><?php echo htmlspecialchars($question['display_text']); ?></td>
                                                <td class="checkbox1">
                                                    <input type="checkbox" name="result_yes[<?php echo $question['questions_id']; ?>]" value="1">
                                                </td>
                                                <td class="checkbox2">
                                                    <input type="checkbox" name="result_no[<?php echo $question['questions_id']; ?>]" value="1">
                                                </td>
                                                <td><?php echo htmlspecialchars($question['max_points']); ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <button type="submit" name="submitResultsButton" class="btn btn-primary">Submit Results</button>
                            </section>
                        </div>
                    </div>
                </div>

            </section>
        </form>

    </div>
</article>

<?php include 'footer.php'; ?>