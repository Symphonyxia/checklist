<?php
include '../../header.php';

// Fetch the latest submitted checklist ID
$getLatestChecklistIdStmt = $pdo->query('SELECT MAX(checklist_id) AS latest_id FROM checklist');
$latestChecklistId = $getLatestChecklistIdStmt->fetchColumn();

// Use the latest checklist ID if not provided in the form
$checklistId = $checklistId ?: $latestChecklistId;

// Check if the checklist ID exists in the checklist table
$checkChecklistIdStmt = $pdo->prepare('SELECT COUNT(*) FROM checklist WHERE checklist_id = :checklistId');
$checkChecklistIdStmt->execute(['checklistId' => $checklistId]);
$checklistIdExists = $checkChecklistIdStmt->fetchColumn();

if ($checklistIdExists) {
    // Loop through the submitted questions and insert into the checklist_result table
    foreach ($_POST['questions_id'] as $questionId) {
        $resultYes = isset($_POST['result_yes'][$questionId]) ? 1 : 0;
        $resultNo = isset($_POST['result_no'][$questionId]) ? 1 : 0;

        // Insert the answers into the checklist_result table
        $insertResultStmt = $pdo->prepare('INSERT INTO checklist_result (checklist_id, questions_id, result_yes, result_no) VALUES (:checklistId, :questionId, :resultYes, :resultNo)');
        $insertResultStmt->execute([
            'checklistId' => $checklistId,
            'questionId' => $questionId,
            'resultYes' => $resultYes,
            'resultNo' => $resultNo,
        ]);
    }
    header('Location: ../../eval_page.php');
    exit();
} else {
    // Handle the case where the checklist ID does not exist
    echo "Checklist ID does not exist.";
}
