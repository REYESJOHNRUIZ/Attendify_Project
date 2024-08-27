<?php
require '../db_connect.php';

// Fetch Student Data
$student_query = "SELECT id, lastname, firstname, email FROM student";
$student_result = $conn->query($student_query);

// Fetch Professor Data
$professor_query = "SELECT id, lastname, firstname, status, email FROM professor";
$professor_result = $conn->query($professor_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrator Dashboard</title>
  <link rel="stylesheet" href="../styles/administration_dashboard_styles.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="dashboard-container">
    <aside class="sidebar">
      <div class="logo">
        <h2>ATTENDIFY</h2>
        <img src="../assets/images/1.png" alt="ATTENDIFY Logo" class="logo-image" />
      </div>
      <ul class="menu">
        <li class="menu-item" onclick="showSection('statistic')">
          <img src="../assets/images/2.png" alt="Statistic Icon" class="menu-icon" />
          <span>Statistic</span>
        </li>
        <li class="menu-item" onclick="showSection('student-info')">
          <img src="../assets/images/4.png" alt="Student List Icon" class="menu-icon" />
          <span>Student List</span>
        </li>
        <li class="menu-item" onclick="showSection('professor-list')">
          <img src="../assets/images/3.png" alt="Professor List Icon" class="menu-icon" />
          <span>Professor List</span>
        </li>
      </ul>

      <div class="create-professor">
        <a href="../works/create_account.html">
          <button id="create-prof">Create Professor Account</button>
        </a>
      </div>

      <div class="logout">
        <button id="logoutBtn">LOG OUT</button>
      </div>
    </aside>
    <main class="main-content">
      <header>
        <h1>Administrator Dashboard</h1>
      </header>

      <!-- Statistic Section -->
      <section id="statistic" class="content-section">
        <div class="section-title">Statistic</div>
        <div class="charts-container">
          <div class="chart-container">
            <canvas id="barChart"></canvas>
          </div>
          <div class="chart-container">
            <canvas id="lineChart"></canvas>
          </div>
        </div>
      </section>

      <!-- Student Info Section -->
      <section id="student-info" class="content-section active">
        <h2>Student List</h2>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>LastName</th>
              <th>Firstname</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($student_result->num_rows > 0) {
              while ($row = $student_result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['email']}</td>
                      </tr>";
              }
            } else {
              echo "<tr><td colspan='4'>No students found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </section>

      <!-- Professor List Section -->
      <section id="professor-list" class="content-section">
        <h2>Professor List</h2>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>LastName</th>
              <th>Firstname</th>
              <th>Status</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($professor_result->num_rows > 0) {
              while ($row = $professor_result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['email']}</td>
                      </tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No professors found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
    </main>
  </div>

  <script src="../js/admin.js" defer></script>
</body>

</html>