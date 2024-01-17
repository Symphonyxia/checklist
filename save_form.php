<?php
// Include your database connection file (boot.php)
include 'boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $groups = $_POST['group'];
    $displayTexts = $_POST['display_text'];
    $maxPoints = $_POST['max_points'];

    // Insert the form details into the 'questions' table
    $stmt = $pdo->prepare('INSERT INTO questions (title) VALUES (?)');
    $stmt->execute([$title]);

    // Get the form_id of the inserted form
    $id = $pdo->lastInsertId();

    // Iterate over the questions data and update the 'questions' table
    for ($i = 0; $i <= count($groups); $i++) {
        $group = $groups[$i]['group'];
        $displayText = $displayTexts[$i]['display_text'];
        $maxPoint = $maxPoints[$i]['max_points'];

        // Insert question details into the 'questions' table using parameterized queries
        $stmt = $pdo->prepare('INSERT INTO questions (questions_id, `group`, display_text, max_points) VALUES (?, ?, ?, ?)');
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $group, PDO::PARAM_STR);
        $stmt->bindParam(3, $displayText, PDO::PARAM_STR);
        $stmt->bindParam(4, $maxPoint, PDO::PARAM_INT);
        $stmt->execute();
    }

    echo 'Form saved successfully!';
    header("Location: form_page.php");
    exit();
} else {
    echo 'Invalid request method.';
}
?>
