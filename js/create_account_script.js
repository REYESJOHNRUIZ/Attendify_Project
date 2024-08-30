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

function validateForm(event) {
  event.preventDefault(); // Prevent form from submitting immediately
  const form = document.querySelector("form");
  const inputs = form.querySelectorAll("input, select");
  let isValid = true;

  // Clear previous validation messages
  form.querySelectorAll(".validation-message").forEach((msg) => msg.remove());

  // Validate all inputs to ensure they are not empty
  inputs.forEach((input) => {
    if (input.value.trim() === "") {
      isValid = false;
      const message = document.createElement("div");
      message.className = "validation-message";
      message.textContent = `${input.previousElementSibling.textContent} is required.`;
      input.parentNode.appendChild(message);
    }
  });

  // Check if passwords match
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirm_password");
  if (password.value !== confirmPassword.value) {
    isValid = false;
    const message = document.createElement("div");
    message.className = "validation-message";
    message.textContent = "Passwords do not match.";
    confirmPassword.parentNode.appendChild(message);
  }

  // If everything is valid, submit the form
  if (isValid) {
    form.submit(); // Submit the form if all validations pass
  }
}

// Attach the validation function to the sign-up button
document
  .querySelector(".sign-in-button")
  .addEventListener("click", validateForm);
