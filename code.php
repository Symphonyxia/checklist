<?php
session_start(); // Start the session

$connection = mysqli_connect("localhost", "root", "", "checklist");

if (isset($_POST['yearbtn'])) {
    $year = isset($_POST["year"]) ? $_POST["year"] : null;

    if ($year !== null) {
        $query = "INSERT INTO checklist (year) VALUES ('$year')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            // Store the selected year in a session variable
            $_SESSION['selectedYear'] = $year;
            // Data saved successfully, redirect to form_page.php
            header('Location: form_page.php');
            exit();
        } else {
            // Error in saving data, redirect to index.php with an error message
            header('Location: index.php?error=1');
            exit();
        }
    } else {
        // Log or echo an error message for debugging
        echo "Error: 'year' not set in the form data.";
    }
}
?>
