<?php
require_once('./partials/_head.php');
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
                            <form method="POST" action="../../Controller/AdminController/add_medicine.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Name</label>
                                            <input type="text" name="TenThuoc" placeholder="Enter medicine name" class="form-control">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Price ($)</label>
                                            <input type="number" name="GIATHUOC" placeholder="Enter medicine price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-col">
                                            <label for="" class="form-col__label">DONVITINH</label>
                                            <input type="text" name="DONVITINH" placeholder="Enter..." class="form-control">
                                    </div>
                                    <div class="form-col">
                                            <label for="" class="form-col__label">CHIDINH</label>
                                            <input type="text" name="CHIDINH" placeholder="Enter..." class="form-control">
                                    </div>
                                    <div class="form-col">
                                            <label for="" class="form-col__label">SOLUONGTON</label>
                                            <input type="text" name="SOLUONGTON" placeholder="Enter..." class="form-control">
                                    </div>
                                    <div class="form-col">
                                            <label for="" class="form-col__label">NGAYHETHAN</label>
                                            <input type="date" name="NGAYHETHAN" placeholder="Enter..." class="form-control">
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-medicine" value="Add Medicine" class="btn-control btn-control-add">
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