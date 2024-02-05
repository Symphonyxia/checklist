<?php
include '../../boot.php';

if (isset($_POST['yearbtn'])) {
    $year = isset($_POST["year"]) ? $_POST["year"] : null;

    if ($year !== null) {
        try {
            $pdo->beginTransaction();

            $checkYearStmt = $pdo->prepare("SELECT checklist_id FROM checklist WHERE year = :year");
            $checkYearStmt->bindParam(':year', $year, PDO::PARAM_STR);
            $checkYearStmt->execute();
            $checklistId = $checkYearStmt->fetchColumn();

            if (!$checklistId) {
                $insertChecklistStmt = $pdo->prepare("INSERT INTO checklist (year) VALUES (:year)");
                $insertChecklistStmt->bindParam(':year', $year, PDO::PARAM_STR);
                $insertChecklistStmt->execute();
                $checklistId = $pdo->lastInsertId();
            }

            $_SESSION['selectedYear'] = $year;
            $_SESSION['checklistId'] = $checklistId;

            $pdo->commit();

            $_SESSION['success'] = 'Year Added Successfully!';
            header('Location: ../../create.php');
            exit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            $_SESSION['error'] = 'Year Not Added!';
            header('Location:../../create.php?error=1');
            exit();
        }
    } else {
        echo "Error: 'year' not set in the form data.";
    }
}
?>
