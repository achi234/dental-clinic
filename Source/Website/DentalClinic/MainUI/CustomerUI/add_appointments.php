<?php
require_once('./partials/_head.php');
//$dentists = getIdbyUserType('TAIKHOAN', 'Dentist');
$dentists = getAll('NHASI');
$patients = getAll('KHACHHANG');
//$rooms = getAll('ROOM');
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
                            <form method="POST" action="../../Controller/StaffController/add_appointment.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Name</label>
                                            <select name="SDT_NS" class="form-cotrol">
                                            <option>Select dentist</option>
                                            <?php
                                                $count = sizeof($dentists['data']);
                                                if($count > 0)
                                                {
                                                ?>
                                                    <?php  foreach($dentists['data'] as $dentist) 
                                                    {  
                                                    ?>
                                                <option value="<?php echo $dentist['SDT_NS']?>" class=""><?php echo $dentist['SDT_NS'];
                                                                                                              echo " (HoTen = {$dentist['HoTen_NS']})" ?></option>
                                                <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <th class="text-column" scope="row"><?php echo 'No Data Found'?></th> 
                                                    <?php
                                                }
                                            ?>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Patient Id</label>
                                            <select name="SDT_KH" class="form-cotrol">
                                            <option>Select patient</option>
                                            <?php
                                                $count = sizeof($patients['data']);
                                                if($count > 0)
                                                {
                                                ?>
                                                    <?php  foreach($patients['data'] as $patient) 
                                                    {  
                                                    ?>
                                                <option value="<?php echo $patient['SDT_KH']?>" class=""><?php echo $patient['SDT_KH'];
                                                                                                              echo " (HoTen = {$patient['HoTen_KH']})" ?></option>
                                                <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <th class="text-column" scope="row"><?php echo 'No Data Found'?></th> 
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
                                            <label for="" class="form-col__label">Appointment Date</label>
                                            <input type="date" name="appt_date" class="form-control" value>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Appointment Time</label>
                                            <input type="time" name="appt_time" class="form-control" value>
                                        </div>

                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-appt" value="Add Appointment" class="btn-control btn-control-add">
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