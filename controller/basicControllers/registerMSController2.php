<?php
    session_start();
    require_once('../model/Model.php');
    require_once('../config/database.php');

    $errors = array();
    $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
    $result_set = Model::view($user_id, $connect);
    $records = Model::scheme($connect);
    $_SESSION['scheme'] = '';

    if (isset($_POST['registerNext-submit'])) {
        $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);

        $userInfo = array('department'=>20, 'member_type'=>15, 'health_condition'=>100, 'civil_status'=>10);
		
		foreach ($userInfo as $info=>$maxLen) {
            if (strlen(trim($_POST[$info])) >  $maxLen) {
                $errors[] = $info . ' must be less than ' . $maxLen . ' characters';
            }
        }
        
        if (empty($errors)) {
            $department = mysqli_real_escape_string($connect, $_POST['department']);
            $member_type = mysqli_real_escape_string($connect, $_POST['member_type']);
            $health_condition = mysqli_real_escape_string($connect, $_POST['health_condition']);
            $civil_status = mysqli_real_escape_string($connect, $_POST['civil_status']);

            $_SESSION['department'] = $department;
            $_SESSION['member_type'] = $member_type;
            $_SESSION['health_condition'] = $health_condition;
            $_SESSION['civil_status'] = $civil_status;
        }

        // Load details to the Register to the Medical Scheme - Part 2
        if ($result_set && $records) {
            if (mysqli_num_rows($result_set)==1) {
                $result = mysqli_fetch_assoc($result_set);
    
                $_SESSION['userId'] = $result['userId'];
                $_SESSION['appointment'] = $result['appointment'];
                $current_date = date("Y-m-d");
    
                if ($_SESSION['member_type'] == "Permanent") {
                    if (($current_date - $_SESSION['appointment']) == ) {
    
                    } else {
    
                    }
    
                } else if ($_SESSION['member_type'] == "Contract") {
                    if (($current_date - $_SESSION['appointment']) == ) {
    
                    } else {
                        
                    }
                } else if ($_SESSION['member_type'] == "Temporary") {
                    if (($current_date - $_SESSION['appointment']) == ) {
                        
                    }
                }
                while ($record2 = mysqli_fetch_array($records2)) {
                    $_SESSION['scheme'] .= "<option value='".$record2['schemename']."'>".$record2['schemename']."</option>";
                }
    
                if ($result['userRole'] == "admin") {
                    header('Location:../view/admin/aRegisterToMedicalSchemeP2V.php');
                }
                else if ($result['userRole'] == "academicStaffMemb") {
                    header('Location:../view/academicStaffMember/asmRegisterToMedicalSchemeP2V.php');
                }
                else if ($result['userRole'] == "nonAcademicStaffMemb") {
                    header('Location:../view/nonAcademicStaffMember/nasmRegisterToMedicalSchemeP2V.php');
                }
                else if ($result['userRole'] == "attendanceMain") {
                    header('Location:../view/attendanceMaintainer/amRegisterMedicalSchemep2V.php');
                }
                else if ($result['userRole'] == "hallAllocationMain") {
                    header('Location:../view/hallAllocationMaintainer/hamRegisterToMedicalSchemeP2V.php');
                }
                else if ($result['userRole'] == "mahapolaSchemeMain") {
                    header('Location:../view/mahapolaSchemeMaintainer/mmRegisterToMedicalSchemeP2V.php');
                }
                else if ($result['userRole'] == "medicalSchemeMain") {
                    header('Location:../view/medicalSchemeMaintainer/msmRegisterToMedicalSchemeP2V.php');
                }
                else if ($result['userRole'] == "recordsViewer") {
                    header('Location:../view/reportViewer/rvRegisterToMedicalSchemeP2V.php');
                }
                else if ($result['userRole'] == "departmentHead") {
                    header('Location:../view/departmentHead/dhRegisterMedicalSchemeP2V.php');
                }
                else if ($result['userRole'] == "medicalOfficer") {
                    header('Location:../view/medicalOfficer/moRegisterToMedicalSchemeP2V.php');
                }
                else {
                    echo "USER";
                }
            }
            
        }else {
            echo "records are not ok";
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