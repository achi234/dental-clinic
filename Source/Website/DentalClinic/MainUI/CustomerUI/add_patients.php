<?php
require_once('./partials/_head.php');
$services = getAll('DICHVU');
$customers = getAll('KHACHHANG');
$dentists = getAll('NHASI');
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
                            <form method="POST" action="../../Controller/StaffController/add_patient.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer</label>
                                            <select name="customer_phone" class="form-cotrol">
                                            <option>Select customer</option>
                                            <?php  foreach($customers['data'] as $customer) 
                                            {  
                                            ?>
                                                <option value="<?php echo $customer['SDT_KH']?>" class=""><?php echo $customer['HoTen_KH'];
                                                                                                              echo " (PhoneNum = {$customer['SDT_KH']})"?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist</label>
                                            <select name="dentist_phone" class="form-cotrol">
                                            <option>Select dentist</option>
                                            <?php  foreach($dentists['data'] as $dentist) 
                                            {  
                                            ?>
                                                <option value="<?php echo $dentist['SDT_NS']?>" class=""><?php echo $dentist['HoTen_NS'];
                                                                                                              echo " (PhoneNum = {$dentist['SDT_NS']})"?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Created</label>
                                            <input type="date" name="ngay_tao" placeholder="dd/mm/yyyy" class="form-control">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Service</label>
                                            <select name="id_dichvu" class="form-cotrol">
                                            <option>Enter service</option>
                                            <?php  foreach($services['data'] as $service) 
                                            {  
                                            ?>
                                                <option value="<?php echo $service['ID_DichVu']?>" class=""><?php echo $service['TenDV'];
                                                                                                              echo " (Id = {$service['ID_DichVu']})"?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>

                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Examination Fee</label>
                                            <input type="text" name="phi_kham" placeholder="Enter amount" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-patient" value="Add Record" class="btn-control btn-control-add">
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