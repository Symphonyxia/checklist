<?php
include 'header.php';
?>

<?php
if (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger text-center'>
            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
          </div>";

    // unset error
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<div class='alert alert-success text-center'>
            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
          </div>";

    // unset success
    unset($_SESSION['success']);
}
?>

<form action="save_form.php" method="post">
    <label for="group">Enter Group:</label>
    <input type="text" id="group" name="group[]" required>

    <label for="display_text">Enter Text:</label>
    <input type="text" id="display_text" name="display_text[]" required>

    <label for="max_points">Enter Points:</label>
    <input type="number" id="max_points" name="max_points[]" required>


    <!-- Allow user to add more questions dynamically -->
    <div id="additional_questions"></div>
    <button type="button" onclick="addQuestion()">Add Question</button>

    <button type="submit" name="addform">Create Questions</button>
</form>

<script>
    // JavaScript function to dynamically add more question fields
    function addQuestion() {
        var additionalQuestions = document.getElementById('additional_questions');
        var newQuestion = document.createElement('div');

        newQuestion.innerHTML = '<label>Enter Group:</label>' +
            '<input type="text" name="group[]" required>' +
            '<label>Enter Text:</label>' +
            '<input type="text" name="display_text[]" required>'+
            '<label>Enter Points:</label>' +
            '<input type="number" name="max_points[]" required>';

        additionalQuestions.appendChild(newQuestion);
    }
</script>

<?php
include 'footer.php';
?>
