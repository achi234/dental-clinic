<?php
require_once('./partials/_head.php');

$patient_id = $_GET['id'];
$patient = getbyKeyValue('HOSOKHACHHANG', 'ID_HoSo', $patient_id);
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
                            <form method="POST" action="../../Controller/AdminController/update_patient.php">
                            <input type="hidden" name="patient_id" value="<?php echo $patient['data']['ID_HoSo']; ?>">
                            <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer Phone</label>
                                            <input type="text" name="customer_phone" placeholder="Enter..." class="form-control"
                                            value="<?php echo $patient['data']['SDT_KH']; ?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Phone</label>
                                            <input type="text" name="dentist_phone" placeholder="Enter..." class="form-control"
                                            value="<?php echo $patient['data']['SDT_NS']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Created</label>
                                            <input type="date" name="ngay_tao" placeholder="dd/mm/yyyy" class="form-control"
                                            value="<?php echo $patient['data']['NgayTaoHoSo']->format('d-m-Y'); ?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Service ID</label>
                                            <input type="text" name="id_dichvu" placeholder="Enter service id" class="form-control"
                                            value="<?php echo $patient['data']['ID_DichVu']; ?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Phi Kham</label>
                                            <input type="text" name="phi_kham" placeholder="Enter amount" class="form-control"
                                            value="<?php echo $patient['data']['PhiKham']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updatePatient" value="Update Patient" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
                <!-- </form> -->
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
