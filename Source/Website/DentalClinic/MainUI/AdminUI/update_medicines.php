<?php
require_once('./partials/_head.php');
$medicine_id = $_GET['id'];
$medicine = getbyKeyValue('MEDICINE', 'ID_Medicine', $medicine_id);
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
                            <form method="POST" action="../../Controller/AdminController/update_medicine.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <input type="hidden" name="medicine_id" value="<?php echo $medicine['data']['ID_Medicine']; ?>">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Name</label>
                                            <input type="text" name="medicine_name" class="form-control" value="<?php echo $medicine['data']['MedicineName']; ?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Price ($)</label>
                                            <input type="text" name="medicine_price" class="form-control" value="<?php echo $medicine['data']['Price']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateMedicine" value="Update Medicine" class="btn-control btn-control-add">
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