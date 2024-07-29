<?php
include('connect.php');
include('navfac.php');
include('calculation.php');

$stud_id = isset($_GET['stud_id']) ? $_GET['stud_id'] : null;

    if (isset($_POST['fsubmit'])) {
        $written = $_POST['fwritten'];
        $ptask = $_POST['fptask'];
        $exam = $_POST['fexam'];
        $items = $_POST['fitems'];

        $ave = weightedA($written, $ptask, $exam, $items);
        $gradeVal = gradeEquiv($ave); 
        $stat = gstat($gradeVal);

        $resmid = mysqli_query($con, "SELECT stud_id FROM semgrade WHERE stud_id = '$stud_id'");

        if ($studata = mysqli_fetch_assoc($resmid)) {
            $updateMidtermSql = "UPDATE final_term 
                                SET fnl_written = '$written', fnl_ptask = '$ptask', fnl_exam = '$exam',
                                    fnl_equiv = '$gradeVal', fnl_grade = '$ave', fnl_stat = '$stat'
                                WHERE stud_id = '$stud_id'";
            $updateSemGradeSql = "UPDATE semgrade SET fnl_grade = '$ave' WHERE stud_id = '$stud_id'";

            if (mysqli_query($con, $updateMidtermSql) && mysqli_query($con, $updateSemGradeSql)) {
                $updateMid = "UPDATE student SET fnl_equiv = '$gradeVal' WHERE stud_id = '$stud_id'";
                
                if (mysqli_query($con, $updateMid)) {
                    echo "<script>alert('Successfully Updated!');</script>";
                }
            } else {
                echo "Error updating tables: " . $con->error;
            }
        } else {
            $fnl1 = "INSERT INTO final_term (stud_id, fnl_written, fnl_ptask, fnl_exam, fnl_equiv, fnl_grade, 
            fnl_stat) VALUES ('$stud_id', '$written', '$ptask', '$exam', '$gradeVal', '$ave', '$stat')";
            $fnl = "UPDATE semgrade SET fnl_equiv = '$gradeVal' WHERE stud_id = '$stud_id'";

            if (mysqli_query($con, $fnl1) && mysqli_query($con, $fnl)) {
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
        <title>Midterm Grades</title>
        <link rel="icon" href="img/logogms.png">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-9 border border-secondary mt-2">
                <form action="<?php echo isset($_GET['stud_id']) ? $_SERVER['PHP_SELF'] . '?stud_id=' . $_GET['stud_id'] : $_SERVER['PHP_SELF']; ?>" method="POST">
              
                        <h2 class="text-dark">Final Term</h2>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-floating-sm">
                                    <input type="number" class="form-control form-control"placeholder="Written" name="fwritten" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating-sm">
                                    <input type="number" class="form-control form-control" placeholder="Performance Task" name="fptask" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating-sm">
                                    <input type="number" class="form-control form-control" placeholder="Exam" name="fexam" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating-sm">
                                    <input type="number" class="form-control form-control" placeholder="Exam Items" name="fitems" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <button name="fsubmit" class="btn btn-outline-primary form-control">Calculate</button>
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
                                    $sql = "SELECT * FROM final_term WHERE stud_id = '$stud_id' ORDER BY fnl_id ASC";
                                    $query = mysqli_query($con, $sql);
                                    $row = mysqli_num_rows($query);

                                    if ($row > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                    <tr class="text-center">
                                        <td><?php echo $data['fnl_written']; ?></td>
                                        <td><?php echo $data['fnl_exam']; ?></td>
                                        <td><?php echo $data['fnl_ptask']; ?></td>
                                        <td><?php echo $data['fnl_grade']; ?></td>
                                        <td><?php echo $data['fnl_equiv']; ?></td>
                                        <td><?php echo $data['fnl_stat']; ?></td>
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

    </div>
    </body>
    </html>