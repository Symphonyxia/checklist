<?php
include '../../header.php';

// Fetch the latest submitted checklist ID
$getLatestChecklistIdStmt = $pdo->query('SELECT MAX(checklist_id) AS latest_id FROM checklist');
$latestChecklistId = $getLatestChecklistIdStmt->fetchColumn();

// Use the latest checklist ID if not provided in the form
$checklistId = isset($checklistId) ? $checklistId : $latestChecklistId;

// Check if the checklist ID exists in the checklist table
$checkChecklistIdStmt = $pdo->prepare('SELECT COUNT(*) FROM checklist WHERE checklist_id = :checklistId');
$checkChecklistIdStmt->execute(['checklistId' => $checklistId]);
$checklistIdExists = $checkChecklistIdStmt->fetchColumn();
if ($checklistIdExists) {
    // Loop through the submitted questions and insert into the checklist_result table
    foreach ($_POST['questions_id'] as $questionId) {
        // Fetch max_points from the questions table
        $getMaxPointsStmt = $pdo->prepare('SELECT max_points FROM questions WHERE questions_id = :questionId');
        $getMaxPointsStmt->execute(['questionId' => $questionId]); // Execute the query to fetch max_points
        $maxPoints = $getMaxPointsStmt->fetchColumn();

        // Determine result based on checkbox (yes or no)
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
    // Handle the case where the checklist ID does not exist
    $_SESSION['error'] = 'Checklist ID does not exist.';
    header('Location: ../../eval_page.php');

}
