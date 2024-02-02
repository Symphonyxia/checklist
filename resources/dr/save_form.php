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

    try {


        // Insert each question into the database and associate with the checklist
        for ($i = 0; $i < count($groups); $i++) {
            // Insert into questions table
            $insertQuestionStmt->execute(['group' => $groups[$i], 'display_text' => $display_texts[$i], 'max_points' => $max_points[$i]]);
            $questionsId = $pdo->lastInsertId();
        }

        $_SESSION['success'] = 'Questions Inserted successfully';
        header("Location: ../../create.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
        header("Location: ../../create.php");
        exit();
    }
}
