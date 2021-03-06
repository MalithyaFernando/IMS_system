<?php
    require "../basic/topnav.php";
?>

<main>
    <title>Claim Details</title>
        <div class="sansserif"> 
                
                    <ul class="breadcrumbs">
                        <li><a href="memHomeV.php">Home</a></li>
                        <li><a href="memGetClaimDetailsV.php?user_id=<?php echo $_SESSION['userId'] ?>">View Claim Details</a></li>
                        <li class="active">Claim Details</li>
                    </ul>
                
            <div class="row"  style="margin-bottom: 4%;">
                <div class="col left20">
                    <?php 
                        require('memSideNavV.php');
                    ?>
                </div>

                <div class="col right80">
                    <div>
                        <h2>Claim Details</h2>
                    </div>
                    
                    <div class="contentForm">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-25">
                                    <label for="">Scheme</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="scheme" <?php echo 'value="'.$_SESSION['scheme'].'"'?> readonly> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">  
                                    <label for="">Initial Amount</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="initial_amount" <?php echo 'value="'.$_SESSION['initial_amount'].'"'?> readonly> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label for="">Already Used Amount</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="used_amount" <?php echo 'value="'.$_SESSION['used_amount'].'"'?> readonly> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                    <label for="">Remaining Amount</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" name="remain_amount" <?php echo 'value="'.$_SESSION['remain_amount'].'"'?> readonly> <br>
                                </div>
                            </div> 
                        </form>
                    
                        <button class="subbtn" type="submit" name="">
                                <a href="memGetClaimDetailsV.php?user_id=<?php echo $_SESSION['userId'] ?>">View Another</a>
                        </button>
                        <button class="cancelbtn" type="submit" name="">
                                <a href="memHomeV.php">Exit</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php
    require_once('../basic/footer.php');
?>