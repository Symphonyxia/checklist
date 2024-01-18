<?php
include 'boot.php';

if (isset($_POST['selected_year'])) {
    $selectedYear = isset($_POST["selected_year"]) ? $_POST["selected_year"] : null;

    if ($selectedYear !== null) {
        // Store the selected year in a session variable
        $_SESSION['selectedYear'] = $selectedYear;

        // Redirect to form_page.php
        header('Location: form_page.php');
        exit();
    } else {
        // Log or echo an error message for debugging
        echo "Error: 'selected_year' not set in the form data.";
    }
}
?>
