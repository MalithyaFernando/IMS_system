<?php
    require_once('../../model/adminModel/manageMonthlySessionsModel.php');
    require_once('../../config/database.php');

    if(isset($_POST['addMSession-submit'])) {
        $degree_name = $_POST['degree_name'];
        $calendarYear = $_POST['calendarYear'];
        $month = $_POST['month'];
        $academic_year = $_POST['academic_year'];

        if ($calendarYear < date("Y")) {
            header('Location:../../view/admin/apreviousYearMV.php');
        }
        elseif ($calendarYear == date("Y") && $month < date("m")) {
            header('Location:../../view/admin/apreviousMonthMV.php');
        }
        else {
            $get_degree_id = adminModel::get_degree_id ($degree_name, $connect);
            $result_degree_id = mysqli_fetch_assoc($get_degree_id);
            $degree_id = $result_degree_id['degree_id'];

            if ($degree_id) {
                $get_semester = adminModel::get_semester($calendarYear, $month, $connect);
                $result_semester = mysqli_fetch_assoc($get_semester);
                if ($result_semester) {
                    $semester = $result_semester['semesterDigit'];

                    $get_subjects = adminModel::get_subjects ($degree_id, $academic_year, $semester, $connect);
                    $result_subjects = mysqli_fetch_assoc($get_subjects);
                    if ($result_subjects) {
                        session_start();
                        $_SESSION['subjects'] = "";
                        while ($record = mysqli_fetch_array($get_subjects)) {
                            $_SESSION['subjects'] .= "<option value='".$record['subject_name']."'>".$record['subject_name']."</option>";
                        }

                        $_SESSION['sessionTypes'] = '';
                        $records_sessionT = adminModel::sessionType($connect);

                        if (mysqli_num_rows($records_sessionT) != 0) {
                            while ($record = mysqli_fetch_array($records_sessionT)) {
                                $_SESSION['sessionTypes'] .= "<option value='".$record['sessionType']."'>".$record['sessionType']."</option>";
                            }
                            $_SESSION['degree_id'] = $degree_id;
                            $_SESSION['calendarYear'] = $calendarYear;
                            $_SESSION['month'] = $month;
                            header('Location:../../view/admin/aSaveSessionPerMonthV.php');
                        }
                        else {
                            header('Location:../../view/admin/aRequestDeniedV.php');
                        }
                    }
                    else {
                        header('Location:../../view/admin/aRequestDeniedV.php');
                    }
                }
                else {
                    header('Location:../../view/admin/aRequestDeniedV.php');
                }
            }
            else {
                header('Location:../../view/admin/aSystemFailedV.php');
            }
        }
    }

    elseif (isset($_POST['saveMSession-submit'])) {
        session_start();
        $degree_id = $_SESSION['degree_id'];
        $calendarYear = $_SESSION['calendarYear'];
        $month = $_SESSION['month'];
        $subject_name = $_POST['subject_name'];
        $sessionType = $_POST['sessionType'];
        $numOfSessions = $_POST['numOfSessions'];

        $get_subject_id = adminModel::get_subject_id ($subject_name, $connect);
        $r_subject_id = mysqli_fetch_assoc($get_subject_id);

        $get_sessionTypeId = adminModel::get_sessionTypeId ($sessionType, $connect);
        $r_sessionTypeId = mysqli_fetch_assoc($get_sessionTypeId);

        if ($r_subject_id && $r_sessionTypeId) {
            $subject_id = $r_subject_id['subject_id'];
            $sessionTypeId = $r_sessionTypeId['sessionTypeId'];

            $get_MonthlySession = adminModel::checkMonthlySession ($degree_id, $subject_id, $sessionTypeId, $calendarYear, $month, $connect);
            $result_MonthlySession = mysqli_fetch_assoc($get_MonthlySession);

            if (mysqli_num_rows($get_MonthlySession) == 0) {
                $result = adminModel::addMonthlySession ($degree_id, $subject_id, $sessionTypeId, $calendarYear, $month, $numOfSessions, $connect);
                if ($result) { 
                    header('Location:../../view/admin/aMonthlySessionAdded.php');
                }
                else {
                    header('Location:../../view/admin/aMonthlySessionNotAdded.php');
                }
            }
            else {
                header('Location:../../view/admin/aMonthlySessionExists.php');
            }
        }
    }

    elseif (isset($_POST['getDegree-submit'])) {
        session_start();
        $_SESSION['degreeList'] = '';
        $get_degreeList = adminModel::getDegrees($connect);
        if (mysqli_num_rows($get_degreeList) != 0) {
            while ($record = mysqli_fetch_array($get_degreeList)) {
                $_SESSION['degreeList'] .= "<option value='".$record['degree_name']."'>".$record['degree_name']."</option>";
            }

            $_SESSION['sessionTypes'] = '';
            $records_sessionT = adminModel::sessionType($connect);

            if (mysqli_num_rows($records_sessionT) != 0) {
                while ($record = mysqli_fetch_array($records_sessionT)) {
                    $_SESSION['sessionTypes'] .= "<option value='".$record['sessionType']."'>".$record['sessionType']."</option>";
                }

                $_SESSION['subject_list'] = '';
                $records_subList = adminModel::getSubjects($connect);

                if (mysqli_num_rows($records_subList) != 0) {
                    while ($record = mysqli_fetch_array($records_subList)) {
                        $_SESSION['subject_list'] .= "<option value='".$record['subject_name']."'>".$record['subject_name']."</option>";
                    }
                    header('Location:../../view/admin/aViewSessionPerMonthV.php');
                }
                else {
                    header('Location:../../view/admin/aSystemFailedV.php');
                }
            }
            else {
                header('Location:../../view/admin/aNoSessionTypesAvailableV.php');
            }
        }
        else {
            header('Location:../../view/admin/aSystemFailedV.php');
        }
    }

    elseif (isset($_POST['assignSession-submit'])) {
        session_start();

        $_SESSION['degreeList'] = '';
        $get_degreeList = adminModel::getDegrees($connect);
        if (mysqli_num_rows($get_degreeList) != 0) {
            while ($record = mysqli_fetch_array($get_degreeList)) {
                $_SESSION['degreeList'] .= "<option value='".$record['degree_name']."'>".$record['degree_name']."</option>";
            }
            header('Location:../../view/admin/aAddSessionPerMonthV.php');
        }
        else {
            header('Location:../../view/admin/aSystemFailedV.php');
        }
    }

    elseif(isset($_POST['monthlySessionDetails-submit'])) {
        $subject_name = $_POST['subject_name'];
        $degree_name = $_POST['degree_name'];
        $calendarYear = $_POST['calendarYear'];
        $month = $_POST['month'];
        $sessionType = $_POST['sessionType'];

        $get_degree_id = adminModel::get_degree_id ($degree_name, $connect);
        $result_degree_id = mysqli_fetch_assoc($get_degree_id);
        $degree_id = $result_degree_id['degree_id'];

        if ($degree_id) {
            $get_subject_id = adminModel::get_subject_id ($subject_name, $connect);
            $result_subject_id = mysqli_fetch_assoc($get_subject_id);
            $subject_id = $result_subject_id['subject_id'];

            if ($subject_id) {
                $get_sessionTypeId = adminModel::get_sessionTypeId ($sessionType, $connect);
                $result_sessionTypeId = mysqli_fetch_assoc($get_sessionTypeId);
                $sessionTypeId = $result_sessionTypeId['sessionTypeId'];

                if ($sessionTypeId) {
                    $get_MonthlySession = adminModel::checkMonthlySession ($degree_id, $subject_id, $sessionTypeId, $calendarYear, $month, $connect);
                    $result_MonthlySession = mysqli_fetch_assoc($get_MonthlySession);

                    if ($result_MonthlySession) {
                        session_start();
                        $_SESSION['degree_name'] = $degree_name;
                        $_SESSION['subject_name'] = $subject_name;
                        $_SESSION['sessionType'] = $sessionType;
                        $_SESSION['calendarYear'] = $calendarYear;
                        $_SESSION['month'] = $month;
                        $_SESSION['numOfSessions'] = $result_MonthlySession['numOfSessions'];
                        header('Location:../../view/admin/aViewMonthlySessionV.php');
                    }
                    else {
                        header('Location:../../view/admin/aNomSessionsAssignedV.php');
                    }
                }
                else {
                   header('Location:../../view/admin/aSystemFailedV.php');
                }
            }
            else {
                header('Location:../../view/admin/aSystemFailedV.php');
            }
        }
        else {
            header('Location:../../view/admin/aSystemFailedV.php');
        }
    }

    elseif(isset($_POST['getMonthlySessionDetails-submit'])) {
        $degree_name = $_POST['degree_name'];
        $subject_name = $_POST['subject_name'];
        $calendarYear = $_POST['calendarYear'];
        $month = $_POST['month'];
        $sessionType = $_POST['sessionType'];

        $get_degree_id = adminModel::get_degree_id ($degree_name, $connect);
        $result_degree_id = mysqli_fetch_assoc($get_degree_id);
        $degree_id = $result_degree_id['degree_id'];

        if ($degree_id) {
            $get_subject_id = adminModel::get_subject_id ($subject_name, $connect);
            $result_subject_id = mysqli_fetch_assoc($get_subject_id);
            $subject_id = $result_subject_id['subject_id'];

            if ($subject_id) {
                $get_sessionTypeId = adminModel::get_sessionTypeId ($sessionType, $connect);
                $result_sessionTypeId = mysqli_fetch_assoc($get_sessionTypeId);
                $sessionTypeId = $result_sessionTypeId['sessionTypeId'];

                if ($sessionTypeId) {
                    $get_MonthlySession = adminModel::checkMonthlySession ($degree_id, $subject_id, $sessionTypeId, $calendarYear, $month, $connect);
                    $result_MonthlySession = mysqli_fetch_assoc($get_MonthlySession);

                    if ($result_MonthlySession) {
                        session_start();
                        $_SESSION['sessionMid'] = $result_MonthlySession['sessionMid'];
                        $_SESSION['degree_name'] = $degree_name;
                        $_SESSION['subject_name'] = $subject_name;
                        $_SESSION['sessionType'] = $sessionType;
                        $_SESSION['calendarYear'] = $calendarYear;
                        $_SESSION['month'] = $month;
                        $_SESSION['numOfSessions'] = $result_MonthlySession['numOfSessions'];
                        header('Location:../../view/admin/aUpdateRemoveSessionPerMonthFoundV.php');
                    }
                    else {
                        header('Location:../../view/admin/aNomSessionsAssignedV.php');
                    }
                }
                else {
                    header('Location:../../view/admin/aSystemFailedV.php');
                }
            }
            else {
                header('Location:../../view/admin/aSystemFailedV.php');
            }
        }
        else {
            header('Location:../../view/admin/aSystemFailedV.php');
        }
    }

    elseif(isset($_POST['updateMonthlySession-submit'])) {
        session_start();
        $sessionMid = $_SESSION['sessionMid'];
        $degree_name = $_SESSION['degree_name'];
        $subject_name = $_SESSION['subject_name'];
        $sessionType = $_SESSION['sessionType'];
        $calendarYear = $_POST['calendarYear'];
        $month = $_POST['month'];
        $numOfSessions = $_POST['numOfSessions'];

        $get_degree_id = adminModel::get_degree_id ($degree_name, $connect);
        $result_degree_id = mysqli_fetch_assoc($get_degree_id);
        $degree_id = $result_degree_id['degree_id'];

        if ($degree_id) {
            $get_subject_id = adminModel::get_subject_id ($subject_name, $connect);
            $result_subject_id = mysqli_fetch_assoc($get_subject_id);
            $subject_id = $result_subject_id['subject_id'];

            if ($subject_id) {
                $get_sessionTypeId = adminModel::get_sessionTypeId ($sessionType, $connect);
                $result_sessionTypeId = mysqli_fetch_assoc($get_sessionTypeId);
                $sessionTypeId = $result_sessionTypeId['sessionTypeId'];

                if ($sessionTypeId) {
                    $get_MonthlySession = adminModel::checkMonthlySession ($degree_id, $subject_id, $sessionTypeId, $calendarYear, $month, $connect);
                    $check_numOfSessions = mysqli_fetch_assoc($get_MonthlySession);

                    if ($numOfSessions == $$check_numOfSessions['numOfSessions']) {
                        header('Location:../../view/admin/aMSessionUpdateFailed.php');
                    }
                    else {
                        $result_set = adminModel::updateMonthlySession ($sessionMid, $calendarYear, $month, $numOfSessions, $connect);

                        if ($result_set) {
                            header('Location:../../view/admin/aMonthlySessionUpdated.php');
                        }
                        else {
                            header('Location:../../view/admin/aMonthlySessionNotUpdated.php');
                        }
                    }
                }
                else {
                    header('Location:../../view/admin/aSystemFailedV.php');
                }
            }
            else {
                header('Location:../../view/admin/aSystemFailedV.php');
            }
        }
        else {
            header('Location:../../view/admin/aSystemFailedV.php');
        }
    }

    elseif(isset($_POST['removeMonthlySession-submit'])) {
        session_start();
        $sessionMid = $_SESSION['sessionMid'];

        $result_set = adminModel::removeMonthlySession($sessionMid, $connect);

        if ($result_set) {
            header('Location:../../view/admin/aMonthlySessionRemoved.php');
        }
        else {
            header('Location:../../view/admin/aMonthlySessionNotRemoved.php');
        }
    }

    elseif(isset($_POST['sessionTypesList-submit'])) {
        session_start();
        $_SESSION['degreeList'] = '';
        $get_degreeList = adminModel::getDegrees($connect);
        if (mysqli_num_rows($get_degreeList) != 0) {
            while ($record = mysqli_fetch_array($get_degreeList)) {
                $_SESSION['degreeList'] .= "<option value='".$record['degree_name']."'>".$record['degree_name']."</option>";
            }

            $_SESSION['sessionTypes'] = '';
            $records_sessionT = adminModel::sessionType($connect);

            if (mysqli_num_rows($records_sessionT) != 0) {
                while ($record = mysqli_fetch_array($records_sessionT)) {
                    $_SESSION['sessionTypes'] .= "<option value='".$record['sessionType']."'>".$record['sessionType']."</option>";
                }

                $_SESSION['subject_list'] = '';
                $records_subList = adminModel::getSubjects($connect);

                if (mysqli_num_rows($records_subList) != 0) {
                    while ($record = mysqli_fetch_array($records_subList)) {
                        $_SESSION['subject_list'] .= "<option value='".$record['subject_name']."'>".$record['subject_name']."</option>";
                    }
                    header('Location:../../view/admin/aUpdateRemoveSessionPerMonthV.php');
                }
                else {
                    header('Location:../../view/admin/aSystemFailedV.php');
                }
            }
            else {
                header('Location:../../view/admin/aNoSessionTypesAvailableV.php');
            }
        }
        else {
            header('Location:../../view/admin/aSystemFailedV.php');
        }
    }
?>