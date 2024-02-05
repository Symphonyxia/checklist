function addQuestion() {
  var additionalQuestions = document.getElementById("additional_questions");
  var newQuestion = document.createElement("div");

  newQuestion.innerHTML =
    '<div class="row mb-3">' +
    '<div class="col-md-5">' +
    ' <label for="group"> <strong> Enter Group: </strong> </label>' +
    ' <input type="text" id="group" class="form-control" name="group[]">' +
    "</div>" +
    ' <div class="col-md-5">' +
    ' <label for="display_text"><strong> Enter Text: </strong></label>' +
    '<input type="text" id="display_text" class="form-control" name="display_text[]">' +
    "</div>" +
    '<div class="col-md-2">' +
    '<label for="max_points"><strong>Enter Points: </strong></label>' +
    ' <input type="number" id="max_points" class="form-control" name="max_points[]">' +
    " </div>" +
    " </div>";

  additionalQuestions.appendChild(newQuestion);
}
