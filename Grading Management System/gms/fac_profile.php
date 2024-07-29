<?php
include('navfac.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Profile</title>
    <link rel="stylesheet" href="faculty.css">
    <link rel="icon" href="img/logogms.png">

</head>
<body>
    <h2> Personal Information </h2>
        <div class="content">
            <table class="table table-light table-hover table-striped table-bordered border border-primary">
                <?php
                include 'connect.php';
                $id = $_SESSION['faculty_id'];
                $sql = "SELECT * FROM faculty WHERE faculty_id=$id";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);

                if ($row > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {
                ?>
                        <tr>
                            <th class="col-3">Firstame:</th>
                            <td><?php echo $data['faculty_fname']; ?></td>
                        </tr>
                        <tr>
                            <th class="col-3">Middle Name:</th>
                            <td><?php echo $data['faculty_mname']; ?></td>
                        </tr>
                        <tr>
                            <th class="col-3">Lastname:</th>
                            <td><?php echo $data['faculty_lname']; ?></td>
                        </tr>
                        <tr>
                            <th class="col-3">Department</th>
                            <td><?php echo $data['dep_name']; ?></td>
                        </tr>
                        <tr>
                            <th class="col-3">Program</th>
                            <td><?php echo $data['prog_name']; ?></td>
                        </tr>
                        
                <?php
                    }
                }
                ?>                            
            </table>
            <center><a class="btn btn-outline-primary btn-lg" href="fac_editprofile.php"><i class="bi bi-pencil-square"></i>Edit Information</a></center>

        </div>
    </div>
</div>

</body>
</html>