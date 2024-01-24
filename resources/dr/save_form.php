<?php
include '../../boot.php';

if (isset($_POST['addform'])) {
    $groups = $_POST['group'];
    $display_texts = $_POST['display_text'];
    $max_points = $_POST['max_points'];

    // Ensure both arrays have the same length
    if (count($groups) !== count($display_texts)) {
        $_SESSION['error'] = 'Number of groups and display texts should match';
        header("Location: ../../create.php");
        exit();
    }

    // Use prepared statements and parameter binding for security
    $insertQuestionStmt = $pdo->prepare('INSERT INTO questions (`group`, `display_text`, `max_points`) VALUES (:group, :display_text, :max_points)');
    $insertResultStmt = $pdo->prepare('INSERT INTO checklist_result (`checklist_id`, `questions_id`) VALUES (:checklist_id, :questions_id)');

    try {
        // Retrieve the selected year and checklist ID from the session variables
        $year = $_SESSION['selectedYear'];
        $checklistId = $_SESSION['checklistId'];

        if (empty($year) || empty($checklistId)) {
            $_SESSION['error'] = 'Year or Checklist ID cannot be empty';
            header("Location: ../../create.php");
            exit();
        }

        // Insert each question into the database and associate with the checklist
        for ($i = 0; $i < count($groups); $i++) {
            // Insert into questions table
            $insertQuestionStmt->execute(['group' => $groups[$i], 'display_text' => $display_texts[$i], 'max_points' => $max_points[$i]]);
            $questionsId = $pdo->lastInsertId();

            // Insert into checklist_result table
            $insertResultStmt->execute(['checklist_id' => $checklistId, 'questions_id' => $questionsId]);
        }

        $_SESSION['success'] = 'Checklist created successfully';
        header("Location: ../../create.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
        header("Location: ../../create.php");
        exit();
    }
}
?>
