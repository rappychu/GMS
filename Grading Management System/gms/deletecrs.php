<!-- DELETE COURSE RECORD -->
<?php
    include 'connect.php';
    
      $crs = $_GET['id'];
      $sql = "DELETE FROM course WHERE crs_id = '$crs' ";
      $query = mysqli_query($con, $sql);
  
      if($query){
          echo "<script> alert('Deleted Successfully!'); window.location.href = 'adm_crs.php'</script>";
      } else{
          echo "<script> alert('Error!'); window.location.href = 'adm_crs.php'</script>";
      }
?>