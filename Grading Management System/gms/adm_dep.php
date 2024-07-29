<?php
include 'connect.php';
include 'navadm.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Department and Program  </title>
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
                        <td class="col-2 text-align center"><h3>Add New Department</h3></td>
                    </tr>
                </div>
            <hr>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row">
                            <div class="col">
                                <label class="text-white"> Department <label>
                                <input type="text" class="form-control" name="dep" required>
                            </div>
                            <div class="col">
                                <label class="text-white"> Program <label>
                                <input type="text" class="form-control" name="prog" required>
                            </div>
                        </div> 
                    <br>
                        <div class="float-end">
                            <button type="submit" name="addDep" class="btn btn-outline-primary"><i class="bi bi-plus-lg my-2"></i>Add Department</button>
                        </div>
                        <?php
                            if (isset($_POST['addDep'])) {
                                $Department = $_POST['dep'];
                                $Program = $_POST['prog'];

                                $resultdep= mysqli_query($con, "SELECT dep_name FROM department WHERE dep_name = '$Department'");

                                if ($depdata = mysqli_fetch_assoc($resultdep)) {
                                    $dep = $depdata['dep_name'];

                                    $resultprog = mysqli_query($con, "SELECT prog_code FROM program WHERE prog_name = '$Program' AND dep_name = '$dep'");

                                    if (mysqli_num_rows($resultprog) > 0) {
                                        echo "<script>alert('Program already exists for this department');</script>";
                                    } else {
                                        $sqlprog = "INSERT INTO program (prog_name, dep_name) VALUES ('$Program', '$dep')";

                                        if (mysqli_query($con, $sqlprog)) {
                                            echo "<script>alert('Added Successfully!');</script>";
                                        } else {
                                            echo "Error: " . $sqlprog . "<br>" . mysqli_error($con);
                                        }
                                    }
                                } else {
                                    mysqli_query($con, "INSERT INTO department (dep_name) VALUES ('$Department')");
                                    $dep = $Department;  

                                    $sqlprog = "INSERT INTO program (prog_name, dep_name) VALUES ('$Program', '$dep')";

                                    if (mysqli_query($con, $sqlprog)) {
                                        echo "<script>alert('Added Successfully!');</script>";
                                    } else {
                                        echo "Error: " . $sqlprog . "<br>" . mysqli_error($con);
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
                        <td class="col-2"><center><h3>All Department</h3></center></td>
                    </tr>
                </div>
            <br>
                <div class="card-body">
                    <table class="table table-responsive table-dark table-hover table-striped table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Department</th>
                                    <th>Program</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    include 'connect.php';

                                    $sql = "SELECT * FROM program ORDER BY prog_code ASC";
                                    $query = mysqli_query($con, $sql);
                                    $row = mysqli_num_rows($query);
        
                                    if ($row > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['dep_name']; ?></td>
                                                <td><?php echo $data['prog_name']; ?></td>
    
                                                <td>
                                                    <a class="btn btn-sm btn-outline-danger" href="deletedep.php?id=<?php echo $data['prog_code']; ?>"><i class="bi bi-trash3-fill"></i> </a>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="3">No departments linked to any program. Please add departments and link them to programs.</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                        <script>
                            $(function () {
                                new DataTable('#mytable');
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>