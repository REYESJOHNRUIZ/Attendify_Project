document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".form");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const firstname = form.firstname.value.trim();
    const middlename = form.middlename.value.trim();
    const lastname = form.lastname.value.trim();
    const birthday = form.birthday.value.trim();
    const age = form.age.value.trim();
    const gender = form.gender.value.trim();
    const address = form.address.value.trim();
    const email = form.email.value.trim();
    const phone = form.phone.value.trim();
    const password = form.password.value.trim();
    const confirm_password = form.confirm_password.value.trim();

    if (firstname === "") {
      showError("Please enter your First Name.");
      return;
    }

    if (middlename === "") {
      showError("Please enter your Middle Name.");
      return;
    }

    if (lastname === "") {
      showError("Please enter your Last Name.");
      return;
    }

    if (birthday === "") {
      showError("Please enter your Birthday.");
      return;
    }

    if (age === "") {
      showError("Please enter your Age.");
      return;
    }

    if (gender === "") {
      showError("Please select your Gender.");
      return;
    }

    if (address === "") {
      showError("Please enter your Address.");
      return;
    }

    if (email === "") {
      showError("Please enter your Email.");
      return;
    } else if (!validateEmail(email)) {
      showError("Please enter a valid Email address.");
      return;
    }

    if (phone === "") {
      showError("Please enter your Phone Number.");
      return;
    } else if (!validatePhone(phone)) {
      showError("Please enter a valid Phone Number (11 digits only).");
      return;
    }

    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (password === "") {
      showError("Please enter a Password.");
      return;
    } else if (!passwordPattern.test(password)) {
      showError(
        "Password must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long."
      );
      return;
    }

    if (confirm_password === "") {
      showError("Please confirm your Password.");
      return;
    } else if (password !== confirm_password) {
      showError("Passwords do not match. Please try again.");
      return;
    }

    const formData = new FormData(form);

    fetch("../php/sign_up_form.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        if (data.includes("Sign up successfully")) {
          showSuccess("Sign up successfully! Redirecting to log in page...");
          setTimeout(function () {
            window.location = "../works/log_in_form.html";
          }, 3000);
        } else {
          showError(data);
        }
      })
      .catch(error => {
        showError("An error occurred. Please try again.");
      });
  });

  function showError(message) {
    const errorCard = createCard(message, "error");
    form.appendChild(errorCard);

    const continueButton = createContinueButton();
    errorCard.appendChild(document.createElement("br"));
    errorCard.appendChild(continueButton);
  }

  function showSuccess(message) {
    const successCard = createCard(message, "success");
    form.appendChild(successCard);

    setTimeout(function () {
      window.location.href = "./works/log_in_form.html";
    });
  }

  function createCard(message, type) {
    const card = document.createElement("div");
    card.classList.add("card", type);
    card.innerHTML = `<p>${message}</p>`;

    return card;
  }

  function createContinueButton() {
    const continueButton = document.createElement("button");
    continueButton.textContent = "Continue";
    continueButton.classList.add("continue-button");

    continueButton.addEventListener("click", function () {
      const card = this.parentElement;
      card.remove();
    });

    return continueButton;
  }

  function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
  }

  function validatePhone(phone) {
    const re = /^\d{11}$/;
    return re.test(phone);
  }
});