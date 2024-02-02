<?php
include 'header.php';
include 'sidebar.php';

// Fetch all questions from the questions table
$getAllQuestionsStmt = $pdo->prepare('SELECT `group`, display_text, max_points, questions_id FROM questions ORDER BY `group`');
$getAllQuestionsStmt->execute();
$allQuestions = $getAllQuestionsStmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Loop through the submitted data and update the questions in the database
    for ($i = 0; $i < count($_POST['question_id']); $i++) {
        $questionId = $_POST['question_id'][$i];
        $group = $_POST['group'][$i];
        $displayText = $_POST['display_text'][$i];
        $maxPoints = $_POST['max_points'][$i];

        // Update the group, display_text, and max_points in the questions table
        $updateQuestionStmt = $pdo->prepare('UPDATE questions SET `group` = :group, display_text = :displayText, max_points = :maxPoints WHERE questions_id = :questionId');
        $updateQuestionStmt->execute([
            'group' => $group,
            'displayText' => $displayText,
            'maxPoints' => $maxPoints,
            'questionId' => $questionId,
        ]);
    }
}

?>

<article class="my-article">
    <div class="title-search-block">
        <div class="title-block">
            <form method="post" action="resources/dr/search.php">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Group</th>
                            <th>Question</th>
                            <th>Max Points</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($allQuestions)): ?>
                            <?php
                            $currentGroup = null;
                            foreach ($allQuestions as $question) {
                                if ($currentGroup !== $question['group']) {
                                    echo '<tr><td colspan="4"><strong contenteditable="true" class="edit-group">' . htmlspecialchars($question['group']) . '</strong></td></tr>';
                                    $currentGroup = $question['group'];
                                }
                                ?>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control edit-group" name="group[]"
                                            value="<?= htmlspecialchars($question['group']); ?>">
                                    </td>
                                    <td>
                                        <input type="hidden" name="question_id[]" value="<?= $question['questions_id']; ?>">
                                        <textarea class="form-control edit-text" name="display_text[]"
                                            rows="5"><?= htmlspecialchars($question['display_text']); ?></textarea>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control edit-points" name="max_points[]"
                                            value="<?= $question['max_points']; ?>">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger delete-question"
                                            data-question-id="<?= $question['questions_id']; ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No questions available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-primary" name="updateform" value="Update Questions">
            </form>
            <br>
        </div>
    </div>
</article>


<?php include 'footer.php'; ?>

