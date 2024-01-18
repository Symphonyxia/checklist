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
    <div class="card card-block">
        <div class=" row g-3">
            <div class="col">
                <label for="group">Enter Group:</label>
                <input type="text" class="form-control" name="group[]" id="group" placeholder="Enter Group Name" required>
            </div>
            <div class=" row g-3">
                <div class="col">
                    <label for="display_text">Question:</label>
                    <input type="text" class="form-control" name="display_text[]" id="display_text" placeholder="Enter Question" required>
                </div>
            </div>
            <div class=" row g-3">
                <div class="col">
                    <label for="max_points">Enter Points:</label>
                    <input type="number" class="form-control" name="max_points[]" id="max_points" placeholder="Enter Question" required>
                </div>
            </div>
        </div>
    </div>

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
            '<input type="text" name="display_text[]" required>' +
            '<label>Enter Points:</label>' +
            '<input type="number" name="max_points[]" required>';

        additionalQuestions.appendChild(newQuestion);
    }
</script>

<?php
include 'footer.php';
?>