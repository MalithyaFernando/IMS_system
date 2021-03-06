<?php

  session_start();
  require_once('../../config/database.php');
  require_once('../../model/memModel/claimFormModel.php');
?>

<?php

    $errors = array();
    $user_id = '';
    $claim_form_no = '';
    $claim_form_no = mysqli_real_escape_string($connect, $_GET['claim_form_no']);
    $submit_date = claimFormModel::getSubmitDate($claim_form_no, $user_id, $connect);
    $sub_date = mysqli_fetch_array($submit_date);
    $date = $sub_date[0];

    if (isset($_POST['update-form'])) {
        $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);

        $userInfo = array(  'address'=>255,  'how_occured'=>255, 
                            'injuries'=>255, 'nature_of_illness'=>255, 'doctor_name'=>255, 'doctor_address'=>255, 
                            'illness_before'=>255, 'illness_before_years'=>255,'sick_injury'=>255, 'insurer_claims'=>255, 'nature_of'=>255);
		
		foreach ($userInfo as $info=>$maxLen) 
		{
           
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
            $updated_date = date('y-m-d');

            $file = $_FILES['file'];
            $file_name = $_FILES['file']['name'];
            $file_tmp_name = $_FILES['file']['tmp_name'];
            $file_error = $_FILES['file']['error'];
            $file_type = $_FILES['file']['type'];      

            $file_ext = explode('.',$file_name);
            $file_actual_ext = strtolower(end($file_ext));

            $allowed = array('jpg','jpeg','png','pdf');
            

            if(in_array($file_actual_ext,$allowed))
              {
                if($file_error === 0){
                   $file_name_new = $user_id."-sur-".$claim_form_no.".".$file_actual_ext;
                   $file_name_db = $user_id."-sur-".$claim_form_no;
                   $file_destination = '../../view/assests/claimforms/surgical/'.$file_name_new;
                   move_uploaded_file($file_tmp_name, $file_destination);
                   $result = claimFormModel::updateSurgicalForm($user_id, $claim_form_no, $address,  $patient_name, $relationship, $accident_date, $how_occured, $injuries, $nature_of_illness, $commence_date, $first_consult_date, $doctor_name, $doctor_address, $hospitalized_date, $discharged_date, $illness_before, $illness_before_years, $sick_injury, $insurer_claims, $nature_of, $file_name_db, $updated_date,$connect);

                }
                else{
                  header('Location:../../view/medicalSchemeMember/memFailedToFetch.php');
                }
              }
              else{
                header('Location:../../view/medicalSchemeMember/memFailedToFetch.php');
              }

            if ($result) {
                header('Location:../../view/medicalSchemeMember/memFormUpdateSuccessV.php');
            }
            else{
              header('Location:../../view/medicalSchemeMember/memFailedToFetch.php');
            }
        }

    }

?>