
<?php

// SELECT FOR FACULTY DATA

function facdata($con) {
    $sql = "SELECT * FROM faculty";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    return $result;
}

function fac($result) {
    echo "<option value='Select Faculty'>--Select Faculty--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $facname = $row['faculty_fname'] . ' ' . $row['faculty_lname'];
        echo "<option value='" . $row['faculty_id'] . "'>" . $facname . "</option>";
    }
}   



// SELECT FOR FACULTY DATA

function studata($con) {
    $sql = "SELECT * FROM student";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    return $result;
}

function stu($result) {
    echo "<option value='Select Student'>--Select Student--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $stud = $row['stud_fname'] . ' ' . $row['stud_lname'];
        echo "<option value='" . $row['stud_id'] . "'>" . $stud . "</option>";
    }
}   


// SELECT FOR PROGRAM DATA

function programdata($con) {
    $sql = "SELECT * FROM program";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    return $result;
}

function program($result) {
    echo "<option value='Select Program'>--Select Program--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $prog = $row['prog_name'];
        echo "<option value='" . $row['prog_name'] . "'>" . $prog . "</option>";
    }
}

// SELECT FOR SECTION DATA

function sectiondata($con) {
    $sql = "SELECT * FROM section";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die(mysqli_error($con));
    }
    return $result;
}

function section($result) {
    echo "<option value='Select Section'>--Select Section--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $sec= $row['sec_name'];
        echo "<option value='" . $row['sec_name'] . "'>" . $sec . "</option>";
    }
}

// SELECT FOR SEMESTER DATA

function semdata($con) {
    $sql = "SELECT * FROM semester";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    return $result;
}

function year($result) {
    echo "<option value='Select Semester'>--Select Year--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $year= $row['sem_year'];
        echo "<option value='" . $row['sem_year'] . "'>" . $year . "</option>";
    }
}
function sem($result) {
    echo "<option value='Select Semester'>--Select Semester--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $sem= $row['sem_term'];
        echo "<option value='" . $row['sem_term'] . "'>" . $sem . "</option>";
    }
}


// SELECT FOR COURSE DATA

function crsdata($con) {
    $sql = "SELECT * FROM course";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    return $result;
}

function crs($result) {
    echo "<option value='Select Course'>--Select Course--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $crs= $row['crs_name'];
        echo "<option value='" . $row['crs_name'] . "'>" . $crs . "</option>";
    }
}

// SELECT FOR DEPARTMENT DATA

function depdata($con) {
    $sql = "SELECT * FROM department";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    return $result;
}

function dep($result) {
    echo "<option value='Select Department' >--Select Department--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $crs= $row['dep_name'];
        echo "<option value='" . $row['dep_name'] . "'>" . $crs . "</option>";
    }
}

// SELECT FOR section DATA

function secdata($con) {
    $sql = "SELECT * FROM section";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die(mysqli_error($con));
    }

    return $result;
}

function sec($result) {
    echo "<option value='Select Semester'>--Select Secti--</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $crs= $row['dep_name'];
        echo "<option value='" . $row['dep_name'] . "'>" . $crs . "</option>";
    }
}



?>
