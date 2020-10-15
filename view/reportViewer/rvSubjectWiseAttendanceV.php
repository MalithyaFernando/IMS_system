<main>

    <?php
        require '../basic/header.php';
    ?>

    <div class="header">
        <ul class="breadcrumbs">
            <li><a href="rvHomeV.php">Home</a></li>
            <li>Attendance</li>
            <li>Subjectwise Attendance</li>
        </ul>
    </div>

    <div class="side-nav">
        <?php
            require 'rvSideNavV.php';
        ?>
    </div>

    <div class="content">
        <div>
            <h3>Subject Wise Attendance</h3>
        </div>

        <form action="rvSubjectWiseAttendanceV.php" method="post">
            <input type="text" name="academic_year" placeholder="Academic Year" required />
            <input type="text" name="degree" placeholder="Degree" required />
            <input type="text" name="semester" placeholder="Semester" required />
            <input type="text" name="subject" placeholder="Subject" required />
            <input type="date" name="start_date" placeholder="Start Date" required />
            <input type="date" name="end_date" placeholder="End Date" required />
            <button type="submit" name="select-submit" href="#">Display Attendance</button>
        </form>
    </div>

    <?php
        require '../basic/footer.php';
    ?>
</main>