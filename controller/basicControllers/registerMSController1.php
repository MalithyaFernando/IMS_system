<?php
    session_start();
	require_once('../../config/database.php');
    require_once('../../model/Model.php');
    
    $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
    $result_set = Model::view($user_id, $connect); 
    $records1 = Model::department($connect);
    $records2 = Model::membertype($connect);
    $records4 = Model::civilstatus($connect);
    $records5 = Model::isscheme($user_id, $connect);
    $_SESSION['deps'] = '';
    $_SESSION['member_type'] = '';
    $_SESSION['civil_status'] = '';
    
    if ($result_set && $records1 && $records2 && $records4 && $records5) {
        if($records5 == "x"){
            if (mysqli_num_rows($result_set)==1) {
                $result = mysqli_fetch_assoc($result_set);
    
                $_SESSION['userId'] = $result['userId'];
    
                while ($record1 = mysqli_fetch_array($records1)) {
                    $_SESSION['deps'] .= "<option value='".$record1['department']."'>".$record1['department']."</option>";
                }
    
                while ($record2 = mysqli_fetch_array($records2)) {
                    $_SESSION['member_type'] .= "<option value='".$record2['member_type']."'>".$record2['member_type']."</option>";
                }
    
                while ($record4 = mysqli_fetch_array($records4)) {
                    $_SESSION['civil_status'] .= "<option value='".$record4['csname']."'>".$record4['csname']."</option>";
                }
    
                if ($result['userRole'] == "admin") {
                    header('Location:../../view/admin/aRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "academicStaffMemb") {
                    header('Location:../../view/academicStaffMember/asmRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "nonAcademicStaffMemb") {
                    header('Location:../../view/nonAcademicStaffMember/nasmRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "attendanceMain") {
                    header('Location:../../view/attendanceMaintainer/amRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "hallAllocationMain") {
                    header('Location:../../view/hallAllocationMaintainer/hamRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "mahapolaSchemeMain") {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "medicalSchemeMain") {
                    header('Location:../../view/medicalSchemeMaintainer/msmRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "recordsViewer") {
                    header('Location:../../view/reportViewer/rvRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "departmentHead") {
                    header('Location:../../view/departmentHead/dhRegisterToMedicalSchemeP1V.php');
                }
                else if ($result['userRole'] == "medicalOfficer") {
                    header('Location:../../view/medicalOfficer/moRegisterToMedicalSchemeP1V.php');
                }
                else {
                    echo "USER";
                }
            }
        } else {
            if (mysqli_num_rows($result_set) == 1) {
                $result = mysqli_fetch_assoc($result_set);

                if ($result['userRole'] == "admin") {
                    header('Location:../../view/admin/aAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "academicStaffMemb") {
                    header('Location:../../view/academicStaffMember/asmAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "nonAcademicStaffMemb") {
                    header('Location:../../view/nonAcademicStaffMember/nasmAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "attendanceMain") {
                    header('Location:../../view/attendanceMaintainer/amAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "hallAllocationMain") {
                    header('Location:../../view/hallAllocationMaintainer/hamAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "mahapolaSchemeMain") {
                    header('Location:../../view/mahapolaSchemeMaintainer/mmAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "medicalSchemeMain") {
                    header('Location:../../view/medicalSchemeMaintainer/msmAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "recordsViewer") {
                    header('Location:../../view/reportViewer/rvAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "departmentHead") {
                    header('Location:../../view/departmentHead/dhAlreadyRegisteredV.php');
                }
                else if ($result['userRole'] == "medicalOfficer") {
                    header('Location:../../view/medicalOfficer/moAlreadyRegisteredV.php');
                }
                else {
                    echo "USER";
                }
            }
        }        
    }
?>