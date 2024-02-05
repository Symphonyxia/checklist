document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-question');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); 

            if (confirm('Are you sure you want to delete this question?')) {
                const row = this.closest('tr');

                const questionId = this.getAttribute('data-question-id');
                deleteQuestion(questionId, row);
            }
        });
    });

    function deleteQuestion(questionId, row) {
        const formData = new FormData();
        formData.append('deleteQuestion', questionId);

        fetch('resources/dr/search.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    row.parentNode.removeChild(row);
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
});
