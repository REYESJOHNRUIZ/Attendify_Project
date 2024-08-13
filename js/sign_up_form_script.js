// Function to toggle password visibility
function togglePasswordVisibility(id) {
  const passwordField = document.getElementById(id);
  const eyeIcon = document.getElementById(`eye-icon-${id}`);
  const isPassword = passwordField.type === "password";

  passwordField.type = isPassword ? "text" : "password";

  if (isPassword) {
    eyeIcon.classList.remove("fa-eye");
    eyeIcon.classList.add("fa-eye-slash");
  } else {
    eyeIcon.classList.remove("fa-eye-slash");
    eyeIcon.classList.add("fa-eye");
  }
}

// Function to validate the form
function validateForm(event) {
  event.preventDefault(); // Prevent the form from submitting
  const form = document.querySelector("form");
  const inputs = form.querySelectorAll("input, select");
  let isValid = true;

  // Clear previous validation messages
  form.querySelectorAll(".validation-message").forEach((msg) => msg.remove());

  // Check each input field
  inputs.forEach((input) => {
    if (input.value.trim() === "") {
      isValid = false;
      const message = document.createElement("div");
      message.className = "validation-message";
      message.textContent = `${input.previousElementSibling.textContent} is required.`;
      input.parentNode.appendChild(message);
    }
  });

  // Additional validation for password confirmation
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirm-password");
  if (password.value !== confirmPassword.value) {
    isValid = false;
    const message = document.createElement("div");
    message.className = "validation-message";
    message.textContent = "Passwords do not match.";
    confirmPassword.parentNode.appendChild(message);
  }

  // If the form is valid, you can submit it or handle it as per your requirements
  if (isValid) {
    // Submit form or do something else
    alert("Form is valid! Submitting...");
    // form.submit(); // Uncomment this line to submit the form
  }
}

// Add event listener to the form's submit button
document
  .querySelector(".sign-in-button")
  .addEventListener("click", validateForm);
