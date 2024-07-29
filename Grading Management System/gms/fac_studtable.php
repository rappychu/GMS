    <?php
    include('connect.php');
    include('navfac.php');

    $faculty = $_SESSION['faculty_id'];

    $sql = "SELECT student.stud_id, student.stud_lname, student.stud_fname, student.stud_mname
            FROM student
            INNER JOIN section ON student.stud_id = section.stud_id
            WHERE section.faculty_id = $faculty";

            $query = mysqli_query($con, $sql);
            $row = mysqli_num_rows($query);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Faculty - Student Section</title>
        <link rel="stylesheet" href="faculty.css">
        <link rel="icon" href="logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="content">
            <div class="my-2">
                <div class="card">
                    <div class="card-header">
                        <tr>
                            <td class="col-2 text-align center"> <h3>All Students</h3></td>
                        </tr>
                    </div>

                    <div class="card-body">
                        <div class="content">
                            <table class="table table-responsive table-light table-hover table-striped table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Midterm</th>
                                        <th> Final </th>
                                        <th> General Average </th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php
                                    if ($row > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $data['stud_id']; ?></td>
                                                <td><?php echo $data['stud_lname']; ?></td>
                                                <td><?php echo $data['stud_fname']; ?></td>
                                                <td><?php echo $data['stud_mname']; ?></td>
                                                <td>
                                                    <center>
                                                    <a class="btn btn-sm btn-outline-success col-9"  href="fac_midgrades.php?stud_id=<?php echo $data['stud_id']; ?>">
                                                        Midterm
                                                    </a>
                                                    </td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-primary col-9"  href="fac_finalgrades.php?stud_id=<?php echo $data['stud_id']; ?>">
                                                        Final
                                                    </a>
                                                </center>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-primary col-4"  href="fac_semgrade.php?stud_id=<?php echo $data['stud_id']; ?>">
                                                        Overall 
                                                    </a>
                                                </center>
                                                </td>
                                                
                                            
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="7">No Students Enrolled in this Class</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <script>
                                $(function() {
                                    new DataTable('#mytable');
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>