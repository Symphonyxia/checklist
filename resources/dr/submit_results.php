<?php
include '../../header.php';

$getLatestChecklistIdStmt = $pdo->query('SELECT MAX(checklist_id) AS latest_id FROM checklist');
$latestChecklistId = $getLatestChecklistIdStmt->fetchColumn();

$checklistId = isset($checklistId) ? $checklistId : $latestChecklistId;

$checkChecklistIdStmt = $pdo->prepare('SELECT COUNT(*) FROM checklist WHERE checklist_id = :checklistId');
$checkChecklistIdStmt->execute(['checklistId' => $checklistId]);
$checklistIdExists = $checkChecklistIdStmt->fetchColumn();
if ($checklistIdExists) {
    foreach ($_POST['questions_id'] as $questionId) {
        $getMaxPointsStmt = $pdo->prepare('SELECT max_points FROM questions WHERE questions_id = :questionId');
        $getMaxPointsStmt->execute(['questionId' => $questionId]); 
        $maxPoints = $getMaxPointsStmt->fetchColumn();

        $resultYes = isset($_POST['result_yes'][$questionId]) ? 'Yes' : 'No';
        $resultNo = isset($_POST['result_no'][$questionId]) ? 'Yes' : 'No';

        $insertResultStmt = $pdo->prepare('INSERT INTO checklist_result (checklist_id, questions_id, result_yes, result_no) 
        VALUES (:checklistId, :questionId, :resultYes, :resultNo) 
        ON DUPLICATE KEY UPDATE result_yes = :resultYes, result_no = :resultNo');
        $insertResultStmt->execute([
            'checklistId' => $checklistId,
            'questionId' => $questionId,
            'resultYes' => $resultYes,
            'resultNo' => $resultNo,
        ]);

    }
    $_SESSION['success'] = 'Record saved Successfully!';
    header('Location: ../../eval_page.php');
    exit();
} else {
    $_SESSION['error'] = 'Checklist ID does not exist.';
    header('Location: ../../eval_page.php');

}
