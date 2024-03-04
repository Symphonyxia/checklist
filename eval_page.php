<?php
include 'header.php';
include 'sidebar.php';
$selectedYear = '';


$getAllQuestionsStmt = $pdo->prepare('SELECT `group`, display_text, max_points, questions_id FROM questions');
$getAllQuestionsStmt->execute();
$allQuestions = $getAllQuestionsStmt->fetchAll(PDO::FETCH_ASSOC);

usort($allQuestions, function ($a, $b) {
    return strcmp($a['group'], $b['group']);
});
?>

<article class="my-article">
    <div class="title-search-block">
        <div class="card col-lg-12">
            <div class="card-body">
                <div class="">
                <form method="post" action="resources/dr/submit_results.php" class="submitForm">
                    <div class="saveForm" id="saveForm">
                        <label for="yearInput">Title:</label>
                        <input type="text" id="yearInput" name="selectedYear" value="<?php echo htmlspecialchars($selectedYear); ?>">
</div>

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
                                    echo '<input type="hidden" name="questions_id[]" value="' . $question['questions_id'] . '">';
                                }
                                ?>
                            </tbody>
                        </table>
                        <input type="hidden" name="checklist_id" value="<?php echo $selectedYear; ?>">
                    </form>

                    <br>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Submit Results</button>
                </div>
            </div>
        </div>
    </div>
</article>

<script>
    function submitForm() {
        document.querySelector('.submitForm').submit();
    }
</script>

<?php include 'footer.php'; ?>
