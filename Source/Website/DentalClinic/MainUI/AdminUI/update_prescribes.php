<?php
require_once('./partials/_head.php');
$medicine_id = $_GET['id'];
$record_id = $_GET['record_id'];
?>

<body>
    <!-- Sidebar -->
    <?php
    require_once('./partials/_sidebar.php');
    ?>

    <!-- Main content -->
    <div class="main-content">
        <div class="content">
            <!-- Top navbar -->
            <?php
            require_once('./partials/_topnav.php');
            ?>
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Please Fill All Fields</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" action="../../Controller/AdminController/add_prescribe.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <input type="hidden" name="select_id" class="form-control" readonly value="<?php echo $record_id?>">

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Id</label>
                                            <input type="text" name="medicine_id" class="form-control" class="form-cotrol" value="<?php echo $medicine_id?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" value>
                                        </div>

                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-prescribe" value="Add Medicine" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php 
            require_once('./partials/_footer.php'); 
            ?>
        </div>
    </div>

</body>
</html>