<?php
    require '../basic/topnav.php';
?>

<main>
    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="rvHomeV.php">Home</a></li>
            <li><a href="rvSemesterWiseAttendanceV.php">Semester-wise Attendance</a></li>
            <li class="active">Request Failed!</li>
        </ul>

        <div class="row" style="margin-bottom: 4%;" >
            <div class="col left20">
                <?php
                    require 'rvSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div class="contentForm">
                    <div class="row">
                        <h2>Sorry!
                            No attendance records are available.
                        </h2>
                    </div>

                    <button class="subbtn">
                        <a href="rvSemesterWiseAttendanceV.php">Try again</a> 
                    </button>
                    <button class="cancelbtn">
                        <a href="rvHomeV.php">Exit</a> 
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>