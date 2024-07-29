<?php
    session_start();
    if ($_SESSION['staffid'] == "" && $_SESSION['staffpass'] == "" ) {
        header("Location: adm_login.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/logogms.png">
  <link rel="stylesheet" href="adm.css">

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
      color: black;
      cursor: pointer;
      text-decoration: none; 
  }
      .text-button:hover {
          color: blue; 
  }
</style>

</head>
<body>
  <div class="dashcont">
    <div class="sidebar" id="prof">
    <h4><div class="text-white"><img width="40%" height="40%" src="img/logogms.png" alt="control-panel--v1"/>ADMIN</div></h4><hr>
      <div class="nav flex-column">
        <h5><a href="adm_dashboard.php" class="navadm px-4 py-1 d-block"><img width="50" height="50" src="https://img.icons8.com/ios-glyphs/90/control-panel--v1.png" alt="control-panel--v1"/> Dashboard</h5></a>
        <h5><a href="adm_stud.php" class="navadm px-4 py-1 d-block"><img width="50" height="50" src="https://img.icons8.com/ios/100/student-female.png" alt="student-female"/> Student</h5></a>
        <h5><a href="adm_fac.php" class="navadm  px-4 py-1 d-block"><img width="50" height="50" src="https://img.icons8.com/ios-glyphs/90/teacher.png" alt="teacher"/> Faculty</h5></a>
        <h5><a href="adm_dep.php" class="navadm  px-4 py-1 d-block"><img width="50" height="50" src="https://img.icons8.com/external-phatplus-lineal-phatplus/64/external-calendar-calendar-date-phatplus-lineal-phatplus-4.png" alt="external-calendar-calendar-date-phatplus-lineal-phatplus-4"/> Department</h5></a>
        <h5><a href="adm_crs.php" class="navadm px-4 py-1 d-block"><img width="50" height="50" src="https://img.icons8.com/ios/100/knowledge-sharing.png" alt="knowledge-sharing"/> Course</h5></a>
        <h5><a href="adm_class.php" class="navadm px-4 py-1 d-block"> <img width="50" height="50" src="https://img.icons8.com/ios/100/class.png" alt="class"/> Class</h5></a>
        <br><hr>   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h5 class="list-unstyled px-4 py-1 d-block">
      <img id="logout" width="26" height="26" src="https://img.icons8.com/metro/26/exit.png" alt="exit"/> 
      <button class="text-button" type="submit" name="logout">Logout</button> 
      <h5></a>
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
    </div>
  </div>
</body>
</html>