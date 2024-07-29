<!-- DELETE DEPARTMENT RECORD -->
<?php
    include 'connect.php';

    $prog = $_GET['id'];
    $sql = "DELETE FROM program WHERE prog_code = '$prog' ";
    $query = mysqli_query($con, $sql);
        
    if($query){
        echo "<script> alert('Deleted Successfully!'); window.location.href = 'adm_dep.php'</script>";
    } else{
        echo "<script> alert('Error!'); window.location.href = 'adm_dep.php'</script>";
    }

?>