<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendify</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Public+Sans:wght@300;400;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../styles/professor_dashboard_styles.css">
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <div class="profile">
        <h2>ATTENDIFY</h2>
        <div class="prof-icon">
          <img src="../assets/images/professor-pic.png" alt="Professor Icon">
        </div>
        <div class="info">
          <h2>Prof. Christine Jane Penez</h2>
          <p>Username: P0001</p>
        </div>
      </div>
      <div class="bottom-items">
        <button class="back" onclick="goBack()">
          <i class="fas fa-arrow-left"></i> BACK
        </button>
        <button class="logout">
          <i class="fas fa-sign-out-alt"></i> LOG OUT
        </button>
      </div>
    </div>
    <div class="main-content">
      <div id="courses-page" class="page active">
        <header>
          <h1>COURSES</h1>
        </header>

        <div class="courses">
          <div class="course" onclick="showClasses()">IT ELECTIVE 2</div>
          <div class="course" onclick="showClasses()">IT ELECTIVE 2</div>
          <div class="course" onclick="showClasses()">IT ELECTIVE 2</div>
          <div class="course" onclick="showClasses()">IT ELECTIVE 2</div>
          <div class="course" onclick="showClasses()">IT ELECTIVE 2</div>
          <div class="course" onclick="showClasses()">IT ELECTIVE 2</div>
        </div>
      </div>

      <div id="classes-page" class="page">
        <header>
          <h1>CLASSES</h1>
        </header>
        <button class="new-class">New Class</button>
        <div class="classes">
          <div class="class" onclick="showAttendance()">BSIT 3-1</div>
          <div class="class" onclick="showAttendance()">DIT 3-1</div>
          <div class="class" onclick="showAttendance()">BSIT 2-1</div>
          <div class="class" onclick="showAttendance()">BSIT 1-1</div>
        </div>
      </div>

      <div id="attendance-page" class="page">
        <header>
          <h1>BSIT 3-1</h1>
        </header>
        <table>
          <tr>
            <th>Student Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Present</th>
            <th>Absent</th>
            <th>Excused</th>
          </tr>
          <tr>
            <td>2021-00116-TG-0</td>
            <td>ARTUZ</td>
            <td>CHRISTIAN</td>
            <td><span class="present" onclick="markAttendance(this, 'present')"></span></td>
            <td><span class="absent" onclick="markAttendance(this, 'absent')"></span></td>
            <td><span class="excused" onclick="markAttendance(this, 'excused')"></span></td>
          </tr>
          <!-- Add more student rows as needed -->
        </table>
        <button class="upload">Upload Students</button>
        <button class="save">Save</button>
      </div>
    </div>
  </div>
  <script src="../js/professor_dashboard.js"></script>
</body>

</html>