<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Mark Mahapola Selected Students</title>
        <div class="sansserif">
            <ul class="breadcrumbs">
                <li><a href="mmHomeV.php">Home</a></li>
                <li class="active">Mark Mahapola Selected Students</li>
            </ul>
            
            <div class="row" style="margin-bottom: 6%;">
                <div class="col left20">
                    <?php 
                        require('mmSideNavV.php');
                    ?>
                </div>

                <div class="col right80">
                    <div>
                        <h2>Mark Mahapola Selected Students</h2>
                    </div>

                    <div class="contentForm">
                        <form action="../../controller/mmControllers/stuMahapolaDetailsNameController.php" method="POST">
                            <h2>Search by Student Name</h2><br>

                            <div class="row">
                                <div class="col-25">
                                    <label >Intials</label><br>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="student_initials" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label >Surname</label><br>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="student_surname" required>
                                </div>
                            </div>

                            <button class="subbtn" type="submit" name="mark-mahapola-name-submit" >Display Student's Details</button></a>
                            <button type="submit" class="cancelbtn">
                                <a href="mmHomeV.php">Cancel</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php
    require_once('../basic/footer.php');
?>