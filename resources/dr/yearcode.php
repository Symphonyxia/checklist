<?php
include '../../boot.php';

if (isset($_POST['yearbtn'])) {
    $year = isset($_POST["year"]) ? $_POST["year"] : null;

    if ($year !== null) {
        try {
            $pdo->beginTransaction();

            // Check if the year already exists in the checklist table
            $checkYearStmt = $pdo->prepare("SELECT checklist_id FROM checklist WHERE year = :year");
            $checkYearStmt->bindParam(':year', $year, PDO::PARAM_STR);
            $checkYearStmt->execute();
            $checklistId = $checkYearStmt->fetchColumn();

            if (!$checklistId) {
                // Year does not exist, insert it into the checklist table
                $insertChecklistStmt = $pdo->prepare("INSERT INTO checklist (year) VALUES (:year)");
                $insertChecklistStmt->bindParam(':year', $year, PDO::PARAM_STR);
                $insertChecklistStmt->execute();
                $checklistId = $pdo->lastInsertId();
            }

            // Store the selected year and checklist ID in session variables
            $_SESSION['selectedYear'] = $year;
            $_SESSION['checklistId'] = $checklistId;

            $pdo->commit();

            // Data saved successfully, redirect to create.php
            $_SESSION['success'] = 'Year Added Successfully!';
            header('Location: ../../create.php');
            exit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            // Error in saving data, redirect to create.php with an error message
            $_SESSION['error'] = 'Year Not Added!';
            header('Location:../../create.php?error=1');
            exit();
        }
    } else {
        // Log or echo an error message for debugging
        echo "Error: 'year' not set in the form data.";
    }
}
?>
