<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Year</title>
</head>
<body>
    <h1>Select a Year</h1>
    <form action="code.php" method="post">
        <label for="year">Choose a year:</label>
        <select name="year" id="year">
            <?php
                $currentYear = date("Y");
                for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
            ?>
        </select>
        <br>
        <input type="submit" name="yearbtn" value="Submit">
    </form>
</body>
</html>
