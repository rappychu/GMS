<?php
session_start();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading Management System - Admin Login</title>
    <link rel="stylesheet" href="adm.css">
    <link rel="icon" href="img/logogms.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>

<body class="admbg">
    <div class="admcon">
        <div class="col-md-5">
            <div class="admlog">
                <h3 class="text-white"> ADMINISTRATOR LOGIN </h3>
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="input-box">
                        <div class="input-field mb-4">
                            <input type="text" class="form-control" placeholder="STAFF ID" name="staffid">
                        </div>
                        <div class="input-field mb-4">
                            <input type="password" class="form-control" placeholder="Password" name="staffpass">
                        </div>
                            <button type="submit" class="btn btn-outline-primary form-control" name="admsign">Sign In</button>
                        <br><br>
                            <a href="index.html" class="back">Go Back</a>
                    </div>
                </form>
                
                <?php
                include "connect.php";

                if(isset($_POST['admsign'])){
                    $admuser = $_POST['staffid'];
                    $admpass = $_POST['staffpass'];
                    

                    $res = mysqli_query($con, "SELECT * FROM admin WHERE admin_username = '$admuser'");
                    $row = mysqli_fetch_assoc($res);

                    if (mysqli_num_rows($res) > 0) {
                        if($admpass == $row["admin_password"]) {
                            $_SESSION["staffid"] = true;
                            $_SESSION["admin_id"] = $row['admin_id'];
                            header("Location: adm_dashboard.php");
                            exit();
                        } else {
                            echo "<script>alert('Wrong Password');</script>";
                        }
                    } else {
                        echo "<script>alert('User Not Registered');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>