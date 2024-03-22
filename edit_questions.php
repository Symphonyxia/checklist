<?php
include 'includes/header.php';
include 'includes/navbar.php';

$getAllQuestionsStmt = $pdo->prepare('SELECT `group`, display_text, max_points, questions_id FROM questions ORDER BY `group`');
$getAllQuestionsStmt->execute();
$allQuestions = $getAllQuestionsStmt->fetchAll(PDO::FETCH_ASSOC);




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['delete_question_id'])) {
        $questionId = $_POST['delete_question_id'];
        $deleteQuestionStmt = $pdo->prepare('DELETE FROM questions WHERE questions_id = :questionId');
        $deleteQuestionStmt->execute(['questionId' => $questionId]);
        exit; // Stop further execution after deletion
    }
    for ($i = 0; $i < count($_POST['question_id']); $i++) {
        $questionId = $_POST['question_id'][$i];
        $group = $_POST['group'][$i];
        $displayText = $_POST['display_text'][$i];
        $maxPoints = $_POST['max_points'][$i];

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

<?php
      if (isset($_SESSION['error'])) {
        echo "
                        <div class='alert alert-danger text-center'>
                            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
                        </div>
                    ";


        unset($_SESSION['error']);
      }

      if (isset($_SESSION['success'])) {
        echo "
                        <div class='alert alert-success text-center'>
                            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
                        </div>
                    ";


        unset($_SESSION['success']);
      }
      ?>
<div class="container">
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
</div>

<?php 
include 'includes/scripts.php';
include 'includes/footer.php';
?>
<script>
    // JavaScript to handle deletion via AJAX
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-question');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const questionId = this.dataset.questionId;
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Remove the deleted row from the table
                        const deletedRow = button.closest('tr');
                        deletedRow.parentNode.removeChild(deletedRow);
                        // Optionally, display success message
                        alert('Question deleted successfully.');
                    }
                };
                xhr.open('POST', window.location.href, true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('delete_question_id=' + questionId);
            });
        });
    });
</script>
