<?php
include('navstu.php');
include('connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Faculty - Dashboard</title>
    <link rel="stylesheet" href="student.css">
    <link rel="icon" href="img/logogms.png">
</head>

<body>      

<!----------COURSE SECTION ------------>
  <div class="row">
        <div class="col-md-3 ms-5">
            <div class="card text-center">
                <div class="card-header text-dark">
                    <div class="row align-items-center">
                        <div class="col">
                            <img id="img" src="https://img.icons8.com/external-inipagistudio-mixed-inipagistudio/60/external-course-self-development-inipagistudio-mixed-inipagistudio.png" class="display-3" alt="Course"/>
                        </div>
                        <div class="col">
                            <?php
                                $query = "SELECT crs_code FROM course ORDER BY crs_code";
                                $query_run = mysqli_query($con, $query);

                                $row = mysqli_num_rows($query_run);

                                echo '<h1>' .$row. '</h1>';
                            ?>
                        </div>
                    </div>
                </div>
                        <div class="card-footer bg-warning text-dark"> <h4>Course</h4> </div>
                    </div >
                </div>

 <!----------SECTION SECTION------------>
        <div class="col-md-3 ms-5">
            <div class="card text-center">
                <div class="card-header text-dark">
                    <div class="row align-items-center">
                        <div class="col">
                            <img id="img" src="https://img.icons8.com/office/60/school.png" class="display-3" alt="Section"/>
                        </div>
                        <div class="col">
                            <?php
                                $query = "SELECT sec_num FROM section ORDER BY sec_num";
                                $query_run = mysqli_query($con, $query);

                                $row = mysqli_num_rows($query_run);

                                echo '<h1>' .$row. '</h1>';  
                            ?>
                        </div>
                    </div>
                </div>
                        <div class="card-footer bg-info text-dark"> <h4>Section</h4> </div>
                    </div >
                </div>
            </div>
        </div>
</body>
</html>