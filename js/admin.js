window.onload = function () {
  // Fetch and display data for the student chart
  fetchChartData("Students", "barChart");

  // Fetch and display data for the professor chart
  fetchChartData("Professors", "lineChart");
};

function fetchChartData(category, chartId) {
  fetch(`../path_to_your_php_file.php?type=chart&category=${category}`)
    .then((response) => response.json())
    .then((data) => {
      const labels = data.slice(1).map((row) => row[0]);
      const counts = data.slice(1).map((row) => row[1]);

      const ctx = document.getElementById(chartId).getContext("2d");
      const chartType = chartId === "barChart" ? "bar" : "line";

      new Chart(ctx, {
        type: chartType,
        data: {
          labels: labels,
          datasets: [
            {
              label:
                category === "Students"
                  ? "Student Count by Class"
                  : "Total Professors",
              data: counts,
              backgroundColor:
                category === "Students"
                  ? "rgba(54, 162, 235, 0.2)"
                  : "rgba(255, 99, 132, 0.2)",
              borderColor:
                category === "Students"
                  ? "rgba(54, 162, 235, 1)"
                  : "rgba(255, 99, 132, 1)",
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
    });
}
