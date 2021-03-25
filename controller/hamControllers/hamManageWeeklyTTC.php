<?php
    session_start();
    require_once('../../config/database.php');
    require_once('../../model/hamModel/hamManageWeeklyTTModel.php');

    if (isset($_POST['entertt-submit'])) {
        
        $semesters = hamModel::getAllsemesters($connect);
        $degrees = hamModel::getAlldegrees($connect);
        $_SESSION['acayear'] = "";
        $_SESSION['semester'] = "";
        $_SESSION['acayear_with_sem'] = "";

        $subjects = hamModel::getAllsubjects($connect);
        $halls = hamModel::getAllHalls($connect);
        
        $_SESSION['subjects'] = "";
        $_SESSION['subject_code'] = "";
        $_SESSION['subject_with_code'] = "";
        
        $_SESSION['allhalls'] = "";
        $_SESSION['degree'] = "";
        $_SESSION['wtt'] = "";
        
        if ($semesters && $degrees && $subjects && $halls) {
            while ($sem = mysqli_fetch_array($semesters)) {
                $_SESSION['acayear_with_sem'] .= "<option value='".$sem['sem_id']."'>".$sem['academic_year']." - ".$sem['semester']."</option>";
            }

            while ($deg = mysqli_fetch_array($degrees)) {
                $_SESSION['degree'] .= "<option value='".$deg['degree_id']."'>".$deg['degree_name']."</option>";
            }

            while ($sub = mysqli_fetch_array($subjects)) {
                $_SESSION['subject_with_code'] .= "<option value='".$sub['subject_id']."'>".$sub['subject_code']." - ".$sub['subject_name']."</option>";
            }
    
            while ($hall = mysqli_fetch_array($halls)) {
                $_SESSION['allhalls'] .= "<option value='".$hall['hall_id']."'>".$hall['hall_name']."</option>";
            }

            header('Location:../../view/hallAllocationMaintainer/hamEnterTimeTableV.php');
        }
    } elseif (isset($_POST['savett-submit'])) {

        $semester = mysqli_real_escape_string($connect, $_POST['semester']);
        $degree = mysqli_real_escape_string($connect, $_POST['degree']);
        $year = mysqli_real_escape_string($connect, $_POST['year']);
        $starttime = mysqli_real_escape_string($connect, $_POST['starttime']);
        $endtime = mysqli_real_escape_string($connect, $_POST['endtime']);
        $subject = mysqli_real_escape_string($connect, $_POST['subject']);
        $hall = mysqli_real_escape_string($connect, $_POST['hall']);
        $day = mysqli_real_escape_string($connect, $_POST['day']);

        $timetable = hamModel::addWeeklyTT($semester, $degree, $year, $starttime, $endtime, $subject, $hall, $day, $connect);
        echo $timetable;
        // if ($timetable) {
            header('Location:../../view/hallAllocationMaintainer/hamEnterTTsuccesV.php');   
        // } else {
        //     echo "failed";
        // }
    
    } elseif (isset($_POST['updateremovett-submit'])) {

        $semesters = hamModel::getAllsemesters($connect);
        $degrees = hamModel::getAlldegrees($connect);
        $_SESSION['acayear'] = "";
        $_SESSION['semester'] = "";
        $_SESSION['acayear_with_sem'] = "";
        
        $_SESSION['degree'] = "";
        
        if ($semesters && $degrees) {
            while ($sem = mysqli_fetch_array($semesters)) {
                $_SESSION['acayear'] .= $sem['academic_year'];
                $_SESSION['semester'] .= $sem['semester'];
                $_SESSION['acayear_with_sem'] .= "<option value='".$sem['semester']."'>".$sem['academic_year']." - ".$sem['semester']."</option>";
            }

            while ($deg = mysqli_fetch_array($degrees)) {
                $_SESSION['degree'] .= "<option value='".$deg['degree_id']."'>".$deg['degree_name']."</option>";
            }
        }
        header('Location:../../view/hallAllocationMaintainer/hamUpdateTimeTableSelectV.php');

    } elseif (isset($_POST['updateremovett-submit'])) {

        $semesters = hamModel::getAllsemesters($connect);
        $degrees = hamModel::getAlldegrees($connect);
        $_SESSION['acayear_with_sem'] = "";
        $_SESSION['degree'] = "";
        
        if ($semesters && $degrees && $subjects && $halls) {
            while ($sem = mysqli_fetch_array($semesters)) {
                $_SESSION['acayear_with_sem'] .= "<option value='".$sem['sem_id']."'>".$sem['academic_year']." - ".$sem['semester']."</option>";
            }

            while ($deg = mysqli_fetch_array($degrees)) {
                $_SESSION['degree'] .= "<option value='".$deg['degree_id']."'>".$deg['degree_name']."</option>";
            }

            header('Location:../../view/hallAllocationMaintainer/hamUpdateTimeTableSelectV.php');
        }

    } elseif (isset($_POST['updatett-submit'])) {

        $_SESSION['viewd_tt'] = '';

        $semester = mysqli_real_escape_string($connect, $_POST['semester']);
		$year = mysqli_real_escape_string($connect, $_POST['year']);
        $degree = mysqli_real_escape_string($connect, $_POST['degree']);

        $viewdtt = hamModel::viewTimeTable($semester, $year, $degree, $connect);

        if ($viewdtt) {
            while($t = mysqli_fetch_assoc($viewdtt)) {
               $_SESSION['viewd_tt'] .= "<tr>";
               $_SESSION['viewd_tt'] .= "<td>{$t['day']}</td>";
               $_SESSION['viewd_tt'] .= "<td>{$t['start_time']}</td>";
               $_SESSION['viewd_tt'] .= "<td>{$t['end_time']}</td>";
               $_SESSION['viewd_tt'] .= "<td>{$t['subject_name']}</td>";
               $_SESSION['viewd_tt'] .= "<td>{$t['hall_name']}</td>";
               $_SESSION['viewd_tt'] .= "<td><a class=\"green\" href=\"../../controller/msmControllers/msmManageMembersC.php?ttevent_update={$t['wtt_id']}\" onclick=\"return confirm('Are you sure?');\">Update</a></td>";
               $_SESSION['viewd_tt'] .= "<td><a class=\"red\" href=\"../../controller/msmControllers/msmManageMembersC.php?ttevent_delete={$t['wtt_id']}\" onclick=\"return confirm('Are you sure?');\">Delete</a></td>";
               $_SESSION['viewd_tt'] .= "</tr>";
            }
            header('Location:../../view/hallAllocationMaintainer/hamWeeklyTimeTableV.php');
        } else {
            // echo "dfada ";
        }

    }  elseif (isset($_GET['ttevent_delete'])) {
        
        $delete_user_id = mysqli_real_escape_string($connect, $_GET['ttevent_delete']);

        $result = hamModel::deleteMember($delete_user_id , $connect);

        if ($result) {
            header('Location:../../view/medicalSchemeMaintainer/msmDeletedSuccesV.php');
        } else {
            header('Location:../../view/medicalSchemeMaintainer/msmDeletedUnsuccesV.php');
        }

    }

?>