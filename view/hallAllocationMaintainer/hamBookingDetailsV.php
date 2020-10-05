<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- <div class="nameLogo"> -->
            <img src="../img/ims.jpg" alt="ims" class="logo">
            <!-- </div> -->
            <div class="options">
                <a href="hamHomeV.php">Home</a>
                <a href="hamProfileV.php">Profile</a>
                <a href="#">Logout</a>
            </div>
        </div>
        <div class="header">breadcrums</div>
        <div class="side-nav">
           

        <!-- <div> -->
                <a href="hamWeeklyTimeTableV.php"><button type="submit" name="" class="button">View Weekly Time Table</button></a><br>
                <a href="hamViewHallAllocationScheduleV.php"><button type="submit" name="" class="button">View Hall Allocation Schedule</button></a><br>
                <a href="hamViewSchemeDetailsV.php"><button type="submit" name="" class="button">View Scheme Details</button></a><br>
                <a href="hamHallDetailsV.php"><button type="submit" name="" class="button">View Hall Details</button></a><br>
                <a href="hamManageWeeklyTimeTableV.php"><button type="submit" name="" class="button">Manage Weekly Time Table</button></a><br>
                <a href="hamManageBookingV.php"><button type="submit" name="" class="button">Manage Booking</button></a><br>
                <a href="hamRegisterToMedicalSchemeV.php"><button type="submit" name="" class="button">Register to the Staff Medical Scheme</button></a><br>
            <!-- </div> -->
        </div>
        <div class="banner">
            <div>
                <h2>Hall Allocation Maintainer</h2>
            </div>
        </div>
        <div class="content">
            <div>
                <h3>Booking</h3>
            </div>
            <form action="" method="POST">
                Enter Date<input type="date" id="" name="enterDate"><br>
                    <select name="hall" id="hall">
                        <option value="">Select a Hall</option>
                        <option value="E401">E401</option>
                        <option value="S104">S104</option>
                        <option value="W001">W001</option>
                    </select>
                    <br>
                    Start Time<input type="time" id="" name="startTime"><br>
                    End Time<input type="time" id="" name="endTime"><br>
            </form>
            <!-- mekath database eken data awilla fill wela tyenna ona -->

            <a href="hamBookingUpdateSaveV.php"><button type="submit" name="bookingUpdateSave-submit">Save Updates</button></a><br>
            <a href="hamBookingRemoveV.php"><button type="submit" name="bookingRemove-submit">Remove</button></a>
            
        </div>
        <div class="footer">
            <?php
                require_once('../include/footer.php');
            ?></div>
    </div>
</body>
</html>