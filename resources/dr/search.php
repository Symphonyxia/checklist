<?php
include '../../boot.php';

// Check if the form is submitted for updating
if (isset($_POST['updateform'])) {
    $questionIds = $_POST['question_id'];
    $groups = $_POST['group'];
    $displayTexts = $_POST['display_text'];
    $maxPoints = $_POST['max_points'];

    try {
        $pdo->beginTransaction();

        // Loop through the submitted data and update the questions table
        foreach ($questionIds as $key => $questionId) {
            $updateStmt = $pdo->prepare('
                UPDATE questions
                SET `group` = :group, display_text = :display_text, max_points = :max_points
                WHERE questions_id = :question_id
            ');

            $updateStmt->execute([
                'group' => $groups[$key],
                'display_text' => $displayTexts[$key],
                'max_points' => $maxPoints[$key],
                'question_id' => $questionId
            ]);
        }

        $pdo->commit();
        $_SESSION['success'] = 'Questions successfully updated.';
        header("Location: ../../edit_questions.php");
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        $_SESSION['error'] = 'Failed to update questions. Please try again.';
        header("Location: ../../edit_questions.php");
        exit();
    }
}


$key = $_POST['CSRFkey'];
$token = hash_hmac('sha256', 'This is for index page', $key);
if (hash_equals($token, $_POST['CSRFtoken'])) {

} else {

}

?>
