<!-- DELETE STUDENT RECORD -->

<?php
    include 'connect.php';
    $stud = $_GET['id'];
    $sql = "DELETE FROM student WHERE stud_id = '$stud' ";
    $query = mysqli_query($con, $sql);

    if($query){
        echo "<script> alert('Deleted Successfully!'); window.location.href = 'adm_stud.php'</script>";
    } else{
        echo "<script> alert('Error!'); window.location.href = 'adm_stud.php'</script>";
    }
?>