function showSection(sectionId) {
  // Remove 'active' class from all sections
  document.querySelectorAll(".content-section").forEach(function (section) {
    section.classList.remove("active");
  });

  // Add 'active' class to the clicked section
  document.getElementById(sectionId).classList.add("active");
}

// Initialize charts when the page is fully loaded
window.onload = async function () {
  var student = await fetch("../php/fetch_data.php?category=Students")
  var student_data = await student.json();
  // Bar Chart
  var ctxBar = document.getElementById("barChart").getContext("2d");
  var barChart = new Chart(ctxBar, {
    type: "doughnut",
    data: {
      labels: ["DIT2-1", "BSIT2-1"],
      datasets: [
        {
          label: "Total Student",
          data: [student_data[2][1], student_data[1][1]],
          //backgroundColor: "rgba(54, 162, 235, 0.2)",
        //borderColor: "rgba(54, 162, 235, 1)",
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  var Professor = await fetch("../php/fetch_data.php?category=Professors")
  var Professor_data = await Professor.json();
  // Line Chart
  var ctxLine = document.getElementById("lineChart").getContext("2d");
  var lineChart = new Chart(ctxLine, {
    type: "doughnut",
    data: {
      labels: [],
      datasets: [
        {
          label: "Total Professor",
          data: [Professor_data[1][1]],
          fill: false,
        //  borderColor: "rgba(255, 99, 132, 1)",
         // tension: 0.1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  // Logout Button
  var logoutBtn = document.getElementById("logoutBtn");
  if (logoutBtn) {
    logoutBtn.addEventListener("click", function () {
      window.location.href = "../index.php";
    });
  }
};

