<?php
    include('connect.php');
    include('navfac.php');
    include('calculation.php');

    $stud_id = isset($_GET['stud_id']) ? $_GET['stud_id'] : null;

    if (isset($_POST['msubmit'])) {
        $written = $_POST['mwritten'];
        $ptask = $_POST['mptask'];
        $exam = $_POST['mexam'];
        $items = $_POST['mitems'];

        $ave = weightedA($written, $ptask, $exam, $items);
        $gradeVal = gradeEquiv($ave); 
        $stat = gstat($gradeVal);

        $resmid = mysqli_query($con, "SELECT stud_id FROM semgrade WHERE stud_id = '$stud_id'");

        if ($studata = mysqli_fetch_assoc($resmid)) {
            $updateMidtermSql = "UPDATE midterm 
                                SET mid_written = '$written', mid_ptask = '$ptask', mid_exam = '$exam',
                                    mid_equiv = '$gradeVal', mid_grade = '$ave', mid_stat = '$stat'
                                WHERE stud_id = '$stud_id'";
            $updateSemGradeSql = "UPDATE semgrade SET mid_grade = '$ave' WHERE stud_id = '$stud_id'";

            if (mysqli_query($con, $updateMidtermSql) && mysqli_query($con, $updateSemGradeSql)) {
                $updateMid = "UPDATE student SET mid_equiv = '$gradeVal' WHERE stud_id = '$stud_id'";
                
                if (mysqli_query($con, $updateMid)) {
                    echo "<script>alert('Successfully Updated!');</script>";
                }
            } else {
                echo "Error updating tables: " . $con->error;
            }
        } else {
            $midtermSql = "INSERT INTO midterm (stud_id, mid_written, mid_ptask, mid_exam, mid_equiv, mid_grade, mid_stat)
                        VALUES ('$stud_id', '$written', '$ptask', '$exam', '$gradeVal', '$ave', '$stat')";
            $midTerm2 = "INSERT INTO semgrade (stud_id, mid_grade) VALUE ('$stud_id', '$ave')";

            if (mysqli_query($con, $midtermSql) && mysqli_query($con, $midTerm2)) {
                $updateMid = "UPDATE student SET mid_equiv = '$gradeVal' WHERE stud_id = '$stud_id'";
                
                if (mysqli_query($con, $updateMid)) {
                    echo "<script>alert('Successfully Added!');</script>";
                } 
            } else {
                echo "Error inserting into tables: " . $con->error;
            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Final Grades</title>
        <link rel="icon" href="img/logogms.png">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-11 border border-secondary mt-2">
                <form action="<?php echo isset($_GET['stud_id']) ? $_SERVER['PHP_SELF'] . '?stud_id=' . $_GET['stud_id'] : $_SERVER['PHP_SELF']; ?>" method="POST">
              <hr>
              <h2 class="text-dark">Midterm</h2>
              <div class="row">
                  <div class="col-3">
                      <div class="form-floating-sm">
                          <input type="number" class="form-control form-control"placeholder="Written" name="mwritten" required>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-floating-sm">
                          <input type="number" class="form-control form-control" placeholder="Performance Task" name="mptask" required>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-floating-sm">
                          <input type="number" class="form-control form-control" placeholder="Exam" name="mexam" required>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-floating-sm">
                          <input type="number" class="form-control form-control" placeholder="Exam Items" name="mitems" required>
                      </div>
                  </div>
              </div>
              <div class="row mt-2">
                  <div class="col-12">
                      <button name="msubmit" class="btn btn-outline-primary form-control">Calculate</button>
                  </div>
              </div>
              <div class="row mt-2 p-2">
                  <table class="table" id="resultTable">
                      <thead>
                          <tr>
                              <th scope="col">Written</th>
                              <th scope="col">Exam</th>
                              <th scope="col">Performance Task</th>
                              <th scope="col">Average</th>
                              <th scope="col">Numeric Equivalent</th>
                              <th scope="col">Grade Status</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                            $sql = "SELECT * FROM midterm WHERE stud_id = '$stud_id' ORDER BY mid_id ASC";
                            $query = mysqli_query($con, $sql);
                          $row = mysqli_num_rows($query);

                          if ($row > 0) {
                              while ($data = mysqli_fetch_assoc($query)) {
                          ?>
                                  <tr class="text-center">
                                      <td><?php echo $data['mid_written']; ?></td>
                                      <td><?php echo $data['mid_exam']; ?></td>
                                      <td><?php echo $data['mid_ptask']; ?></td>
                                      <td><?php echo $data['mid_grade']; ?></td>
                                      <td><?php echo $data['mid_equiv']; ?></td>
                                      <td><?php echo $data['mid_stat']; ?></td>
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

    </div><!-- sa navbar -->
    </body>
    </html>