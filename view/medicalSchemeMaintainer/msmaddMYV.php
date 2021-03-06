<?php
    require '../basic/topnav.php';
?>

<main>
    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="msmHomeV.php">Home</a></li>
            <li class="active">Add a Medical Year</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'msmSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Add a new Medical Year</h2>
                </div>

                <div class="contentForm">
                    <form action="../../controller/msmControllers/msmManageMedicalYearC.php" method="post">
                        <div class="row">
                            <div class="col-25">
                              <label>Enter Medical Name</label>
                            </div>
                            <div class="col-75">
                              <input type="text" id="" name="medical_year" placeholder="Medical Year" required/><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                              <label>Enter Start Date</label>
                            </div>
                            <div class="col-75">
                              <input type="date" id="start_date" name="start_date" min="<?php echo date("Y-m-d") ?>" placeholder="Start Date" required/><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                              <label>Enter End Date</label>
                            </div>
                            <div class="col-75">
                              <input type="date" id="end_date" name="end_date" min="<?php echo date("Y-m-d") ?>" placeholder="End Date" oninput="checkDate()" required/><br>
                            </div>
                        </div>

                        <button class="subbtn" type="submit" name="addMY-submit">Add Medical Year</button>
                        <button class="cancelbtn">
                            <a href="msmHomeV.php">Cancel</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function checkDate(){
        var sdate = document.getElementById("start_date").value;
        var edate = document.getElementById("end_date").value;

        if(edate < sdate){
            alert("The end date you have entered is a date before the start date that you have entered!");
            document.getElementById("end_date").value = "mm/dd/yyyy";
        }
    }
</script>

<?php
    require '../basic/footer.php';
?>