<?php
include 'connect.php';
include 'navadm.php';
include 'select.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin -Class Section </title>
    <link rel="stylesheet" href="adm.css">
    <link rel="icon" href="img/logogms.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="bdy">      
   
    <div class="content">
        <div class="my-2">
            <div class="dxcard">
                <div class="card-header text-white">
                    <tr>
                        <td class="col-2 text-align center">
                            <h3>Add New Class</h3>
                        </td>
                    </tr>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row">
                            <div class="col col-md-6">
                                <label class="text-white"> Class Name  </label>
                                    <input type="text" class="form-control" name="name" required>
                                <label class="text-white"> Course  </label>
                                    <select class="form-select"  name="crs">
                                        <?php crs(crsdata($con)); ?>
                                    </select>
                                <label class="text-white"> Student  </label>
                                    <select class="form-select"  name="stud">
                                        <?php stu(studata($con)); ?>
                                    </select>
                            </div>

                            <div class="col col-md-6">
                                <label class="text-white"> Faculty  </label>
                                    <select class="form-select"  name="fac" >
                                        <?php fac(facdata($con)); ?>
                                    </select>
                                <label class="text-white"> Semester Term  </label>
                                    <input type="text" class="form-control" name="term" required>
                                <label class="text-white"> Semester Year  </label>
                                    <input type="text" class="form-control" name="year" required>
                            </div>
                        </div> 
                    <br>
                        <div class="float-end">
                            <button type="submit" name="addclass" class="btn btn-outline-primary"><i class="bi bi-plus-lg my-2"></i>Add Class</button>
                        </div>

                        <?php
                        if (isset($_POST['addclass'])) {
                            $class = $_POST['name'];
                            $fac = $_POST['fac'];
                            $crs = $_POST['crs'];
                            $stud = $_POST['stud'];
                            $year = $_POST['year'];
                            $term = $_POST['term'];
                        
                            $resclass = mysqli_query($con, "SELECT sec_num FROM section WHERE sec_num = '$class'");
                        
                            if ($classdata = mysqli_fetch_assoc($resclass)) {
                                $class = $classdata['sec_name'];
                        
                                $resclass = mysqli_query($con, "SELECT sec_num FROM section WHERE crs_name = '$crs' AND sec_name = '$class' 
                                AND  fac_id = '$fac' AND  stud_id = '$stud' AND  sem_year = '$year'  AND  sem_term = '$term'  ");
                        
                                if (mysqli_num_rows($resclass) > 0) {
                                    $message = 'Student already exists for this Class';
                                } else {
                                    $sqlprog = "INSERT INTO section (sec_name, crs_name, faculty_id, stud_id, sem_year, sem_term) 
                                                VALUES ('$class', '$crs', '$fac', '$stud', '$year', '$term')";
                        
                                    if (mysqli_query($con, $sqlprog)) {
                                        $updatestu = "UPDATE student SET sec_name = '$class'  WHERE stud_id = '$stud'";
                                        
                                        if (mysqli_query($con, $updatestu)) {
                                            $message = 'Added Successfully!';
                                        } else {
                                            $message = 'Error updating student table: ' . $updatestu . '<br>' . $con->error;
                                        }
                                    } else {
                                        $message = 'Error inserting into section table: ' . $sqlprog . '<br>' . $con->error;
                                    }
                                }
                            } else {
                                $sqlprog = "INSERT INTO section (sec_name, crs_name, faculty_id, stud_id, sem_year, sem_term) 
                                            VALUES ('$class', '$crs', '$fac', '$stud', '$year', '$term')";
                        
                                if (mysqli_query($con, $sqlprog)) {
                                    $updatestu = "UPDATE student SET sec_name = '$class'   WHERE stud_id = '$stud'";
                                        
                                    if (mysqli_query($con, $updatestu)) {
                                        $message = 'Added Successfully!';
                                    } else {
                                        $message = 'Error updating student table: ' . $updatestu . '<br>' . $con->error;
                                    }
                                } else {
                                    $message = 'Error inserting into section table: ' . $sqlprog . '<br>' . $con->error;
                                }
                            }
                        
                            echo "<script>alert('$message');</script>";
                            $con->close();
                        }

                        ?>
                    </form>
                </div>
            </div>

            <div class="my-2">
                <div class="dxcard">
                    <div class="card-header text-white">
                        <tr>
                            <td class="col-2 text-align center">
                                <h3>All Classes</h3>
                            </td>
                        </tr>
                    </div>
                <hr>
                    <div class="card-body">
                        <table class="table table-responsive table-dark table-hover table-striped table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Class Name</th>
                                    <th>Faculty ID</th>
                                    <th>Student ID</th>
                                    <th>Course</th>
                                    <th>School Year</th>
                                    <th>Semester Term</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'connect.php';

                                $sql = "SELECT * FROM section ORDER BY sec_num ASC";
                                $query = mysqli_query($con, $sql);
                                $row = mysqli_num_rows($query);

                                if ($row > 0) {
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        ?>  
                                        <tr>
                                            <td><?php echo $data['sec_name']; ?></td>
                                            <td><?php echo $data['faculty_id']; ?></td>
                                            <td><?php echo $data['stud_id']; ?></td>
                                            <td><?php echo $data['crs_name']; ?></td>
                                            <td><?php echo $data['sem_year']; ?></td>
                                            <td><?php echo $data['sem_term']; ?></td>

                                            <td>
                                                <a class="btn btn-sm btn-outline-danger"  href="deletesec.php?id=<?php echo $data['sec_num']; ?>"><i class="bi bi-trash3-fill"></i></a>
                                            </td>
                                        </tr>

                                        <?php
                                        }
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="8">No classes found in the system.</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                            <script>
                                $(function(){
                                    new DataTable('#mytable');
                                });
                            </script> 
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>

