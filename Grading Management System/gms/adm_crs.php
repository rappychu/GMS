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
    <title>Admin - Course Section</title>
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
                                <h3>Add New Course</h3>
                        </td>
                    </tr>
                </div>

                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row">
                            <div class="col col-md-6">
                                <label class="text-white"> Course Name </label>
                                <input type="text" class="form-control" name="crsname" placeholder="Course Name" required>
                                <label class="text-white"> Course Description </label>
                                <textarea class="form-control" name="crsdes"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="text-white"> Course Code </label>
                                <input type="text" class="form-control" placeholder="Course Code" name="crscode">
                                </select>
                                <label class="text-white"> Program </label>
                                <select class="form-control" name="prog" id="prog">
                                    <?php program(programdata($con)); ?>
                                </select>
                            </div>
                        </div>
                    <br>
                        <div class="float-end">
                            <button type="submit" name="addcrs" class="btn btn-outline-primary"><i class="bi bi-plus-lg my-2"></i>Add New Course</button>
                        </div>

                        <?php   
                            if (isset($_POST['addcrs'])) {
                                $crscode = $_POST['crscode'];
                                $crsname = $_POST['crsname'];
                                $crsdes = $_POST['crsdes'];
                                $Program = $_POST['prog'];

                                $resultprog = mysqli_query($con, "SELECT prog_name FROM program WHERE prog_name = '$Program'");

                                if ($progdata = mysqli_fetch_assoc($resultprog)) {
                                    $prog = $progdata['prog_name'];

                                    $resultcrs = mysqli_query($con, "SELECT crs_code FROM course WHERE crs_name = '$crsname' AND prog_name = '$Program'");

                                    if (mysqli_num_rows($resultcrs) > 0) {
                                        echo "<script>alert('Course already exists for this Program');</script>";
                                    } else {
                                        $sqlcrs = "INSERT INTO course (crs_code, crs_name, crs_description, prog_name) 
                                                VALUES ('$crscode', '$crsname', '$crsdes', '$Program')";

                                        if (mysqli_query($con, $sqlcrs)) {
                                            echo "<script>alert('Added Successfully!');</script>";
                                        } else {
                                            echo "Error: " . $sqlcrs . "<br>" . mysqli_error($con);
                                        }
                                    }
                                } else {
                                    $sqlcrs = "INSERT INTO course (crs_code, crs_name, crs_description, prog_name) 
                                    VALUES ('$crscode', '$crsname', '$crsdes', '$Program')";

                                    if (mysqli_query($con, $sqlcrs)) {
                                        echo "<script>alert('Added Successfully!');</script>";
                                    } else {
                                        echo "Error: " . $sqlcrs . "<br>" . mysqli_error($con);
                                    }
                                }
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
                            <h3>All Courses</h3>
                        </td>
                    </tr>
                </div>
            <hr>

                <div class="card-body content">
                    <table class="table table-responsive table-striped table-dark table-hover table-bordered" id="mytable">
                        <thead class="table-light">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Course Description</th>
                                <th>Program</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                        <?php
                            $sql = "SELECT * FROM course ORDER BY crs_code ASC";
                            $query = mysqli_query($con, $sql);

                            if ($query && mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['crs_code']; ?></td>
                                        <td><?php echo $data['crs_name']; ?></td>
                                        <td><?php echo $data['crs_description']; ?></td>
                                        <td><?php echo !empty($data['prog_name']) ? $data['prog_name'] : ' '; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-danger" href="deletecrs.php?id=<?php echo $data['crs_id']; ?>"><i class="bi bi-trash3-fill"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="8">No courses found in the system.</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
