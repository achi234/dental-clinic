<?php
require_once('./partials/_head.php');
$appointment_id = $_GET['id'];
$appointment = getbyKeyValue('CUOCHEN', 'ID_CuocHen', $appointment_id);

$dentists = getbyKeyValue('NHASI', 'SDT_NS', $appointment['data']['SDT_NS']);
$patients = getAll('KHACHHANG');
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
                            <form method="POST" action="../../Controller/DentistController/update_appointment.php">
                            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Phone</label>
                                            <input type="text" name="dentist_phone" class="form-control" value="<?php echo $dentists['data']['SDT_NS'];?>" readonly>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Patient Name</label>
                                            <select name="customer_phone" class="form-control">
                                                <?php foreach ($patients['data'] as $patient) 
                                                { 
                                                   
                                                    if($patient['SDT_KH'] == $appointment['data']['SDT_KH'])
                                                    {?>
                                                    <option value="<?php echo $patient['SDT_KH']; ?>" selected> <?php echo $patient['HoTen_KH'];
                                                                                                              echo " (PhoneNum = {$patient['SDT_KH']})" ?></option>
                                                <?php 
                                                    }
                                                    else
                                                    { ?>
                                                    <option value="<?php echo $patient['SDT_KH']; ?>"> <?php echo $patient['HoTen_KH'];
                                                                                                              echo " (PhoneNum = {$patient['SDT_KH']})" ?></option>
                                                <?php
                                                    } 
                                                }?>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>

                                <hr class="navbar__divider">
                                <?php
                                            $appt_date = $appointment['data']['Ngay']->format('Y-m-d');
                                            $appt_time = $appointment['data']['Gio']->format('H:i');
                                ?>
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Appointment Date</label>
                                            <input type="date" name="appt_date" class="form-control" value="<?php echo $appt_date;?>">
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Appointment Time</label>
                                            <input type="time" name="appt_time" class="form-control" value="<?php echo $appt_time;?>">
                                        </div>
                                        
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateAppt" value="Update Appointment" class="btn-control btn-control-add">
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