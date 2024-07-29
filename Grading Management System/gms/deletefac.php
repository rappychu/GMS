<!-- DELETE FACULTY RECORD -->
<?php
    include 'connect.php';

    $fac = $_GET['id'];
    $sql = "DELETE FROM faculty WHERE faculty_id = '$fac' ";
    $query = mysqli_query($con, $sql);

    if($query){
        echo "<script> alert('Deleted Successfully!'); window.location.href = 'adm_fac.php'</script>";
    } else{
        echo "<script> alert('Error!'); window.location.href = 'adm_fac.php'</script>";
    }
?>