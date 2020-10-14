<main>
    <title>Mark Mahapola Selected Students</title>
    <?php
        require('../basic/header.php');     
    ?>
    
    <div class="header">
        <ul class="breadcrumbs">
            <li><a href="mmHomeV.php">Home</a></li>
            <li>Mark Mahapola Nominated List</li>
        </ul>
    </div>

    <div class="side-nav">
        <?php 
          require('../mahapolaSchemeMaintainer/mmSideNavV.php');
        ?>
    </div>

    <div class="content">
        <div>
            <h4>Mark Mahapola Selected Students</h4>
        </div>

        <form action="" method="POST">

            <input type="radio" id="studentindex" name="student" value="studentindex">
            <label for="studentindex">Search by Student Index</label><br>
            <input type="text" id="studentIndex"><br>

            <input type="radio" id="studentname" name="student" value="studentname">
            <label for="studentname">Search by Student Name</label><br>
            <input type="text" id="studentName">
        
        </form>
        <br>
        <a href="mmStudentDetailsV.php" ><button type="submit" name="" >Display Student's Details</button></a><br>
        <!-- mekedi js function eka check krla tamai display kranna one -->
    </div>
    
    <?php
        require_once('../basic/footer.php');
    ?>

</main>
