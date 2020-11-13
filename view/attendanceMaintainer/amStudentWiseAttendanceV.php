<?php
    require '../basic/topnav.php';
?>

<main>
    <title>View Student Wise Attendance</title>

    <ul class="breadcrumbs">
        <li><a href="amHomeV.php">Home</a></li>
        <li class="active">View Student Wise Attendance</li>
    </ul>

    <div class="row">
        <div class="col left20">
            <?php
                require 'amSideNavV.php';
            ?>
        </div>

        <div class="col right80">
            <div>
                <h2>Student Wise Attendance</h2>
            </div>
            <div class="contentForm">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-25">
                            <label>Enter Student Index</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="student_index" placeholder="Student Index" /> <br>
                        </div>
                    </div>

                    <button class="subbtn" type="submit" name="select-submit" href="amDisplayAttendanceV.php">Enter</button>
                    <button class="cancelbtn" type="submit" name="cancel-submit">
                        <a href="amHomeV.php">Cancel</a> 
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>