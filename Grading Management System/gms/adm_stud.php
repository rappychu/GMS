<?php
include('connect.php');
include('navadm.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Student Section</title>
    <link rel="stylesheet" href="adm.css">
    <link rel="icon" href="img/logogms.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="bdy">
    <div class="content">
        <div class="my-2">
            <div class="dxcard">
                <div class="card-header text-white">
                    <tr>
                        <td class="col-2 text-align center"><h3>All Student</h3></td>
                    </tr>
                </div>

                <div class="card-body">
                    <div class="content">
                        <form action="" method="GET">
                            <div class="float-end">
                                <div class="input-group mb-3">
                                    <input class="form-control border border-primary" type="search" name="search" id="searchInput" placeholder="Search">
                                </div>
                            </div>
                        </form>
                        
                        <table class="table table-hover table-responsive table-striped table-dark table-bordered" id="myTable"  placeholder="Search">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                include 'connect.php';

                                $sql = "SELECT * FROM student ORDER BY stud_id ASC";
                                $query = mysqli_query($con, $sql);
                                $row = mysqli_num_rows($query);

                                if($row > 0){
                                    while($data=mysqli_fetch_assoc($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $data['stud_id']; ?></td>
                                            <td><?php echo $data['stud_lname']; ?></td>
                                            <td><?php echo $data['stud_fname']; ?></td>
                                            <td><?php echo $data['stud_mname']; ?></td>
                                            <td><?php echo $data['stud_username']; ?></td>
                                            <td><?php echo $data['stud_password']; ?></td>

                                         
                                            <td>
                                                <a class="btn btn-sm btn-outline-danger" href="deletestud.php?id=<?php echo $data['stud_id']; ?>"><i class="bi bi-trash3-fill"></i> </a>
                                            </td>
                                            
                                        </tr>
                                        <?php
                                        }
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="7">No Students Registered in the System</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                        <script>
                            const searchInput = document.getElementById('searchInput');
                            const table = document.getElementById('myTable');
                            const rows = table.getElementsByTagName('tr');

                            searchInput.addEventListener('keyup', function() {
                                const filter = searchInput.value.toLowerCase();

                                for (let i = 1; i < rows.length; i++) {
                                    const row = rows[i];
                                    const rowData = row.getElementsByTagName('td');
                                    let found = false;

                                    for (let j = 0; j < rowData.length; j++) {
                                        const cell = rowData[j];

                                        if (cell.innerHTML.toLowerCase().indexOf(filter) > -1) {
                                            found = true;
                                            break;
                                        }
                                    }

                                    if (found) {
                                        row.style.display = '';
                                    } else {
                                        row.style.display = 'none';
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>