<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grading Management System - Login</title>
  <link rel="stylesheet" href="student.css">
  <link rel="icon" href="img/logogms.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

</head>

<body>
  <div class="stucon">
    <div class="row">
      <div class="col-md-5">
        <div class="stuic">
          <img src="img/logogms.png" class="img-fluid" alt="Grading Management Illustration">
          <h4 id="stu">GRADING MANAGEMENT SYSTEM</h4>
        </div>
      </div>
      <div class="col-md-5">
        <div class="stulog">
          <h2 class="stuloghead">STUDENT LOGIN </h2>
          <hr>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-4">
              <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="mb-4">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary form-control" name="signin">Sign In</button>
            <p><br>Did you <a href="stud_forgotpass.php" class="forgot-password text-danger">forget your password?</a></p>
            <p class="mt-3 text-center">Not registered? <a href="register.php" class="create-account">Create an account</a></p>

            <?php
            include "connect.php";

            if (isset($_POST['signin'])) {
              $studuser = $_POST['username'];
              $studpassword = $_POST['password'];

              $result = mysqli_query($con, "SELECT * FROM student WHERE stud_username = '$studuser'");
              $row = mysqli_fetch_assoc($result);

              if (mysqli_num_rows($result) > 0) {
                if ($studpassword == $row["stud_password"]) {
                  $_SESSION["username"] = $studuser;
                  $_SESSION["stud_id"] = $row['stud_id'];
                  header("Location: stud_dashboard.php");
                } else {
                  echo "<script>alert('Wrong Password');</script>";
                }
              } else {
                echo " <script> alert('User Not Registered');</script>";
              }
            }
            if (isset($_SESSION['username'])) {
              header("Location: stud_dashboard.php");
              exit();
            }
            ?>



          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>