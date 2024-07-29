<?php
include('navfac.php');
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Faculty - Student Section</title>
  <link rel="stylesheet" href="faculty.css">
  <link rel="icon" href="ico/logo.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="content">
      <div class="my-2">
        <div class="card">
          <div class="card-header">
            <table class="table">
              <tr>
                <?php
                $id = $_SESSION['faculty_id'];
                $sql = "SELECT sem_year FROM section WHERE faculty_id=$id";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);

                if ($row > 0) {
                  while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <td class="col-2">
                      <h6>Year</h6>
                    </td>
                    <td class="col-1">:</td>
                    <td class="col-9"><?php echo $data['sem_year']; ?> </td>
                <?php
                  }
                }
                ?>
              </tr>
              <tr>
                <?php
                $id = $_SESSION['faculty_id'];
                $sql = "SELECT sem_term FROM section WHERE faculty_id=$id";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);

                if ($row > 0) {
                  while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <td class="col-2">
                      <h6>Semester</h6>
                    </td>
                    <td class="col-1">:</td>
                    <td><?php echo !empty($data['sem_term']) ? $data['sem_term'] : ''; ?></td>
                <?php
                  }
                }
                ?>
              </tr>
            </table>
          </div>
          <div class="card-body">
            <div class="accordion" id="accordion">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <h6>Input Grades</h6>
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                  <div class="accordion-body">
                    <table class="table table-responsive table-light table-hover table-striped table-bordered">
                      <thead class="table-info">
                        <tr>
                          <th>Class Name</th>
                          <th>Students</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <center>
                            <?php
                                    $sql = "SELECT * FROM section";
                                    $query = mysqli_query($con, $sql);
                                    $row = mysqli_num_rows($query);

                                    if ($row > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                          <?php echo $data['sec_name']; ?>
                                                                <?php
                                        }
                                    }                           
                                    ?>
                             </center>
                          </td>
                          <td>
                            <center>
                          <a class="btn btn-sm btn-outline-primary" href="fac_studtable.php">
                              View Students
                            </a>
                          </center>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</body>

</html>