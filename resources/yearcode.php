
<?php
include '../boot.php'; // Include boot.php to get the PDO connection

if (isset($_POST['yearbtn'])) {
    $year = isset($_POST["year"]) ? $_POST["year"] : null;

    if ($year !== null) {
        // Use the PDO connection for database operations
        try {
            $stmt = $pdo->prepare("INSERT INTO checklist (year) VALUES (:year)");
            $stmt->bindParam(':year', $year, PDO::PARAM_STR);
            $stmt->execute();

            // Store the selected year in a session variable
            $_SESSION['selectedYear'] = $year;

            // Data saved successfully, redirect to form_page.php
            header('Location: ../form_page.php');
            exit();
        } catch (PDOException $e) {
            // Error in saving data, redirect to index.php with an error message
            header('Location: ../index.php?error=1');
            exit();
        }
    } else {
        // Log or echo an error message for debugging
        echo "Error: 'year' not set in the form data.";
    }
}

?>
