<?php
require_once('./partials/_head.php');
$appointment_id = $_GET['id'];
$appointment = getbyKeyValue('APPOINTMENT', 'ID_Appointment', $appointment_id);

$dentists = getbyUserType('USER_DENTAL', 'Dentist');
$customer = getbyKeyValue('CUSTOMER', 'ID_Customer', $appointment['data']['ID_Customer']);
//print_r($dentists);
$rooms = getAll('ROOM');

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
                            <form method="POST" action="../../Controller/StaffController/update_appointment.php">
                            <input type="hidden" name="appointment_id" value="<?php echo $appointment['data']['ID_Appointment']; ?>">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Name</label>
                                            <select name="dentist_id" class="form-control">
                                                <?php foreach ($dentists['data'] as $dentist) 
                                                { 
                                                    if($dentist['ID_User'] == $appointment['data']['ID_Dentist'])
                                                    {?>
                                                    <option value="<?php echo $dentist['ID_User']; ?>" selected> <?php echo $dentist['Fullname'];
                                                                                                              echo " (ID_Dentist = {$dentist['ID_User']})" ?></option>
                                                <?php 
                                                    }
                                                    else
                                                    { ?>
                                                    <option value="<?php echo $dentist['ID_User']; ?>"> <?php echo $dentist['Fullname'];
                                                                                                              echo " (ID_Dentist = {$dentist['ID_User']})" ?></option>
                                                <?php
                                                    } 
                                                }?>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Patient Name</label>
                                            <input type="text" name="customer_name" class="form-control" value="<?php echo $customer['data']['Fullname']?>">
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Room</label>
                                            <select name="room_id" id="roomId" class="form-cotrol">
                                            <?php foreach ($rooms['data'] as $room) 
                                                { 
                                                    if($room['ID_Room'] == $appointment['data']['ID_Room'])
                                                    {?>
                                                    <option value="<?php echo $room['ID_Room']; ?>" selected> <?php echo $room['ID_Room'];
                                                                                                              echo " (Floor = {$room['Floorr']})" ?></option>
                                                <?php 
                                                    }
                                                    else
                                                    { ?>
                                                    <option value="<?php echo $room['ID_Room']; ?>"> <?php echo $room['ID_Room'];
                                                                                                              echo " (Floor = {$room['Floorr']})" ?></option>
                                                <?php
                                                    } 
                                                }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">
                                <?php
                                            $appt_date = $appointment['data']['Date_Appt']->format('Y-m-d');
                                            $appt_time = $appointment['data']['Time_Appt']->format('H:i');
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
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Appointment Status</label>
                                            <select name="appt_status" id="apptStatus" class="form-cotrol">
                                            <?php if($staff['data']['Status_Appt'] == 'New')
                                                { ?>
                                                    <option value="Reassess" >Reassess</option>
                                                    <option value="New" selected>New</option>
                                                <?php 
                                                } 
                                                else
                                                { ?>
                                                    <option value="Reassess" selected>Reassess</option>
                                                    <option value="New" >New</option>
                                                <?php 
                                                } 
                                                ?> 
                                            </select>
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