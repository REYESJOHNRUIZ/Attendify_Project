<?php
session_start();
if (isset($_SESSION['student_number'])) {
  header("Location: works/student_dashboard.php");
  exit();
}
if (isset($_SESSION['prof_id'])) {
  header("Location: works/professor_dashboard.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Attendify</title>
  <link rel="stylesheet" href="./styles/index_style.css" />
</head>

<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="./assets/images/logo_image.png" alt="Attendify Logo" />
        Attendify
      </div>
      <nav>
        <button type="button" id="log_in">
          <a class="link" href="./works/log_in_form.php">LOG IN</a>
        </button>
        <button type="button" id="sign_up">
          <a class="link" href="./works/sign_up_form.html">SIGN UP</a>
        </button>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <div class="hero-content">
        <h1>Efficient Attendance Management Made Easy</h1>
        <p>
          Streamline your attendance processes with our intuitive platform.
        </p>
      </div>
      <div class="hero-image">
        <img src="./assets/images/attendance_list.png" alt="attendance icon" />
      </div>
    </div>
  </section>

  <section class="key-features">
    <div class="container">
      <div class="feature">
        <img src="./assets/images/real_time_tracking_icon.png" alt="Real-Time Tracking" />
        <h3>Real-Time Attendance Tracking</h3>
        <p>
          Monitor attendance in real time with instant updates. Students can
          check their attendance status, professors can view and manage
          attendance records, and admins can see generate comprehensive
          reports with ease.
        </p>
      </div>
      <div class="feature">
        <img src="./assets/images/automated_reminders_icon.png" alt="Automated Reminders" />
        <h3>Automated Attendance Reminders</h3>
        <p>
          Receive automated reminders for special events and missing sessions.
          Students get reminders for special events, professors receive
          notifications for attendance discrepancies, and admins can customize
          reminder schedules.
        </p>
      </div>
      <div class="feature">
        <img src="./assets/images/detailed_reports_icon.png" alt="Detailed Reports" />
        <h3>Detailed Attendance Reports</h3>
        <p>
          Generate detailed reports on attendance patterns. Students can
          access their historical attendance data, professors can review class
          attendance, and admins can see comprehensive reports for analysis
          and compliance.
        </p>
      </div>
    </div>
  </section>


  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <section class="our-webcoderskull padding-lg">
    <div class="container">
      <ul class="row">
        <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="assets\images\reyes.jpg" class="img-responsive" alt=""></figure>
            <h3><a href="#">John Ruiz Reyes</a></h3>
            <p>Project Manager Developer</p>

          </div>
        </li>
        <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="assets\images\Calipa.jpg" class="img-jalipa" alt=""></figure>
            <h3><a href="#">Reanne Rylle C. Jalipa </a></h3>
            <p>Back End Developer</p>

          </div>
        </li>
        <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="assets\images\Ferolino.png" class="img-responsive" alt=""></figure>
            <h3><a href="#">Jasmin V. Ferolino </a></h3>
            <p>Front End Developer</p>

          </div>
        </li>
        <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="assets\images\morcoso.jpg" class="img-responsive" alt=""></figure>
            <h3><a href="#">Daisy Morcoso</a></h3>
            <p>Front End/Tester Developer</p>


        <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="assets\images\Cruz.jpg" class="img-responsive" alt=""></figure>
            <h3><a href="#">Simounne G. Cruz </a></h3>
            <p>Front/Back End Developer</p>


        <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="assets\images\santos.jpg" class="img-responsive" alt=""></figure>
            <h3><a href="#">Akisha Gelsey Santos </a></h3>
            <p>Front End Developer</p>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; 2024 Attendify. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>