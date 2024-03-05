<?php
include 'includes/boot.php';

if (isset($_POST['addform'])) {
    $groups = $_POST['group'];
    $display_texts = $_POST['display_text'];
    $max_points = $_POST['max_points'];

    if (count($groups) !== count($display_texts)) {
        $_SESSION['error'] = 'Number of groups and display texts should match';
        header("Location: create.php");
        exit();
    }
    $insertQuestionStmt = $pdo->prepare('INSERT INTO questions (`group`, `display_text`, `max_points`) VALUES (:group, :display_text, :max_points)');
    try {


        for ($i = 0; $i < count($groups); $i++) {
            $insertQuestionStmt->execute(['group' => $groups[$i], 'display_text' => $display_texts[$i], 'max_points' => $max_points[$i]]);
            $questionsId = $pdo->lastInsertId();
        }

        $_SESSION['success'] = 'Questions Inserted successfully';
        header("Location: create.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
        header("Location: create.php");
        exit();
    }
}
