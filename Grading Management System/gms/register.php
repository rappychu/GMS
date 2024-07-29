<?php
    include 'select.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading Management System - Create Account</title>
    <link rel="icon" href="img/logogms.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url(ico/bg.png);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .crtcon {
            min-height: 90vh;
            display: flex;
        }

        .sgncon {
            background-color: #fff;
            padding: 2rem;
            margin-top: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: .3rem;
            border: rgb(3, 36, 80) solid 1px;
        }

        #sgnup {
            width: 50%;
            border-radius: 3rem;
        }

        .login {
            color: #0d6efd;
            text-decoration: none;
        }

        .login:hover {
            text-decoration: underline;
        }

        .form-check {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <center>
    <div class="crtcon p-5">
        <div class="col-md-5">
            <div class="sgncon">
                <h4>Create your Account!</h4>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="Firstname" name="fname" required>
                                <input type="text" class="form-control mb-2" placeholder="Middlename" name="mname">
                                <input type="text" class="form-control mb-2" placeholder="Lastname" name="lname" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control mb-2" placeholder="Username" name="username" required>
                                <input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
                                <input type="password" class="form-control mb-2" placeholder="Confirm Password" name="confirmpassword" required>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="acc" value="student" required>
                                <label class="form-check-label"> Student </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="acc" value="faculty" required>
                            <label class="form-check-label"> Faculty </label>
                        </div>
                        <button type="submit" class="btn btn-outline-primary form-control" name="sgnup">Sign Up</button>
                        <p class="mt-3 text-center">Have an Account? <a href="index.html" class="login">Log-in </a></p>
                    </div>
                <?php
                    include 'connect.php';

                    if (isset($_POST['sgnup'])) {
                        $firstname = $_POST['fname'];
                        $middlename = $_POST['mname'];
                        $lastname = $_POST['lname'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $confirmpassword = $_POST['confirmpassword'];
                        $acc = $_POST['acc'];
                        $dep = $_POST['dep'];
                        $prog = $_POST['prog'];

                        if ($acc == 'student') {
                            $select = "SELECT * FROM student WHERE stud_username = '$username'";
                        } else {
                            $select = "SELECT * FROM faculty WHERE faculty_username = '$username'";
                        }

                        $check = mysqli_query($con, $select);

                        if (mysqli_num_rows($check) > 0) {
                            echo "
                                <script> 
                                    alert('Username is already taken!!');
                                </script>
                            ";
                        }

                        if ($password == $confirmpassword) {
                            if ($acc === 'student') {
                                $insert = "INSERT INTO student (stud_fname, stud_mname, stud_lname, stud_username, stud_password, dep_name, prog_name) 
                                VALUES ('$firstname', '$middlename', '$lastname', '$username', '$password', '$dep', '$prog')";
                            } else {
                                $insert = "INSERT INTO faculty (faculty_fname, faculty_mname, faculty_lname, faculty_username, faculty_password, dep_name, prog_name) 
                                VALUES ('$firstname', '$middlename', '$lastname', '$username', '$password','$dep', '$prog')";
                            }

                            if (mysqli_query($con, $insert)) {
                                echo "
                                        <script>
                                            alert('Registration Complete!');
                                            window.location.href='index.html';
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
                    }
                    ?>
            </div>
        </div>
                <div class="container">
                            <div class="col-md-8">
                                <div class="sgncon">
                                    <h4>PROGRAM AND DEPARTMENT</h4>
                                    <hr>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <div class="mb-4">
                                            <div class="row">
                                                <select class="form-control" name="dep" >
                                                    <?php dep(depdata($con)); ?>
                                                </select>
                                                <br><hr>
                                                <select class="form-control" name="prog" >
                                                    <?php program(programdata($con)); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>    
                            </div>
                        </div>
                    </div>
                    </form>
                </center>

        

</body>


</html>
