<?php
include '../../boot.php';

$response = ['success' => false, 'message' => ''];

if (isset($_POST['submitResultsButton'])) {
    $resultYes = $_POST['result_yes'];
    $resultNo = $_POST['result_no'];

    try {
        $pdo->beginTransaction();

        // Update result_yes values
        foreach ($resultYes as $checklistId => $questions) {
            foreach ($questions as $questionId => $value) {
                // Fetch max_points for the question
                $getMaxPointsStmt = $pdo->prepare('SELECT max_points FROM questions WHERE questions_id = :questions_id');
                $getMaxPointsStmt->execute(['questions_id' => $questionId]);
                $maxPoints = $getMaxPointsStmt->fetchColumn();

                // Fetch current result_yes from the database
                $getCurrentResultYesStmt = $pdo->prepare('
                    SELECT result_yes FROM checklist_result
                    WHERE checklist_id = :checklist_id AND questions_id = :questions_id
                ');
                $getCurrentResultYesStmt->execute([
                    'checklist_id' => $checklistId,
                    'questions_id' => $questionId
                ]);
                $currentResultYes = $getCurrentResultYesStmt->fetchColumn();

                // Update result_yes in checklist_result table
                $updateResultYesStmt = $pdo->prepare('
                    UPDATE checklist_result
                    SET result_yes = :result_yes
                    WHERE checklist_id = :checklist_id AND questions_id = :questions_id
                ');
                $updateResultYesStmt->execute([
                    'result_yes' => $currentResultYes + ($value * $maxPoints),
                    'checklist_id' => $checklistId,
                    'questions_id' => $questionId
                ]);
            }
        }

        // Update result_no values
        foreach ($resultNo as $checklistId => $questions) {
            foreach ($questions as $questionId => $value) {
                // Fetch max_points for the question
                $getMaxPointsStmt = $pdo->prepare('SELECT max_points FROM questions WHERE questions_id = :questions_id');
                $getMaxPointsStmt->execute(['questions_id' => $questionId]);
                $maxPoints = $getMaxPointsStmt->fetchColumn();

                // Fetch current result_no from the database
                $getCurrentResultNoStmt = $pdo->prepare('
                    SELECT result_no FROM checklist_result
                    WHERE checklist_id = :checklist_id AND questions_id = :questions_id
                ');
                $getCurrentResultNoStmt->execute([
                    'checklist_id' => $checklistId,
                    'questions_id' => $questionId
                ]);
                $currentResultNo = $getCurrentResultNoStmt->fetchColumn();

                // Update result_no in checklist_result table
                $updateResultNoStmt = $pdo->prepare('
                    UPDATE checklist_result
                    SET result_no = :result_no
                    WHERE checklist_id = :checklist_id AND questions_id = :questions_id
                ');
                $updateResultNoStmt->execute([
                    'result_no' => $currentResultNo + ($value * $maxPoints),
                    'checklist_id' => $checklistId,
                    'questions_id' => $questionId
                ]);
            }
        }

        $pdo->commit();
        $response['success'] = true;
        $_SESSION['success'] = 'Results successfully recorded.'; // Set session success message
        header("Location: ../../eval_page.php");
    } catch (PDOException $e) {
        $pdo->rollBack();
        $_SESSION['error'] = 'Failed to record results. Please try again.'; // Set session error message
        header("Location: ../../eval_page.php");
    }
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
