<?php
    include('connect.php');
    include('navadm.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>  
  <link rel="icon" href="img/logogms.png">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="adm.css">  
</head>

<body class="bdy">      
    <div class="admcontent">
        <div class="panel text-white">
                <h1> Admin Panel </h1>
            </div>
        <br>
    <br>

   <!----------DEPARTMENT SECTION------------>
    <div class="row">
        <div class="col-md-3 ms-5 ms-5">
            <div class="dxcard text-center">
                <div class="dxcard-header text-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <img id="img" src="https://img.icons8.com/pulsar-color/60/teacher.png" class="display-3" alt="Department"/>
                        </div>
                            <div class="col">
                                <?php
                                $query = "SELECT dep_code FROM department ORDER BY dep_code";
                                $query_run = mysqli_query($con, $query);

                                $row = mysqli_num_rows($query_run);
                                echo '<h1>' .$row. '</h1>';
                                ?>
                            </div>
                        </div>
                    </div>
                            <div class="dxcard-footer text-white"> <h4>Department</h4> </div>
                        </div >
                    </div>

    <!----------PROGRAM SECTION------------>
        <div class="col-md-3 ms-5">
            <div class="dxcard text-center">
                <div class="dxcard-header text-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <img id="img"src="https://img.icons8.com/pulsar-color/60/000000/student-male.png"  class="display-3" alt="Program"/>
                        </div>
                            <div class="col">
                            <?php
                                $query = "SELECT prog_code FROM program ORDER BY prog_code";
                                $query_run = mysqli_query($con, $query);

                                $row = mysqli_num_rows($query_run);

                                echo '<h1>' .$row. '</h1>';
                                ?>
                            </div>
                        </div>
                    </div>
                            <div class="dxcard-footer text-white"> <h4>Program</h4> </div>
                        </div >
                    </div>

<!----------FACULTIES SECTION------------>
        <div class="col-md-3 ms-5">
            <div class="dxcard text-center">
                <div class="dxcard-header text-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <img id="img" src="https://img.icons8.com/external-flaticons-flat-flat-icons/60/external-teacher-100-most-used-icons-flaticons-flat-flat-icons-2.png" class="display-3" alt="Faculties"/>
                        </div>
                            <div class="col">
                                <?php
                                    $query = "SELECT faculty_id FROM faculty ORDER BY faculty_id";
                                    $query_run = mysqli_query($con, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<h1>' .$row. '</h1>';
                                ?>
                            </div>
                        </div>
                    </div>
                            <div class="dxcard-footer text-white"> <h4>Faculties</h4> </div>
                        </div >
                    </div>
                </div>

   <!----------STUDENT SECTION------------>
   <br><br><br>

   <div class="row">
        <div class="col-md-3 ms-5">
            <div class="dxcard text-center">
                <div class="dxcard-header text-white">
                    <div class="row align-items-center">
                        <div class="col">
                            <img id="img" src="https://img.icons8.com/pulsar-color/60/administrator-male.png" class="display-3" alt="Students"/>
                        </div>
                    <div class="col">
                        <?php
                            $query = "SELECT stud_id FROM student ORDER BY stud_id";
                            $query_run = mysqli_query($con, $query);

                            $row = mysqli_num_rows($query_run);

                            echo '<h1>' .$row. '</h1>';
                        ?>
                    </div>
                </div>
            </div>
                        <div class="dxcard-footer text-white"> <h4>Student</h4> </div>
                    </div >
                </div>

<!----------COURSE SECTION ------------>
        <div class="col-md-3 ms-5">
            <div class="dxcard text-center">
                <div class="dxcard-header  text-white">
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
                        <div class="dxcard-footer text-white"> <h4>Course</h4> </div>
                    </div >
                </div>

 <!----------SECTION SECTION------------>
        <div class="col-md-3 ms-5">
            <div class="dxcard text-center">
                <div class="dxcard-header text-white">
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
                        <div class="dxcard-footer text-white"> <h4>Section</h4> </div>
                    </div >
                </div>
            </div>
        </div>
</body>
</html>