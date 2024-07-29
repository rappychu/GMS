<?php
include('navstu.php');
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student - Grades</title>
  <link rel="stylesheet" href="student.css">
  <link rel="icon" href="img/logogms.png">
</head>

<body>
 
    <div class="content">
      <div class="my-2">
        <div class="card">
          <div class="card-header">
            <table class="table">
              <tr>
                <?php
                $id = $_SESSION['stud_id'];
                $sql = "SELECT sem_year FROM section WHERE stud_id=$id";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);

                if ($row > 0) {
                  while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <td class="col-2">
                      <h6>School Year</h6>
                    </td>
                    <td class="col-1">:</td>
                    <td class="col-9"><?php echo $data['sem_year']; ?> </td>
                <?php
                  }
                }
                ?>
              </tr>
              <tr>
                <?php
                $id = $_SESSION['stud_id'];
                $sql = "SELECT prog_name FROM student WHERE stud_id=$id";
                $query = mysqli_query($con, $sql);
                $row = mysqli_num_rows($query);

                if ($row > 0) {
                  while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <td>
                      <h6>Program</h6>
                    </td>
                    <td class="col-1">:</td>
                    <td class="col-9"><?php echo $data['prog_name']; ?> </td>
                <?php
                  }
                }
                ?>
              </tr>
            </table>
          </div>
          <div class="card-body">
            <div class="accordion" id="accordion">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <h6>Semester: First</h6>
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                  <div class="accordion-body">
                    <table class="table table-responsive table-light table-hover table-striped table-bordered ">
                      <thead class="table-dark">
                        <tr>
                          <th class="col-2">Course Name</th>
                          <th class="col-2">Faculty</th>
                          <th class="col-1">Section</th>
                          <th class="col-1">Midterm</th>
                          <th class="col-1">Final Term</th>
                          <th class="col-1">Semester Grade</th>
                          <th class="col-1">Grade Status</th>
                        </tr> 
                      </thead>
                      <tbody>
                        <tr>
                          <?php
                            $id = $_SESSION['stud_id'];

                            $sql = "SELECT 
                            sec.crs_name,
                            sec.faculty_id,
                            sec.sec_name,
                            stu.mid_equiv,
                            stu.fnl_equiv,
                            s.grade_equiv,
                            s.grade_stat
                        FROM 
                            section sec
                        LEFT JOIN 
                            student stu ON sec.stud_id = stu.stud_id
                        LEFT JOIN 
                            semgrade s ON sec.stud_id = s.stud_id  WHERE 
                            sec.stud_id = $id";
                            
                                                
                          $query = mysqli_query($con, $sql);
                          $row = mysqli_num_rows($query);

                          if ($row > 0) {
                            while ($data = mysqli_fetch_assoc($query)) {
                          ?>
                          
                          
                          <td><?php echo $data['crs_name']; ?></td>
                          <td><?php echo $data['faculty_id']; ?></td>
                          <td><?php echo $data['sec_name']; ?></td>
                          <td><?php echo ($data['mid_equiv']) ? $data['mid_equiv'] : ''; ?></td>
                          <td><?php echo ($data['fnl_equiv']) ? $data['fnl_equiv'] : ''; ?></td>
                          <td><?php echo $data['grade_equiv']; ?></td>
                          <td><?php echo $data['grade_stat']; ?></td>
                          <?php
                            }
                          }
                          ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  
  </div>
  <script>
    $(function() {
      new DataTable('#mytable');
    });
  </script>
</body>

</html>