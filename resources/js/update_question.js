function addQuestion() {
  var additionalQuestions = document.getElementById("additional_questions");
  var newQuestion = document.createElement("div");

  newQuestion.innerHTML =
    '<div class="row g-3">' +
    '<div class="col-md-4">' +
    "<label>Enter Group:</label>" +
    '<input type="text" class="form-control" name="group[]" required>' +
    "</div>" +
    '<div class="col-md-4">' +
    "<label>Enter Text:</label>" +
    '<input type="text" class="form-control" name="display_text[]" required>' +
    "</div>" +
    '<div class="col-md-4">' +
    "<label>Enter Points:</label>" +
    '<input type="number" class="form-control" name="max_points[]" required>' +
    "</div>" +
    "</div>";

  additionalQuestions.appendChild(newQuestion);
}
