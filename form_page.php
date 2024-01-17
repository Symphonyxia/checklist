<?php 
include 'header.php';
?>
    
<h1>Create Form</h1>

<form id="createForm" action="save_form.php" method="post">

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <?php
    if (isset($_SESSION['selectedYear'])) {
        $selectedYear = $_SESSION['selectedYear'];
        echo "$selectedYear";
        // Clear the session variable to avoid displaying the same data on page refresh
        unset($_SESSION['selectedYear']);
    } else {
        // Handle the case when "selectedYear" is not set
    }
    ?>

    <div id="questionsContainer"></div>

    <button type="button" id="addQuestion">Add Question</button><br><br>

    <button type="submit">Save Form</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var questionsContainer = document.getElementById('questionsContainer');
        var questionCount = 1;

        function addQuestion() {
            var questionHtml = '<div class="form-group">' +
                '<h3>Question ' + questionCount + '</h3>' +
                '<label for="group">Group:</label>' +
                '<input type="text" name="group[' + questionCount + ']" required><br><br>' +
                '<label for="displayText">Display Text:</label>' +
'<input type="text" name="display_text[' + questionCount + '][display_text]" required>'+
                '<label for="maxPoints">Max Points:</label>' +
                '<input type="number" name="max_points[' + questionCount + ']" required><br><br>' +
                '</div>';

            questionsContainer.insertAdjacentHTML('beforeend', questionHtml);
            questionCount++;
        }

        var addQuestionButton = document.getElementById('addQuestion');
        addQuestionButton.addEventListener('click', addQuestion);
    });
</script>

<?php 
include 'footer.php';
?>
