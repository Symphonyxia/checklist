<?php
ob_start();
include '../../boot.php';

if (isset($_POST['deleteQuestion'])) {
    $questionIdToDelete = $_POST['deleteQuestion'];

    try {
        $pdo->beginTransaction();

        $deleteChecklistResultStmt = $pdo->prepare('DELETE FROM checklist_result WHERE questions_id = ?');
        $deleteChecklistResultStmt->execute([$questionIdToDelete]);

        // Delete the question from the questions table
        $deleteQuestionStmt = $pdo->prepare('DELETE FROM questions WHERE questions_id = ?');
        $deleteQuestionStmt->execute([$questionIdToDelete]);

        $pdo->commit();

        // Send a JSON response to indicate success
        echo json_encode(['success' => true]);
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();

        // Send a JSON response to indicate failure
        echo json_encode(['success' => false, 'message' => 'Failed to delete the question.']);
        exit();
    }
}

// Check if the form is submitted for updating
if (isset($_POST['updateform'])) {
    $questionIds = $_POST['question_id'];
    $groups = $_POST['group'] ?? [];
    $displayTexts = $_POST['display_text'];
    $maxPoints = $_POST['max_points'];
    $resultYesValues = $_POST['result_yes'] ?? [];
    $resultNoValues = $_POST['result_no'] ?? [];

    print_r($_POST);  // Debugging statement

    try {
        $pdo->beginTransaction();

        foreach ($questionIds as $key => $questionId) {
            // Update questions
            $updateStmt = $pdo->prepare('
                UPDATE questions
                SET `group` = :group, display_text = :display_text, max_points = :max_points
                WHERE questions_id = :question_id
            ');

            $updateStmt->execute([
                'group' => $groups[$key] ?? null,
                'display_text' => $displayTexts[$key],
                'max_points' => $maxPoints[$key],
                'question_id' => $questionId
            ]);

            // Update checklist result based on checkboxes
            $updateChecklistResultStmt = $pdo->prepare('
                UPDATE checklist_result
                SET result_yes = :result_yes, result_no = :result_no
                WHERE questions_id = :question_id
            ');

            // ...

            $updateChecklistResultStmt->execute([
                'result_yes' => $resultYes,
                'result_no' => $resultNo,
                'question_id' => $questionId
            ]);
        }

        $pdo->commit();
        $_SESSION['success'] = 'Questions and checklist results successfully updated.';
        header("Location: ../../edit_questions.php");
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        $_SESSION['error'] = 'Failed to update questions and checklist results. Please try again. Error: ' . $e->getMessage();
        header("Location: ../../edit_questions.php");
        exit();
    }
}


ob_end_flush(); // Flush the output buffer and send it
?>
