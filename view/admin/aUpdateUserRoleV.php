<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Update user role</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="aHomeV.php">Home</a></li>
            <li class="active">Update User role</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'aSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Update User role</h2>
                </div>
                <div class="contentForm">
                    <form action="../../controller/adminControllers/manageUserRoleController.php" method="post">
                        <div class="row">
                            <div class="col-25">
                              <label>Select user by user name</label>
                            </div>
                            <div class="col-75">
                                <select name="empid" id="">
                                    <option value="">User Name</option>
                                    <?php echo $_SESSION['userlist'] ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                              <label>Select user role</label>
                            </div>
                            <div class="col-75">
                                <select name="userRole" id="">
                                    <option value="">User Role</option>
                                    <?php echo $_SESSION['userroles'] ?>
                                </select>
                            </div>
                        </div>

                        <button class="mainbtn" type="submit" name="updateUserRole-submit">Save</button>
                    </form>
                    <!-- <form>
                        <form action="../../controller/adminControllers/manageUserRoleController.php" method="post">
                        <button class="subbtn" type="submit" name="userroleList-submit">View Current user roles</button>
                        <a href="aHomeV.php"><button type="submit" name="cancel-submit" class="cancelbtn">Cancel</button></a>
                    </form> -->

                    <form action="../../controller/adminControllers/manageUserRoleController.php" method="post">
                        <button type="submit" name="userroleList-submit" class="subbtn">View Current user roles</button>
                        <button class="cancelbtn">
                            <a href="aHomeV.php">Cancel</a> 
                        </button>
                    </form>

                        <!-- <button id="myBtn" class="cancelbtn">Cancel</button>  -->
                </div>

                <div id="subModal" class="modal">
                    <div class="modal-content">
                        <span class="subclose">&times;</span>
                        <?php
                            require 'aViewUserRolesPopupV.php';
                        ?>
                    </div>
                </div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h1>Are you sure you want to leave the page?</h1>
                        <button class="mainbtn">
                            <a href="aHomeV.php">Yes</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on the button, open the modal
        btn.onclick = function() {
          modal.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        var submodal = document.getElementById("subModal");
        var subbtn = document.getElementById("subBtn");
        var subspan = document.getElementsByClassName("subclose")[0];
        subbtn.onclick = function() {
          submodal.style.display = "block";
        }
        subspan.onclick = function() {
          submodal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
    
</main>

<?php
    require '../basic/footer.php';
?>