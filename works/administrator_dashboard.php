<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administration Dashboard</title>
  <link rel="stylesheet" href="../styles/administration_dashboard_styles.css" />
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="../js/admin.js" defer></script>
</head>

<body>
  <div>
    <div class="header">ADMINISTRATOR DASHBOARD</div>
    <div class="top-right-buttons">
      <a href="../works/create_account.html">
        <button id="create-prof">Create Professor Account</button>
      </a>
      <button id="logout"><a href="../index.html">Logout</a></button>
    </div>
    <div class="container">
      <div class="top-menu">
        <div data-chart-type="Students">
          <img src="../assets/images/student.png" alt="Students" />
          <p>Students</p>
        </div>
        <div data-chart-type="Total Students">
          <img src="../assets/images/classes.png" alt="Total Students" />
          <p>Total Students</p>
        </div>
        <div data-chart-type="Professors">
          <img src="../assets/images/prof.png" alt="Professors" />
          <p>Professors</p>
        </div>
      </div>

      <div class="attendance-section">
        <h2 id="listTitle">Professor List</h2>
        <div class="controls">
          <select id="listSelect" onchange="changeList(event)">
            <option value="professor">Professor List</option>
            <option value="student">Student List</option>
          </select>
        </div>
        <table class="attendance-table">
          <thead id="tableHeader">
            <tr>
              <th>#</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Email</th>
              <th>Phone Num</th>
              <th>Gender</th>
              <th>Age</th>
            </tr>
          </thead>
          <tbody id="attendance-data">
            <!-- Data will be inserted here -->
          </tbody>
        </table>
      </div>
    </div>

    <div id="chartModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="chartTitle"></h2>
        <div id="chart"></div>
      </div>
    </div>
  </div>
</body>

</html>