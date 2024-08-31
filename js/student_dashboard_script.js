document.addEventListener("DOMContentLoaded", function () {
  const ctx = document.getElementById("attendanceChart").getContext("2d");

  // Assuming attendanceDates is an array of date strings
  const data = {
    labels: attendanceDates, // X-axis labels (dates)
    datasets: [
      {
        label: "Attendance",
        data: attendanceDates.map(() => 1), // Y-axis values (e.g., all 1 for attended)
        backgroundColor: "rgba(75, 192, 192, 0.2)",
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1,
      },
    ],
  };

  const config = {
    type: "line", // You can change this to 'bar', 'pie', etc.
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: "Attendance Count",
          },
        },
        x: {
          title: {
            display: true,
            text: "Date",
          },
        },
      },
    },
  };

  const attendanceChart = new Chart(ctx, config);

  // Logout button functionality
  const logoutButton = document.getElementById("logout_button");
  if (logoutButton) {
    logoutButton.addEventListener("click", function () {
      fetch("logout.php")
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            window.location.href = "../index.html"; // Redirect to index.html
          }
        })
        .catch((error) => console.error("Error:", error));
    });
  }
});
