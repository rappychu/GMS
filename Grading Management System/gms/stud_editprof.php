<?php
include 'connect.php';
include('navstu.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student -Update Profile</title>
    <link rel="stylesheet" href="student.css">
    <link rel="icon" href="img/logogms.png">
</head>

<body>
        <div class="content">
            <table class="table table-info table-striped table-bordered">
                <?php
                $id = $_SESSION['stud_id'];
                $sql = "SELECT * FROM student WHERE stud_id=$id";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);

                if ($row > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {
                ?>
                        <div class="content">
                            <div class="m-1">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Edit Information:</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            Username <input type="text" id="username" name="username" class="form-control">
                                            <div class="row pb-3">
                                                <div class="col">
                                                    Firstname <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo $data['stud_fname']; ?>">
                                                </div>
                                                <div class="col">
                                                    Middle Name <input type="text" class="form-control" id="mname" name="mname" placeholder="<?php echo $data['stud_mname']; ?>">
                                                </div>
                                                <div class="col">
                                                    Lastname <input type="text" class="form-control" id="lname" name="lname" placeholder="<?php echo $data['stud_lname']; ?>">
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="card-footer pt-3">
                                                    <button type="submit" class="btn btn-outline-secondary" name="edit">Save changes</button>
                                                    <button class="btn btn-outline-danger"><a href="stud_profile.php" class="nav-link">Cancel</a></button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <?php
                include 'connect.php';

                if (isset($_POST['edit'])) {
                    $username = $_POST['username'];
                    $fname = $_POST['fname'];
                    $mname = $_POST['mname'];
                    $lname = $_POST['lname'];

                    $checkusername = "SELECT stud_username FROM student WHERE stud_username = '$username'";
                    $result = mysqli_query($con, $checkusername);


                    if (mysqli_num_rows($result) > 0) {
                        $sql = "UPDATE student SET stud_fname`='$fname',stud_lname`='$lname',`stud_mname`='$mname' WHERE stud_username='$username'";
                        if (mysqli_query($con, $sql)) {
                            echo "
                        <script>
                            alert('Your information has been successfully changed.');
                            window.location.href='stud_profile.php';
                        </script>
                        ";
                        } else {
                            die(mysqli_error($con));
                        }
                    } else {
                        echo "
                <script>
                    alert('Username not found. Please check your username.');
                </script>";
                    }
                }
                ?>

</body>
</html>