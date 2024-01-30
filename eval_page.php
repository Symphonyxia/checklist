<?php
include 'header.php';
include 'sidebar.php';

$selectedYear = '';

if (isset($_POST['saveResultsButton'])) {
    $selectedYear = $_POST['selectedYear'];

    // Save the year in the checklist table
    $saveYearStmt = $pdo->prepare('INSERT INTO checklist (year) VALUES (:year) ON DUPLICATE KEY UPDATE year = :year');
    $saveYearStmt->execute(['year' => $selectedYear]);
}

$getAllQuestionsStmt = $pdo->prepare('SELECT `group`, display_text, max_points, questions_id FROM questions');
$getAllQuestionsStmt->execute();
$allQuestions = $getAllQuestionsStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<article class="my-article">
    <div class="title-search-block">
        <div class="card col-lg-12">

            <div class="card-body">

                <div class="" <form method="post" action="" class="savForm">
                    <label for="yearInput">Enter Year:</label>
                    <input type="text" id="yearInput" name="selectedYear" value="<?php echo htmlspecialchars($selectedYear); ?>">
                    <button type="submit" name="saveResultsButton" class="btn btn-primary">Save</button>
                    </form>

                    <form method="post" action="submit_results.php" class="submitForm">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Yes</th>
                                    <th>No</th>
                                    <th>Max Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $currentGroup = null;
                                foreach ($allQuestions as $question) {
                                    if ($currentGroup !== $question['group']) {
                                        echo '<tr><td colspan="4"><strong>' . htmlspecialchars($question['group']) . '</strong></td></tr>';
                                        $currentGroup = $question['group'];
                                    }
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlspecialchars($question['display_text']); ?>
                                        </td>
                                        <td class="checkbox1">
                                            <input type="checkbox" name="result_yes[<?php echo $question['questions_id']; ?>]" value="1" <?php echo (isset($_POST['result_yes'][$question['questions_id']]) && $_POST['result_yes'][$question['questions_id']] == 1) ? 'checked' : ''; ?>>
                                        </td>
                                        <td class="checkbox2">
                                            <input type="checkbox" name="result_no[<?php echo $question['questions_id']; ?>]" value="1" <?php echo (isset($_POST['result_no'][$question['questions_id']]) && $_POST['result_no'][$question['questions_id']] == 1) ? 'checked' : ''; ?>>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($question['max_points']); ?>
                                        </td>
                                    </tr>
                                <?php
                                    // Move the hidden input inside the loop to capture each question ID
                                    echo '<input type="hidden" name="questions_id[]" value="' . $question['questions_id'] . '">';
                                }
                                ?>
                            </tbody>
                        </table>
                        <input type="hidden" name="checklist_id" value="<?php echo $selectedYear; ?>">

                        <br>
                        <button type="submit" name="submitResultsButton" class="btn btn-primary">Submit Results</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</article>

<?php include 'footer.php'; ?>