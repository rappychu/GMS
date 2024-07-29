<?php

    function updateMidterm($con, $stud_id, $written, $ptask, $exam, $items) {
        $ave = weightedA($written, $ptask, $exam, $items);
        $gradeVal = gradeEquiv($ave);
        $stat = gstat($gradeVal);
    
        $updateMidtermSql = "UPDATE midterm 
                             SET mid_written = '$written', mid_ptask = '$ptask', mid_exam = '$exam',
                                 mid_equiv = '$gradeVal', mid_grade = '$ave', mid_stat = '$stat'
                             WHERE stud_id = '$stud_id'";
        $updateSemGradeSql = "UPDATE semgrade SET mid_grade = '$ave', grade_equiv = '$gradeVal', grade_stat = '$stat'
                              WHERE stud_id = '$stud_id'";
        $updateMid = "UPDATE student SET mid_equiv = '$gradeVal' WHERE stud_id = '$stud_id'";
    
        return mysqli_query($con, $updateMidtermSql) && mysqli_query($con, $updateSemGradeSql) && mysqli_query($con, $updateMid);
    }
    
    function insertMidterm($con, $stud_id, $written, $ptask, $exam, $items) {
        $ave = weightedA($written, $ptask, $exam, $items);
        $gradeVal = gradeEquiv($ave);
        $stat = gstat($gradeVal);
    
        $midtermSql = "INSERT INTO midterm (stud_id, mid_written, mid_ptask, mid_exam, mid_equiv, mid_grade, mid_stat)
                       VALUES ('$stud_id', '$written', '$ptask', '$exam', '$gradeVal', '$ave', '$stat')";
        $midTerm2 = "INSERT INTO semgrade (stud_id, mid_grade, grade_equiv, grade_stat)
                     VALUE ('$stud_id', '$ave', '$gradeVal', '$stat')";
        $updateMid = "UPDATE student SET mid_equiv = '$gradeVal' WHERE stud_id = '$stud_id'";
    
        return mysqli_query($con, $midtermSql) && mysqli_query($con, $midTerm2) && mysqli_query($con, $updateMid);
    }
    
    function updateFinalTerm($con, $stud_id, $written, $ptask, $exam, $items) {
        $ave = weightedA($written, $ptask, $exam, $items);
        $gradeVal = gradeEquiv($ave);
        $stat = gstat($gradeVal);
    
        $updateFinalTermSql = "UPDATE final_term 
                               SET fnl_written = '$written', fnl_ptask = '$ptask', fnl_exam = '$exam',
                                   fnl_equiv = '$gradeVal', fnl_grade = '$ave', fnl_stat = '$stat'
                               WHERE stud_id = '$stud_id'";
        $updateSemGradeSql = "UPDATE semgrade 
                              SET fnl_grade = '$ave', grade_equiv = '$gradeVal', grade_stat = '$stat'
                              WHERE stud_id = '$stud_id'";
        $updateFnl = "UPDATE student SET fnl_equiv = '$gradeVal' WHERE stud_id = '$stud_id'";
    
        return mysqli_query($con, $updateFinalTermSql) && mysqli_query($con, $updateSemGradeSql) && mysqli_query($con, $updateFnl);
    }
    
    function insertFinalTerm($con, $stud_id, $written, $ptask, $exam, $items) {
        $ave = weightedA($written, $ptask, $exam, $items);
        $gradeVal = gradeEquiv($ave);
        $stat = gstat($gradeVal);
    
        $finalTermSql = "INSERT INTO final_term (stud_id, fnl_written, fnl_ptask, fnl_exam, fnl_equiv, fnl_grade, fnl_stat)
                         VALUES ('$stud_id', '$written', '$ptask', '$exam', '$gradeVal', '$ave', '$stat')";
        $finalTerm2 = "INSERT INTO semgrade (stud_id, fnl_grade, grade_equiv, grade_stat)
                       VALUE ('$stud_id', '$ave', '$gradeVal', '$stat')";
        $updateFnl = "UPDATE student SET fnl_equiv = '$gradeVal' WHERE stud_id = '$stud_id'";
    
        return mysqli_query($con, $finalTermSql) && mysqli_query($con, $finalTerm2) && mysqli_query($con, $updateFnl);
    }
    
    function gradeEquiv($ave) {
        if ($ave >= 98) return 1.0;
        if ($ave >= 95) return 1.25;
        if ($ave >= 92) return 1.5;
        if ($ave >= 89) return 1.75;
        if ($ave >= 86) return 2.0;
        if ($ave >= 83) return 2.25;
        if ($ave >= 80) return 2.5;
        if ($ave >= 77) return 2.75;
        if ($ave >= 75) return 3.0;
        if ($ave >= 74) return 4.0;
        if ($ave >= 1) return 5.0;
        return '--';
    }

    function gstat($gradeVal) {
        return ($gradeVal <= 3.0) ? 'Passed' : 'Failed';
    }

    function weightedA($written, $ptask, $exam, $items) {
        $ww = '0.2';
        $ptw = '0.2';
        $ew = '0.6';

        $weightedA = ($written * $ww) + ($ptask * $ptw) + ($exam * $ew);

        if (!empty($items) && is_numeric($items) && $items > 0) {
            $weightedA += ($items / 100);
        }
        return sprintf("%.1f", $weightedA); 
    }

    
    function semgrade($mid, $fin) {
        $mw = '0.4';
        $fw = '0.6';

        $semG = ($mid * $mw) + ($fin * $fw);

        return sprintf("%.1f", $semG); 
    }

    function semstat($semG) {
        return ($semG <= 3.0) ? 'Passed' : 'Failed';
    }

?>