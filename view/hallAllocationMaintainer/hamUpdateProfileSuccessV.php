<?php
    require "../header.php";
    require "hamSideNavV.php";
?>

<main>
    <link rel="stylesheet" href="../assests/css/main.css">
    
    <div class="container">
        <!-- <ul class="breadcrumb">
            <li><a href="hamHomeV.php">Home</a></li>
            <li>Profie updated successfully</li>
        </ul> -->

<!--         <div class="header">
            <img src="../img/ims.jpg" alt="ims" class="logo">
            <div class="options">
                <a href="hamHomeV.php">Home</a>
                <a href="hamProfileV.php">Profile</a>
                <a href="#">Logout</a>
            </div>
        </div> -->

        <div class="content">
            <p>Your profile has been updated successfully..</p>
            <a href="hamProfileV.php"><button type="submit">OK</button></a>
        </div>
    </div>
</main>
        
<?php
    require_once('../include/footer.php');
?>