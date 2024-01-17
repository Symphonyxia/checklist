<?php
session_start();
include 'boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $groups = $_POST['group'];
    $displayTexts = $_POST['display_text'];
    $maxPoints = $_POST['max_points'];

    // Get the question_id of the inserted question
    $stmt = $pdo->prepare('INSERT INTO questions (`group`, `display_text`, `max_points`) VALUES (?, ?, ?)');

    // Insert each question into the 'questions' table
    for ($i = 0; $i < count($groups); $i++) {
        $group = $groups[$i]['group'];
        $displayText = $displayTexts[$i]['display_text'];
        $maxPoint = $maxPoints[$i]['max_points'];

        $stmt->execute([$group, $displayText, $maxPoint]);
    }

    echo 'Form saved successfully!';
    header("Location: form_page.php");
    exit();
} else {
    echo 'Invalid request method.';
}
