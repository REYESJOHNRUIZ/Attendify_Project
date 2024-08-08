google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(() => {
  
});

function showChart(chartType) {
  document.getElementById("chartTitle").innerText = chartType;
  fetch(
    `../php/fetch_data.php?category=${encodeURIComponent(chartType)}&type=chart`
  )
    .then((response) => response.json())
    .then((data) => {
      drawChart(chartType, data);
    })
    .catch((error) => console.error("Error fetching chart data:", error));

  document.getElementById("chartModal").style.display = "block";
}

function drawChart(chartType, data) {
  let chart;
  const dataTable = google.visualization.arrayToDataTable(data);
  const options = { title: chartType, is3D: true };

  switch (chartType) {
    case "Students":
    case "Programs":
    case "Professors":
      chart = new google.visualization.PieChart(
        document.getElementById("chart")
      );
      break;
    case "Total Students":
      chart = new google.visualization.BarChart(
        document.getElementById("chart")
      );
      break;
    default:
      console.error("Unknown chart type:", chartType);
      return;
  }

  chart.draw(dataTable, options);
}

function hideChart() {
  document.getElementById("chartModal").style.display = "none";
}

function changeList(event) {
  event.preventDefault();
  const select = document.getElementById("listSelect");
  const selectedValue = select.value;
  fetchListData(selectedValue);
}

function fetchListData(listType) {
  fetch(`../php/fetch_data.php?type=list&listType=${listType}`)
    .then((response) => response.json())
    .then((data) => {
      updateTable(data, listType);
    })
    .catch((error) => console.error("Error fetching list data:", error));
}

function updateTable(data, listType) {
  const tableBody = document.getElementById("attendance-data");
  const listTitle = document.getElementById("listTitle");

  listTitle.innerText =
    listType === "student" ? "Student List" : "Professor List";

  tableBody.innerHTML = "";
  data.forEach((row) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${row.index}</td>
      <td>${row.lastname}</td>
      <td>${row.firstname}</td>
      <td>${row.email}</td>
      <td>${row.phone}</td>
      <td>${row.gender}</td>
      <td>${row.age}</td>
    `;
    tableBody.appendChild(tr);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const closeButton = document.querySelector(".modal .close");
  if (closeButton) {
    closeButton.addEventListener("click", hideChart);
  }

  const topMenuItems = document.querySelectorAll(".top-menu div");
  topMenuItems.forEach((item) => {
    item.addEventListener("click", () => {
      const chartType = item.getAttribute("data-chart-type");
      showChart(chartType);
    });
  });

});
