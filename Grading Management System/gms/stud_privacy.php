    <?php
    include('navstu.php');
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student - Change Password</title>
        <link rel="stylesheet" href="student.css">
        <link rel="icon" href="img/logogms.png">
    </head>

    <body>
    <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"> <h4>Change Password:</h4> </div>
                            <div class="card-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        Username <input type="text" id="username" name="username" class="form-control" required>
                                        Current Password <input type="text" id="pass" name="pass" class="form-control" required>
                                        <div class="row">
                                            <div class="col">
                                                New Password <input type="password" class="form-control" id="newpass" name="newpass" required>
                                            </div>

                                            <div class="col">
                                                Confirm Password <input type="password" class="form-control" id="confirmpass" name="confirmpass" required>
                                            </div>
                                        </div>
                                        <br>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-outline-success" name="changepass">Change Password</button>
                                            </div>
                                            <?php
                                                include 'connect.php';

                                                if (isset($_POST['changepass'])) {
                                                    $id = $_SESSION['stud_id'];
                                                    $username = $_POST['username'];
                                                    $password = $_POST['pass'];
                                                    $newpassword = $_POST['newpass'];
                                                    $confirmpassword = $_POST['confirmpass'];

                                                    $checkusername = "SELECT stud_username FROM student WHERE stud_id = '$id'";
                                                    $checkpassword = "SELECT stud_password FROM student WHERE stud_id = '$id'";
                                                    $result = mysqli_query($con, $checkpassword);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        if ($newpassword == $confirmpassword) {
                                                            $sql = "UPDATE student SET stud_password = '$newpassword' WHERE stud_id = '$id'";

                                                            if (mysqli_query($con, $sql)) {
                                                                echo "
                                                                <script>
                                                                    alert('Your password has been successfully changed.');
                                                                    window.location.href='stud_login.php';
                                                                </script>
                                                                ";
                                                            } else {
                                                                die(mysqli_error($con));
                                                            }
                                                        } else {
                                                            echo "
                                                        <script>
                                                            alert('Password does not match');
                                                        </script>";
                                                        }
                                                    } else {
                                                        echo "
                                                        <script>
                                                            alert('Username not found. Please check your username.');
                                                        </script>";
                                                    }
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"> <h4>Change Username:</h4> </div>
                            <div class="card-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    Username <input type="text" id="username" name="username" class="form-control" required>
                                    <div class="row">
                                        <div class="col">
                                            New Username <input type="newuser" class="form-control" id="newuser" name="newuser" required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-outline-success" name="changeuser">Change Username</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            include 'connect.php';

            if (isset($_POST['changeuser'])) {
                $username = $_POST['username'];
                $newusername = $_POST['newuser'];

                $checkusername = "SELECT stud_username FROM student WHERE stud_username = '$username'";
                $result = mysqli_query($con, $checkusername);

                if (mysqli_num_rows($result) > 0) {
                    $sql = "UPDATE student SET stud_username = '$newusername' WHERE stud_id = '$id'";
                    if (mysqli_query($con, $sql)) {
                        echo "
                            <script>
                                alert('Your username has been successfully changed.');
                                window.location.href='stud_login.php';
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
