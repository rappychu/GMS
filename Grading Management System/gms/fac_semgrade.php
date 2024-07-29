<?php
    include('connect.php');
    include('navfac.php');
    include('calculation.php');

    $stud_id = isset($_GET['stud_id']) ? $_GET['stud_id'] : null;

    if (isset($_POST['sub'])) {
        $mid = $_POST['mid'];
        $fin = $_POST['fnl'];

        $ave = semgrade($mid, $fin);
        $gradeVal = gradeEquiv($ave); 
        $stat = gstat($gradeVal);

        $resmid = mysqli_query($con, "SELECT stud_id FROM midterm WHERE stud_id = '$stud_id'");

        if ($studata = mysqli_fetch_assoc($resmid)) {
            $updateMidtermSql = "UPDATE semgrade 
                                SET sem_grade = '$ave', grade_equiv = '$gradeVal', grade_stat = '$stat'
                                WHERE stud_id = '$stud_id'";

            if (mysqli_query($con, $updateMidtermSql)) {
                $updateMid = "UPDATE student SET sem_grade = '$gradeVal' WHERE stud_id = '$stud_id'";
                
                if (mysqli_query($con, $updateMid)) {
                    echo "<script>alert('OK!');</script>";
                }
            } else {
                echo "Error updating tables: " . $con->error;
            } 
        } else {
            $resfnl = mysqli_query($con, "SELECT stud_id FROM final_term WHERE stud_id = '$stud_id'");

            if ($studata = mysqli_fetch_assoc($resfnl)) {
                $updatefn = "UPDATE semgrade 
                                    SET sem_grade = '$ave', grade_equiv = '$gradeVal', grade_stat = '$stat'
                                    WHERE stud_id = '$stud_id'";    
    
                if (mysqli_query($con, $updatefn)) {
                    $midupdate = "UPDATE student SET sem_grade = '$gradeVal' WHERE stud_id = '$stud_id'";
                    
                    if (mysqli_query($con, $midupdate)) {
                        echo "<script>alert('OK!');</script>";
                    }
                } else {
                    echo "Error updating tables: " . $con->error;
                } 
            } else {
                $sem = "INSERT INTO semgrade (stud_id, mid_grade, fnl_grade, sem_grade, grade_equiv, grade_stat)
                        VALUES ('$stud_id', '$mid', '$fin', '$ave', '$gradeVal', '$stat')";
    
                if (mysqli_query($con, $sem)){
                    $updatesem = "UPDATE student SET sem_grade = '$gradeVal' WHERE stud_id = '$stud_id'";
                    
                    if (mysqli_query($con, $updatesem)) {
                        echo "<script>alert('OK!');</script>";
                    } 
                } else {
                    echo "Error inserting into tables: " . $con->error;
                }
            }
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Semester Grade</title>
        <link rel="icon" href="img/logogms.png">
            <!-- Bootstrap CSS and JS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-11 border border-secondary mt-2">
                <form action="<?php echo isset($_GET['stud_id']) ? $_SERVER['PHP_SELF'] . '?stud_id=' . $_GET['stud_id'] : $_SERVER['PHP_SELF']; ?>" method="POST">
              <hr>
              <h2 class="text-dark">Semester Grade</h2>
              <div class="row">
                  <div class="col-3">
                      <div class="form-floating-sm">
                          <input type="text" class="form-control form-control"placeholder="Midterm" name="mid" required>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-floating-sm">
                          <input type="text" class="form-control form-control" placeholder="Final Term" name="fnl" required>
                      </div>
                  </div>
              <div class="row mt-2">
                  <div class="col-12">
                      <button name="sub" class="btn btn-outline-primary form-control">Calculate</button>
                  </div>
              </div>
              <div class="row mt-2 p-2">
                  <table class="table" id="resultTable">
                      <thead>
                          <tr>
                              <th scope="col">Midterm Grade</th>
                              <th scope="col">Final Grade</th>
                              <th scope="col">Semester Grade</th>
                              <th scope="col">Grade Equivalent</th>
                              <th scope="col">Grade Status</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                            $sql = "SELECT * FROM semgrade WHERE stud_id = '$stud_id' ORDER BY stud_id ASC";
                            $query = mysqli_query($con, $sql);  
                            $row = mysqli_num_rows($query);

                          if ($row > 0) {
                              while ($data = mysqli_fetch_assoc($query)) {
                          ?>
                                  <tr class="text-center">
                                      <td><?php echo $data['mid_grade']; ?></td>
                                      <td><?php echo $data['fnl_grade']; ?></td>
                                      <td><?php echo $data['sem_grade']; ?></td>
                                      <td><?php echo $data['grade_equiv']; ?></td>
                                      <td><?php echo $data['grade_stat']; ?></td>
                                  </tr>
                          <?php
                              }
                          }
                          ?>
                      </tbody>
                  </table>
                  <a class="text-dark" href="fac_studtable.php">Go Back </a>

              </div> 
          </form>
                </div>
            </div>

    </div>
    </body>
    </html>