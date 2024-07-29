<?php
session_start();
if ($_SESSION['fuser'] == "" && $_SESSION['fpass'] == "") {
  header("Location: fac_login.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="faculty.css">
  <link rel="icon" href="ico/logogms.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
 <!--  DataTables library  -->
 <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
   <!-- Bootstrap Icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">

<style>
  .text-button {
      background: none;
      border: none;
      padding: 0;
      margin: 0;
      font-size: inherit;
      color: none; 
      cursor: pointer;
      text-decoration: none;
  }
      .text-button:hover {
      color: darkblue; 
  }
</style>
</head>
<body>
  <div class="dashfac">
    <div class="sidefac" id="prof">
    <h4><div class="text-dark"><img width="40%" height="40%" src="ico/logogms.png" alt="control-panel--v1"/>Faculty</div></h4><hr>
      <div class="nav flex-column">
        <h5><a href="fac_dashboard.php" class="navfac px-4 py-1 d-block"><img width="50" height="50" src="https://img.icons8.com/ios-glyphs/90/control-panel--v1.png" alt="control-panel--v1"/> Dashboard</h5></a>
        <h5><a href="fac_profile.php" class="navfac px-4 py-1 d-block"><img width="50" height="50" src="https://img.icons8.com/ios/100/student-female.png" alt="student-female"/> Profile</h5></a>
        <h5><a href="fac_sec.php" class="navfac  px-4 py-1 d-block"><img width="50" height="50" src="https://img.icons8.com/ios-glyphs/90/teacher.png" alt="teacher"/> Student Section</h5></a>
        <br><br><br><br><br><br><br><br><hr> 
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h5 class="list-unstyled px-4 py-1 d-block">
        <img id="logout" width="26" height="26" src="https://img.icons8.com/metro/26/exit.png" alt="exit"/> 
        <button class="text-button" type="submit" name="logout">Logout</button> 
        </h5>
          </form>
              <?php
              if (isset($_POST['logout'])) {
                session_destroy();
                echo "
                    <script>
                    alert('Log out successful!');
                    window.location.href='index.html';
                    </script>";
              }
              ?>
          </h5>
      </div>
  </div>
    <div class="facon">
        <div class="panel text-dark">
                <div class="user-welcome">
                    <div class="row">
                        <div class="col-10">
                            <h4><?php echo "Welcome " ?> <i><?php echo $_SESSION['fuser']; ?> </i></h4>
                            <h6><?php echo "Student ID: " ?> <i><?php echo $_SESSION['faculty_id']; ?> </i></h6>
                        </div>
                        <div class="date col-2">
                            <span id="formattedDate"></span>
                        </div>
                    </div>
                </div> 
            </div>
                  <script>
                      var currentDate = new Date();
                      var formattedDate = currentDate.toLocaleDateString('en-US', {
                      month: 'long',
                      day: 'numeric',
                      year: 'numeric'
                      });
                      document.getElementById("formattedDate").innerHTML = formattedDate;
                  </script>
        <br>        
</body>
</html>