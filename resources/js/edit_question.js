document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-question');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent form submission

            if (confirm('Are you sure you want to delete this question?')) {
                const row = this.closest('tr');

                // Perform AJAX request to delete the question on the server
                const questionId = this.getAttribute('data-question-id');
                deleteQuestion(questionId, row);
            }
        });
    });

    function deleteQuestion(questionId, row) {
        // Perform AJAX request to delete the question
        const formData = new FormData();
        formData.append('deleteQuestion', questionId);

        fetch('resources/dr/search.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove the row from the table
                    row.parentNode.removeChild(row);
                } else {
                    // Handle the error or display a message
                    console.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
});