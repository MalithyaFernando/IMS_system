<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Update Password</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="msmHomeV.php">Home</a></li>
            <li><a href="../../controller/basicControllers/viewProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>">My Profile</a></li>
            <li><a href="../../controller/basicControllers/updateProfileController.php?user_id=<?php echo $_SESSION['userId'] ?>">Update Profile</a></li>
            <li class="active">Update Password</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require '../medicalSchemeMaintainer/msmSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Update Password</h2>
                </div>

                <div class="signupForm">
                    <?php
    					require '../basic/updatePwd.php';
					?>
                    <a href="msmHomeV.php">
                        <button type="submit" class="cancelbtn">Cancel</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require "../basic/footer.php";
?>