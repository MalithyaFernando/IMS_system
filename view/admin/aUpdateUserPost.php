<?php
    require '../basic/topnav.php';
?>

<main>
    <div class="sansserif">
        <ul class="breadcrumbs">
            <li><a href="aHomeV.php">Home</a></li>
            <li class="active">Update user of a Post</li>
        </ul>

        <div class="row">
            <div class="col left20">
                <?php
                    require 'aSideNavV.php';
                ?>
            </div>

            <div class="col right80">
                <div>
                    <h2>Update user of a Post</h2>
                </div>

                <div class="contentForm">
                    <form action="../../controller/adminControllers/managePostsC.php" method="post">
                        <div class="row">
                            <div class="col-25">
                              <label>Select the post</label>
                            </div>
                            <div class="col-75">
                                <select name = "post_name">
                                    <?php echo $_SESSION['postNamesList']; ?>
                                </select>
                            </div>
                        </div>

                        <button class="subbtn" type="submit" name="updatePost-submit">Enter</button>
                        <button class="cancelbtn">
                            <a href="aHomeV.php">Cancel</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    require '../basic/footer.php';
?>