<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Forgot Password</title>
    <link rel="stylesheet" href="student.css">
    <link rel="icon" href="img/logogms.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!--  DataTables library  -->
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">


    <style>
        .bdyfgt {
            font-family: Arial;
            margin: 0;
            background-color: #ebebeb;
        }

        .header {
            background-color: white;
            padding: 20px;
            color: #063a46;
        }

        .footer {
            padding: 30px;
            background: #ffffff;
        }

        .card {
            background-color: #fff;
            padding: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            display: flex;
            margin: 3rem 25rem;
            background-color: white;
        }

        .card-header {
            text-align: center;
            font-weight: bold;
        }

        .card-footer {
            text-align: right;
        }
    </style>

</head>

<body class="bdyfgt">

    <div class="header">
        <h5>Grading Management System</h5>
    </div>

    <div class="content">
        <div class="my-2">
            <div class="card">

                <div class="card-header">
                    <img src="img/logogms.png" alt="Logo" width="100" height="100">
                    <p>Forgot Password?</p>
                </div>

                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        Username <input type="text" name="username" class="form-control" required>
                        <div class="row">
                            <div class="col">
                                New Password <input type="password" class="form-control" id="pass" name="pass" required>
                            </div>

                            <div class="col">
                                Confirm Password <input type="password" class="form-control" id="confirmpass" name="confirmpass" required>
                            </div>
                        </div>
                        <br>
                        <div class="card-footer">
                            <button type="button" class="btn btn-secondary" onclick="login()">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="resetpass">Reset Password</button>
                            <script>
                                function login() {
                                    window.location.href = 'stud_login.php';
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="footer"></div>

    <?php
    include 'connect.php';

    if (isset($_POST['resetpass'])) {
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $confirmpassword = $_POST['confirmpass'];

        $checkusername = "SELECT * FROM student WHERE stud_username = '$username'";
        $result = mysqli_query($con, $checkusername);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $confirmpassword) {
                $sql = "UPDATE student SET stud_password = '$password' WHERE stud_username = '$username'";

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
</body>

</html>
