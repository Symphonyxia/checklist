<?php
session_start();
include 'boot.php';

if (isset($_POST['addform'])) {
    $groups = $_POST['group'];
    $display_texts = $_POST['display_text'];
    $max_points = $_POST['max_points'];

    // Ensure both arrays have the same length
    if (count($groups) !== count($display_texts)) {
        $_SESSION['error'] = 'Number of groups and display texts should match';
        header("Location: form_page.php");
        exit();
    }

    // Use prepared statements and parameter binding for security
    $insertQuestionStmt = $pdo->prepare('INSERT INTO questions (`group`, `display_text`, `max_points`) VALUES (:group, :display_text, :max_points)');
    $insertResultStmt = $pdo->prepare('INSERT INTO checklist_result (`checklist_id`, `questions_id`, `result_yes`, `result_no`) VALUES (:checklist_id, :questions_id, :result_yes, :result_no)');

    try {
        // Retrieve the selected year from the session variable
        $year = $_SESSION['selectedYear'];

        if (empty($year)) {
            $_SESSION['error'] = 'Year cannot be empty';
            header("Location: form_page.php");
            exit();
        }

        // Insert checklist and get the checklist ID if it doesn't exist for the selected year
        $pdo->beginTransaction();
        $checklistId = getChecklistId($pdo, $year);

        // Insert each question into the database and associate with the checklist
        for ($i = 0; $i < count($groups); $i++) {
            // Insert into questions table
            $insertQuestionStmt->execute(['group' => $groups[$i], 'display_text' => $display_texts[$i], 'max_points' => $max_points[$i]]);
            $questionsId = $pdo->lastInsertId();

            // Insert into checklist_result table
            $insertResultStmt->execute(['checklist_id' => $checklistId, 'questions_id' => $questionsId, 'result_yes' => 'Yes', 'result_no' => 'No']);
        }

        $pdo->commit();
        $_SESSION['success'] = 'Checklist created successfully';
        header("Location: form_page.php");
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
        header("Location: form_page.php");
        exit();
    }
}

function getChecklistId($pdo, $year)
{
    // Check if a checklist exists for the selected year
    $checklistIdStmt = $pdo->prepare('SELECT checklist_id FROM checklist WHERE year = :year');
    $checklistIdStmt->execute(['year' => $year]);
    $checklistId = $checklistIdStmt->fetchColumn();

    // If a checklist doesn't exist, create a new one
    if (!$checklistId) {
        $insertChecklistStmt = $pdo->prepare('INSERT INTO checklist (`year`) VALUES (:year)');
        $insertChecklistStmt->execute(['year' => $year]);
        $checklistId = $pdo->lastInsertId();
    }

    return $checklistId;
}
?>
