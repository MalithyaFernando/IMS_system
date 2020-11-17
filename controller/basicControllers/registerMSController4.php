<?php
    session_start();
	require_once('../../config/database.php');
    require_once('../../model/Model.php');

    $errors = array();
    $user_id = '';

    if (isset($_POST['registerMS-submit'])) {
        $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);

        $userInfo = array('scheme_name'=>7);
        
		
		foreach ($userInfo as $info=>$maxLen) {
            if (strlen(trim($_POST[$info])) >  $maxLen) {
                $errors[] = $info . ' must be less than ' . $maxLen . ' characters';
            }
        }
        
        if (empty($errors)) {
            $scheme_name = mysqli_real_escape_string($connect, $_POST['scheme_name']);
            
            $result = Model::registerMS($scheme_name, $connect);

            $resultttt = Model::dept($department, $connect);
            $data = mysqli_fetch_array($resultttt);

            if ($result) {
                $to_email = $data['department_head_email'];
                $subject = "Membership Request";
                $body =  $_SESSION['empid'] . " have requested the membership for the Medical Scheme.";
                $headers = "From: ims.ucsc@gmail.com";

                $sendMail = mail($to_email, $subject, $body, $headers);
                echo "Your membership request has been sent for the approval. You will be inform about the approval later. Thank you.";
            } else {
                echo "Failed result";
            }
        }
    }
    if (isset($_POST['viewschemedetails-submit'])) {
        if ($result['userRole'] == "admin") {
            header('Location:../view/admin/aViewSchemeDetailsV.php');
        } else if ($result['userRole'] == "academicStaffMemb") {
            header('Location:../view/academicStaffMember/asmViewSchemeDetailsV.php');
        } else if ($result['userRole'] == "attendanceMain") {
            header('Location:../view/attendanceMaintainer/amViewSchemeDetailsV.php');
        } else if ($result['userRole'] == "hallAllocationMain") {
            header('Location:../view/hallAllocationMaintainer/hamViewSchemeDetailsV.php');
        } else if ($result['userRole'] == "mahapolaSchemeMain") {
            header('Location:../view/mahapolaSchemeMaintainer/mmViewSchemeDetailsV.php');
        } else if ($result['userRole'] == "medicalSchemeMain") {
            header('Location:../view/medicalSchemeMaintainer/msmViewSchemeDetailsV.php');
        } else if ($result['userRole'] == "recordsViewer") {
            header('Location:../view/reportViewer/rvViewSchemeDetailsV.php');
        } else if ($result['userRole'] == "departmentHead") {
            header('Location:../view/departmentHead/dhViewSchemeDetailsV.php');
        } else if ($result['userRole'] == "medicalSchemeMember") {
            header('Location:../view/medicalSchemeMember/moViewSchemeDetailsV.php');
        } else {
            echo "USER";
        }
    }
?>