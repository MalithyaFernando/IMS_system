<main>
    <title>Claim Details</title>

    <?php
        require('../basic/header.php');
        
    ?>
        
    <div class="header">
        <ul class="breadcrumbs">
            <li><a href="memHomeV.php">Home</a></li>
            <li><a href="memClaimFormListV.php">Claim Forms</a></li>
            <li>Selected Form</li>
        </ul>
    </div>

    <div class="side-nav">
        <?php 
            require('../medicalSchemeMember/memSideNavV.php');
        ?>
    </div>

    <div class="content">
        <div>
            <h4>Claim Details</h4>
        </div>

        <a href="memClaimFormListV.php"><button type="submit" name="">OK</button></a><br>
    </div>
    
    <?php
        require_once('../basic/footer.php');
    ?>
</main>