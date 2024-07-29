<!-- DELETE SECTION RECORD -->
<?php
    include 'connect.php';

    $sec = $_GET['id'];
    $sql = "DELETE FROM section WHERE sec_num = '$sec' ";
    $query = mysqli_query($con, $sql);
        
    if($query){
        echo "<script> alert('Deleted Successfully!'); window.location.href = 'adm_class.php'</script>";
    } else{
        echo "<script> alert('Error!'); window.location.href = 'adm_class.php'</script>";
    }

?>