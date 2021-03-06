<?php

    session_start();
    require_once('../../config/database.php');
    require_once('../../model/adminModel/manageDesignationsModel.php');


    if (isset($_GET['designation_id'])) {
        $designation_id = mysqli_real_escape_string($connect, $_GET['designation_id']);

        $results = adminModel::viewADesign($designation_id, $connect);

        if ($results) {
            if (mysqli_num_rows($results)==1) {
                $result = mysqli_fetch_assoc($results);
                $_SESSION['designation_id'] = $result['designation_id'];
                $_SESSION['designation'] = $result['designation_name'];
                $_SESSION['description'] = $result['description'];
                header('Location:../../view/admin/aUpdateDesignationV.php');
            }
        }
        else {
            header('Location:../../view/admin/aQueryFailedV.php');
        }
    }

    elseif (isset($_POST['updateDesignation-submit'])) {
        $designation_id = $_SESSION['designation_id'];
        $designation = mysqli_real_escape_string($connect, $_POST['designation']);
        $description = mysqli_real_escape_string($connect, $_POST['description']);

        $checkDesign = adminModel::checkDesignThree($designation_id, $designation, $connect);

        if (mysqli_num_rows($checkDesign)==1) {
            header('Location:../../view/admin/aDesignationExistsV.php');
        }
        else {
            $result = adminModel::updateDesignation($designation_id, $designation, $description, $connect);

            if ($result) {
                header('Location:../../view/admin/aDesignationUpdatedV.php');
            }else {
                header('Location:../../view/admin/aDesignationNotUpdatedV.php');
            }
        }

    }
    
    elseif (isset($_POST['updateDesignation'])) {
        $designation = mysqli_real_escape_string($connect, $_POST['designation']);

        $results = adminModel::viewADesignUsingName($designation, $connect);

        if ($results) {
            if (mysqli_num_rows($results)==1) {
                $result = mysqli_fetch_assoc($results);
                $_SESSION['designation_id'] = $result['designation_id'];
                $_SESSION['designation'] = $result['designation_name'];
                $_SESSION['description'] = $result['description'];
                header('Location:../../view/admin/aUpdateDesignationV.php');
            }
        }
        else {
            header('Location:../../view/admin/aQueryFailedV.php');
        }
    }

    elseif (isset($_POST['deleteDesignation'])) {
        $designation = mysqli_real_escape_string($connect, $_POST['designation']);

        $result = adminModel::deleteDesignUsingName($designation, $connect);

        if ($result) {
            header('Location:../../view/admin/aDesignationDeletedTwoV.php');
        }
        else{
            header('Location:../../view/admin/aDesignationNotDeletedTwoV.php');
        }
    }

?>