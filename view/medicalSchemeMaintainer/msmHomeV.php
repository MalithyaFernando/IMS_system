<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Medical Scheme Maintainer Home Page</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li class="active">Medical Scheme Maintainer Page</li>
        </ul>
        <div class="row">
            <div class="column left">
                <?php
                    require 'msmSideNavV.php';
                ?>
            </div>
            <div class="column middle">
                <h2>Medical Scheme Maintainer Page</h2>
                <div class="home-heading">
                    <img src="../assests/img/cover_final.png" alt="" style="">
                    <h3>Welcome to the Information Management System for the Staff
                    <br>Academic and Publications Division - UCSC</h3>
                 </div>
            </div>
            <div class="column right">
                <div class="imgcontainer">
                    <img src="../assests/img/profile.png" alt="Avatar" style="width:100%">
                </div>
                <div class="btncontainer">
                    <a href="../../controller/basicControllers/viewProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>"><button type="submit" name="" class="signupbtn">My Profile</button></a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require "../basic/footer.php";
?>