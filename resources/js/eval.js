// Submit form when the button is clicked
var submitButton = document.getElementById("submitResultsButton");
submitButton.addEventListener("click", function () {
  var form = document.getElementById("resultsForm");
  var formData = new FormData(form);

  // Update checkboxes before submitting
  updateCheckboxes(formData);

  fetch(form.action, {
    method: form.method,
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      // Handle success or error messages if needed

      // If submission is successful, reset the form to clear checkboxes
      if (data.success) {
        form.reset();

        // Additionally, you can update checkboxes to their default state if needed
        updateCheckboxes(formData);
      }
    });
});

// Function to update checkboxes
function updateCheckboxes(formData) {
  // Iterate through all checkboxes in the form
  form.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
    // If the checkbox is not checked, set its value to 0
    if (!checkbox.checked) {
      formData.set(checkbox.name, 0); // Use integer 0 instead of string '0'
    }
  });
}
