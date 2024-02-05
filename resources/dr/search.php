<?php
ob_start();
include '../../boot.php';

if (isset($_POST['deleteQuestion'])) {
    $questionIdToDelete = $_POST['deleteQuestion'];

    try {
        $pdo->beginTransaction();

        $deleteChecklistResultStmt = $pdo->prepare('DELETE FROM checklist_result WHERE questions_id = ?');
        $deleteChecklistResultStmt->execute([$questionIdToDelete]);

        $deleteQuestionStmt = $pdo->prepare('DELETE FROM questions WHERE questions_id = ?');
        $deleteQuestionStmt->execute([$questionIdToDelete]);

        $pdo->commit();

        echo json_encode(['success' => true]);
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();

        echo json_encode(['success' => false, 'message' => 'Failed to delete the question.']);
        exit();
    }
}

if (isset($_POST['updateform'])) {
    $questionIds = $_POST['question_id'];
    $groups = isset($_POST['group']) ? $_POST['group'] : array();
    $displayTexts = $_POST['display_text'];
    $maxPoints = $_POST['max_points'];

    try {
        $pdo->beginTransaction();

        foreach ($questionIds as $key => $questionId) {
            $updateStmt = $pdo->prepare('
                UPDATE questions
                SET group = :group, display_text = :display_text, max_points = :max_points
                WHERE questions_id = :question_id
            ');

            $updateStmt->execute([
                'group' => isset($groups[$key]) ? $groups[$key] : null,
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
        $_SESSION['error'] = 'Failed to update questions. Please try again. Error: ' . $e->getMessage();
        header("Location: ../../edit_questions.php");
        exit();
    }
}

ob_end_flush(); 
