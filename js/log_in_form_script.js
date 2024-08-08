document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#loginForm");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const specialKey = document.getElementById("id").value.trim().toUpperCase();
    const password = document.getElementById("password").value.trim();

    if (specialKey === "" || password === "") {
      showError("Please fill in all fields.");
      return;
    }

    let actionUrl;
    if (specialKey.startsWith("S")) {
      actionUrl = "../php/login.php";
    } else if (specialKey.startsWith("P")) {
      actionUrl = "../php/login.php";
    } else if (specialKey.startsWith("A")) {
      actionUrl = "../php/login.php";
    } else {
      showError("Invalid Special Key.");
      return;
    }

    form.action = actionUrl;
    form.submit();
  });

  function showError(message) {
    const errorCard = createCard(message, "error");
    form.appendChild(errorCard);

    const continueButton = createContinueButton();
    errorCard.appendChild(document.createElement("br"));
    errorCard.appendChild(continueButton);
  }

  function createCard(message, type) {
    const card = document.createElement("div");
    card.classList.add("card", type);
    card.textContent = message;

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
});
