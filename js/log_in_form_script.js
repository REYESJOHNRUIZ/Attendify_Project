const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");
const loginForm = document.querySelector("#loginForm");

togglePassword.addEventListener("click", function () {
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});

loginForm.addEventListener("submit", function (event) {
  event.preventDefault();

  window.location.href = "sign_up_form.html";
});
