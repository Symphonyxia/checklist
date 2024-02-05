function addQuestion() {
    var additionalQuestions = document.getElementById('additional_questions');
    var newQuestion = document.createElement('div');
  
    newQuestion.innerHTML = '<label>Enter Group:</label>' +
        '<input type="text" name="group[]" >' +
        '<label>Enter Text:</label>' +
        '<input type="text" name="display_text[]">'+
        '<label>Enter Points:</label>' +
        '<input type="number" name="max_points[]">';
  
    additionalQuestions.appendChild(newQuestion);
  }
