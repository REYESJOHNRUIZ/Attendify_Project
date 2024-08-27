document.addEventListener("DOMContentLoaded", () => {
  const togglePasswordVisibility = (id) => {
    const passwordField = document.getElementById(id);
    const eyeIcon = document.querySelector(`#eye-icon-${id}`);
    const isPassword = passwordField.type === "password";

    passwordField.type = isPassword ? "text" : "password";

    if (isPassword) {
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
    } else {
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    }
  };

  // Toggle password visibility
  document.querySelectorAll("[data-toggle]").forEach((element) => {
    element.addEventListener("click", (event) => {
      const id = event.currentTarget.getAttribute("data-toggle");
      togglePasswordVisibility(id);
    });
  });

  const validateForm = (event) => {
    event.preventDefault();
    const form = document.querySelector("form");
    const inputs = form.querySelectorAll("input");
    let isValid = true;

    // Clear previous validation messages
    form.querySelectorAll(".validation-message").forEach((msg) => msg.remove());

    // Validate each input field
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
    const confirmPassword = document.getElementById("confirm-password");
    if (password.value !== confirmPassword.value) {
      isValid = false;
      const message = document.createElement("div");
      message.className = "validation-message";
      message.textContent = "Passwords do not match.";
      confirmPassword.parentNode.appendChild(message);
    }

    // If valid, submit the form
    if (isValid) {
      form.submit();
    }
  };

  // Validate form on submit
  document
    .querySelector(".sign-in-button")
    .addEventListener("click", validateForm);
});
