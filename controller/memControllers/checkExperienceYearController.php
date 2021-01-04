<?php
    session_start();
    require_once('../../config/database.php');
    require_once('../../model/memModel/memModel.php');
?>

<?php
    
     if(isset($_POST['yes-submit'])){
         $user_id = mysqli_real_escape_string($connect, $_GET['user_id']);
         $scheme_name = memModel::getSchemeName($user_id, $connect);
         $s_name = mysqli_fetch_array($scheme_name);
         $name = $s_name[0];
        
         $diff = memModel::getDateDiffFromJoin($user_id, $connect);
         $appoint_diff = mysqli_fetch_array($diff);
         $date_diff = (int)$appoint_diff[0];

         $mem_type = memModel::checkMemberType($user_id, $connect);
         $m_type = mysqli_fetch_array($mem_type);
         $type = $m_type[0];
         echo $type;
         $_SESSION['user_id'] = $user_id;
        


         if($date_diff>=730){
             $_SESSION['scheme'] = $name;
             header('Location:selectSchemeController.php'); 
         }
         else{
             $_SESSION['scheme_name'] = $name;
             header('Location:../../view/medicalSchemeMember/memAssignSchemeThreeV.php');
         }
     }
?>