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
    $stmt = $pdo->prepare('INSERT INTO questions (`group`, `display_text`, `max_points`) VALUES (:group, :display_text, :max_points)');

    try {
        // Insert each question into the database
        for ($i = 0; $i < count($groups); $i++) {
            $stmt->execute(['group' => $groups[$i], 'display_text' => $display_texts[$i], 'max_points' => $max_points[$i]]);
        }

        $_SESSION['success'] = 'Questions added successfully';
        header("Location: form_page.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
        header("Location: form_page.php");
        exit();
    }
}
?>
