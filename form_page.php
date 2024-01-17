<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
</head>
<body>
    <h1>Form Page</h1>

    <?php
session_start(); // Start the session

if (isset($_SESSION['selectedYear'])) {
    $selectedYear = $_SESSION['selectedYear'];
    echo "<p>You selected the year: $selectedYear</p>";
    // Clear the session variable to avoid displaying the same data on page refresh
    unset($_SESSION['selectedYear']);
} else {
    // Handle the case when "selectedYear" is not set
    echo "<p>Error: Please select a year.</p>";
}
?>

</body>
</html>
