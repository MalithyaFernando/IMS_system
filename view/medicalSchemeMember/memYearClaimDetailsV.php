<?php
    require_once('../header.php');
    require_once('memSideNavV.php');
?>

<main>
    <link rel="stylesheet" href="../assests/css/main.css">
    <div class="container">
        <!-- <div class="header">
            <img src="../img/ims.jpg" alt="ims" class="logo">
            <div class="options">
                <a href="memHomeV.php">Home</a>
                <a href="memProfileV.php">Profile</a>
                <a href="#">Logout</a>
            </div>
        </div> -->

        <!-- breadcrumbs -->
        <ul class="breadcrumb">
            <li><a href="memHomeV.php">Home</a></li>
            <li><a href="memGetClaimDetailsV.php">Enter Year</a></li>
            <li>Claim Details</li>
        </ul>

        <div class="banner">
            <div>
                <h2>Medical Scheme Member</h2>
            </div>
        </div>
        <div class="content">
            <div>
                <h4>Claim Details</h4>
            </div>
            <!-- memberge year eke claim details pdf ekak wiidyat show kranna one -->

            <a href="memGetClaimDetailsV.php"><button type="submit" name="">OK</button></a><br>

        </div>
    </div>
</main>

<?php
    require_once('../include/footer.php');
?>