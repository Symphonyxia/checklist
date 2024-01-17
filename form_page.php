<?php
include 'header.php';
?>

<h1>Create Form</h1>

<form id="createForm" action="save_form.php" method="post">


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

    <div id="groupsContainer">
        <!-- Group input fields will be added here dynamically -->
    </div>

    <button type="button" id="addGroup">Add Group</button><br><br>

    <div id="questionsContainer">
        <!-- Question input fields will be added here dynamically -->
    </div>

    <button type="button" id="addQuestion">Add Question</button><br><br>

    <button type="submit">Save Form</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var groupsContainer = document.getElementById('groupsContainer');
        var questionsContainer = document.getElementById('questionsContainer');
        var groupCount = 1;
        var questionCount = 1;

        function addGroup() {
            var groupHtml = '<div class="form-group">' +
                '<h3>Group ' + groupCount + '</h3>' +
                '<label for="group">Group Name:</label>' +
                '<input type="text" name="group[' + groupCount + '][group]" required><br><br>' +
                '</div>';

            groupsContainer.insertAdjacentHTML('beforeend', groupHtml);
            groupCount++;

            // Update question group dropdown options
            updateQuestionGroupOptions();
        }

        function updateQuestionGroupOptions() {
            var groupSelect = document.querySelectorAll('select[name^="question["]');

            groupSelect.forEach(function(select) {
                // Remove existing options
                while (select.options.length > 0) {
                    select.options.remove(0);
                }

                // Add options dynamically based on existing groups
                var groupInputOptions = document.querySelectorAll('input[name^="group["]');
                groupInputOptions.forEach(function(groupInput) {
                    var groupName = groupInput.value;
                    var option = document.createElement('option');
                    option.value = groupName;
                    option.text = groupName;
                    select.add(option);
                });
            });
        }

        function addQuestion() {
            var questionHtml = '<div class="form-group">' +
                '<h3>Question ' + questionCount + '</h3>' +
                '<label for="group">Group:</label>' +
                '<select name="question[' + questionCount + '][group]"></select><br><br>' +
                '<label for="displayText">Display Text:</label>' +
                '<input type="text" name="question[' + questionCount + '][display_text]" required><br><br>' +
                '<label for="maxPoints">Max Points:</label>' +
                '<input type="number" name="question[' + questionCount + '][max_points]" required><br><br>' +
                '</div>';

            questionsContainer.insertAdjacentHTML('beforeend', questionHtml);
            questionCount++;

            // Update question group dropdown options
            updateQuestionGroupOptions();
        }

        var addGroupButton = document.getElementById('addGroup');
        addGroupButton.addEventListener('click', addGroup);

        var addQuestionButton = document.getElementById('addQuestion');
        addQuestionButton.addEventListener('click', addQuestion);
    });
</script>

<?php
include 'footer.php';
?>