<?php
include('navfac.php');
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty -  Dashboard</title>
  <link rel="stylesheet" href="faculty.css">
  <link rel="icon" href="img/logogms.png">
</head>

<body>
    <!----------PROGRAM------------>
    <div class="row">
        <div class="col-md-3 ms-5">
            <div class="card text-center">
                <div class="card-header bg-secondary text-white">
                    <div class="row align-items-center">
                        <div class="col">
                        <img id="img"src="https://img.icons8.com/pulsar-color/60/000000/student-male.png"  class="display-3" alt="Program"/>
                        </div>
                            <div class="col">
                            <?php
                                $query = "SELECT prog_name FROM faculty";
                                $query_run = mysqli_query($con, $query);

                                $row = mysqli_num_rows($query_run);

                                echo '<h1>' . $row . '</h1>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"> <h4>Program</h4> </div>
                </div >
            </div>

   <!----------STUDENT------------>
        <div class="col-md-3 ms-5">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <img id="img" src="https://img.icons8.com/pulsar-color/60/administrator-male.png" class="display-3" alt="Students"/>
                        </div>
                            <div class="col">
                                <?php
                                    $query = "SELECT faculty_id FROM section";
                                    $query_run = mysqli_query($con, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<h1>' . $row . '</h1>';
                                    ?>
                            </div>
                        </div>
                    </div>
                                <div class="card-footer"> <h4>Student</h4> </div>
                            </div >
                        </div>
                    </div>
    <br><br>   
<!----------COURSE------------>
<div class="row">
        <div class="col-md-3 ms-5">
            <div class="card text-center">
                <div class="card-header bg-warning text-white">
                    <div class="row align-items-center">
                        <div class="col">
                        <img id="img" src="https://img.icons8.com/external-inipagistudio-mixed-inipagistudio/60/external-course-self-development-inipagistudio-mixed-inipagistudio.png" class="display-3" alt="Course"/>
                        </div>
                        <div class="col">
                            <?php
                                    $query = "SELECT crs_code FROM course ORDER BY crs_code";
                                    $query_run = mysqli_query($con, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<h1>' . $row . '</h1>';
                                    ?>
                            </div>
                        </div>
                    </div>
                        <div class="card-footer"> <h4>Course</h4> </div>
                    </div >
                </div>

 <!----------SECTION------------>
        <div class="col-md-3 ms-5">
            <div class="card text-center">
                <div class="card-header bg-danger text-white">
                    <div class="row align-items-center">
                        <div class="col">
                        <img id="img" src="https://img.icons8.com/office/60/school.png" class="display-3" alt="Section"/>
                        </div>
                        <div class="col">
                            <?php
                                $query = "SELECT sec_num FROM section ORDER BY sec_num";
                                $query_run = mysqli_query($con, $query);

                                $row = mysqli_num_rows($query_run);

                                echo '<h1>' . $row . '</h1>';

                            ?>
                        </div>
                    </div>
                </div>      
                <div class="card-footer"> <h4>Section</h4> </div>
         </div >
      </div>
   </div>
</div>

</body>
</html>