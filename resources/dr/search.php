<?php
include '../../boot.php';


if (isset($_POST['deleteQuestion'])) {
    $questionIdToDelete = $_POST['deleteQuestion'];

    // Function to delete the question
    function deleteQuestion($pdo, $questionIdToDelete)
    {
        $deleteQuestionStmt = $pdo->prepare('DELETE FROM questions WHERE questions_id = ?');
        $deleteQuestionStmt->execute([$questionIdToDelete]);
        return $deleteQuestionStmt->rowCount() > 0;
    }

    // Call the deleteQuestion function
    if (deleteQuestion($pdo, $questionIdToDelete)) {
        // Success message, or redirect if needed
        $_SESSION['delete_message'] = 'Question deleted successfully!';
        header("Location: ../../edit_questions.php");
        exit();
    } else {
        // Error message
        $_SESSION['delete_message'] = 'Failed to delete the question.';
        header("Location: ../../edit_questions.php");
        exit();
    }
}


// Check if the form is submitted for updating
if (isset($_POST['updateform'])) {
    $questionIds = $_POST['question_id'];
    $groups = $_POST['group'];
    $displayTexts = $_POST['display_text'];
    $maxPoints = $_POST['max_points'];

    try {
        $pdo->beginTransaction();

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
