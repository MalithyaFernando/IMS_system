<?php
    require '../basic/topnav.php';
?>

<main>
    <title>Users</title>

    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="aHomeV.php">Home</a></li>
            <li>User List</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'aSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Users in IMS System</h2>
                </div>

                <table id="tableStyle" class="mytable">
                    <tr>
                        <th>Employee Id</th>
                        <th>Initials</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Telephone</th>
                        <th>Date of Birth</th>
                        <th>Designation</th>
                        <th>Appointment Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php echo $_SESSION['user_list'] ?>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- <?php
    // require '../basic/footer.php';
?> -->