<?php
    require "../header.php";
    require "hamSideNavV.php";
?>

<main>
    <link rel="stylesheet" href="../assests/css/main.css">
    
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="hamHomeV.php">Home</a></li>
            <li>Register to medical scheme</li>
        </ul>

<!--         <div class="header">
            <img src="../img/ims.jpg" alt="ims" class="logo">
            <div class="options">
                <a href="hamHomeV.php">Home</a>
                <a href="hamProfileV.php">Profile</a>
                <a href="#">Logout</a>
            </div>
        </div>
 -->
        <div class="content">
            <form action="" method="post">
                <label for="empName">Employee Name</label>
                <input type="text" value=""> <br>
                <label for="empNumber">Employee Number</label>
                <input type="text" value=""> <br>
                <label for="designation">Designation</label>
                <input type="text" value=""> <br>
                Enter department
                <select name="department" id="">
                    <option value="">Select department</option>
                    <option value="CS">CS</option>
                    <option value="IS">IS</option>
                    <option value="SE">SE</option>
                </select> <br>
                <label for="healthCondition">Enter health condition</label>
                <input type="text" value=""> <br>
                Enter civil status
                <select name="civilstatus" id="">
                    <option value="married">Married</option>
                    <option value="unmarried">Unmarried</option>
                </select> <br>
                Select Medical Scheme
                <select name="medical scheme" id="">
                    <option value="">Select Scheme</option>
                    <option value="scheme1">Scheme 1</option>
                    <option value="scheme2">Scheme 2</option>
                    <option value="scheme3">Scheme 3</option>
                </select> <br>
            </form>
            <a href="hamRegisterSuccessV.php"><button type="submit" name="registerMedicalScheme-submit">Register</button></a><br>
        </div>
    </div>
</main>
        
<?php
    require_once('../include/footer.php');
?>