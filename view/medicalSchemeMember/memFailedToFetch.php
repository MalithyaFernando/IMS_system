<?php
    require "../basic/topnav.php";
?>

<main>
    <title>Unable to Fetch</title>
        <div class="sansserif">
                
                    <ul class="breadcrumbs">
                        <li><a href="memHomeV.php">Home</a></li>
                        <li class="active">Unable To Fetch!</li>
                    </ul>
            <div class="row" style="margin-bottom: 5%;">    

                <div class="col left20">
                    <?php 
                        require('memSideNavV.php');
                    ?>
                </div>

                <div class="col right80">
                    <div class="contentForm">
                        <h2>Unable To Fetch Data...<br>Try Again...</h2>
                        

                        <a href="memHomeV.php"><button class="subbtn" type="submit" name="">Back</button></a>
                        <a href="memHomeV.php"><button class="cancelbtn" type="submit" name="">Exit</button></a>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php
    require_once('../basic/footer.php');
?>