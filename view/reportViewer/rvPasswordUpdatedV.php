<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Updated Password</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="rvHomeV.php">Home</a></li>
            <li><a href="../../controller/updatePasswordController.php?user_id=<?php echo $_SESSION['userId'] ?>">Update Password</a></li>
            <li class="active">Action Failed!</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'rvSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2></h2>
                </div>
                <div class="contentForm">
                    <div class="row">
                        <h2>Sorry! <br>
                            The Password you entered did not get updated.
                        </h2>
                    </div>

                    <button class="subbtn">
                        <a href="../../controller/updatePasswordController.php?user_id=<?php echo $_SESSION['userId'] ?>">Update Password</a>
                    </button>
                    <button class="cancelbtn">
                        <a href="rvHomeV.php">Leave</a> 
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>