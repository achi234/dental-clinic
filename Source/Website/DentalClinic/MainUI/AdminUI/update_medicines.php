<?php
require_once('./partials/_head.php');
$medicine_id = $_GET['id'];
$medicine = getbyKeyValue('THUOC', 'ID_THUOC', $medicine_id);
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
                                        <input type="hidden" name="medicine_id"
                                            value="<?php echo $medicine['data']['ID_THUOC']; ?>">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Name</label>
                                            <input type="text" name="medicine_name" class="form-control"
                                                value="<?php echo $medicine['data']['TenThuoc']; ?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Price ($)</label>
                                            <input type="text" name="medicine_price" class="form-control"
                                                value="<?php echo $medicine['data']['GIATHUOC']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-col">
                                        <label for="" class="form-col__label">Unit</label>
                                        <input type="text" name="donvitinh" placeholder="Enter..." class="form-control"
                                            value="<?php echo $medicine['data']['DONVITINH']; ?>">
                                    </div>
                                    <div class="form-col">
                                        <label for="" class="form-col__label">Dosage</label>
                                        <input type="text" name="chidinh" placeholder="Enter..." class="form-control"
                                            value="<?php echo $medicine['data']['CHIDINH']; ?>">
                                    </div>
                                    <div class="form-col">
                                        <label for="" class="form-col__label">Quantity in Stock</label>
                                        <input type="text" name="soluongton" placeholder="Enter..." class="form-control"
                                            value="<?php echo $medicine['data']['SOLUONGTON']; ?>">
                                    </div>

                                    <div class="form-col">
                                        <label for="" class="form-col__label">Expiration Date</label>
                                        <input type="date" name="ngayhethan" placeholder="Enter..." class="form-control"
                                            value="<?php echo $medicine['data']['NGAYHETHAN']->format('Y-m-d'); ?>">
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateMedicine" value="Update Medicine"
                                                class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php
        require_once('./partials/_footer.php');
        ?>
    </div>
</body>

</html>