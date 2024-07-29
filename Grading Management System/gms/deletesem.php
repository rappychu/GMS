<!-- DELETE SEMESTER RECORD -->
<?php
    include 'connect.php';

     $sem = $_GET['id'];
     $sql = "DELETE FROM semester WHERE sem_id = '$sem' ";
     $query = mysqli_query($con, $sql);
         
     if($query){
         echo "<script> alert('Deleted Successfully!'); window.location.href = 'adm_session.php'</script>";
     } else{
         echo "<script> alert('Error!'); window.location.href = 'adm_session.php'</script>";
     }
?>