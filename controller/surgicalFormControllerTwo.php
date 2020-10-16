<?php

    session_start();
    require_once('../model/Model.php');
    require_once('../config/database.php');

?>

<?php

    $errors = array();
    $user_id = '';

    if (isset($_POST['form-submit'])) {
        $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);

        $userInfo = array(  'address'=>255,  'how_occured'=>255, 
                            'injuries'=>255, 'nature_of_illness'=>255, 'doctor_name'=>255, 'doctor_address'=>255, 
                            'illness_before'=>255, 'illness_before_years'=>255,'sick_injury'=>255, 'insurer_claims'=>255, 'nature_of'=>255);
		
		foreach ($userInfo as $info=>$maxLen) 
		{
            // echo $_POST[$info];
			if (strlen(trim($_POST[$info])) >  $maxLen) 
			{
                $errors[] = $info . ' must be less than ' . $maxLen . ' characters';
            }
        }
        
        if (empty($errors)) {
            $address = mysqli_real_escape_string($connect, $_POST['address']);
            $patient_name = mysqli_real_escape_string($connect, $_POST['patient_name']);
            $relationship = mysqli_real_escape_string($connect, $_POST['relationship']);
            $accident_date = mysqli_real_escape_string($connect, $_POST['accident_date']);
            $how_occured = mysqli_real_escape_string($connect, $_POST['how_occured']);
            $injuries = mysqli_real_escape_string($connect, $_POST['injuries']);
            $nature_of_illness = mysqli_real_escape_string($connect, $_POST['nature_of_illness']);
            $commence_date = mysqli_real_escape_string($connect, $_POST['commence_date']);
            $first_consult_date = mysqli_real_escape_string($connect, $_POST['first_consult_date']);
            $doctor_name = mysqli_real_escape_string($connect, $_POST['doctor_name']);
            $doctor_address = mysqli_real_escape_string($connect, $_POST['doctor_address']);
            $hospitalized_date = mysqli_real_escape_string($connect, $_POST['hospitalized_date']);
            $discharged_date = mysqli_real_escape_string($connect, $_POST['discharged_date']);
            $illness_before = mysqli_real_escape_string($connect, $_POST['illness_before']);
            $illness_before_years = mysqli_real_escape_string($connect, $_POST['illness_before_years']);
            $sick_injury = mysqli_real_escape_string($connect, $_POST['sick_injury']);
            $insurer_claims = mysqli_real_escape_string($connect, $_POST['insurer_claims']);
            $nature_of = mysqli_real_escape_string($connect, $_POST['nature_of']);
            $opd_form_flag = mysqli_real_escape_string($connect, $_POST['opd_form_flag']);
            $surgical_form_flag = mysqli_real_escape_string($connect, $_POST['surgical_form_flag']);

            // $file = $_FILES('bill');
            // //$file = mysqli_real_escape_string($connect, $_POST['file']);

            // $fileName = $_FILES['bill']['name'];
            // //$fileType = $_FILES['bill']['type'];

            // $fileName = mysqli_real_escape_string($connect, $_POST['fileName']);

            // $fileExt = explode('.',$fileName);
            // $fileActualExt = strtolower(end($fileExt));

            // $allowed = array('jpg','jpeg','png','pdf');

            // if(in_array($fileActualExt,$allowed))
            //    {
            //     $result = Model::fillSurgicalForm($user_id, $empid, $department, $address,  $patientname, $relationship, $accidentdate, $howoccured, $injuries, $natureofillness, $datecommence, $dateconsult, $doctor, $docaddress, $hospitalizedon, $discharged, $illnessbefore, $illnessbeforyears, $sickinjury, $insurerclaims, $natureof, $fileName, $connect);
            //    }
            // else
            //    {
            //      echo "File type is incorrrect.";
            //    }
            $result = Model::fillSurgicalForm($user_id,  $address,  $patient_name, $relationship, $accident_date, $how_occured, $injuries, $nature_of_illness, $commence_date, $first_consult_date, $doctor_name, $doctor_address, $hospitalized_date, $discharged_date, $illness_before, $illness_before_years, $sick_injury, $insurer_claims, $nature_of, $opd_form_flag, $surgical_form_flag, $connect);

            if ($result) {
                header('Location:../view/medicalSchemeMember/memFormSubmitSuccessV.php');
            }
            else {
                echo "Failed result";
            }
        }

    }

?>