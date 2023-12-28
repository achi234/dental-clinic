<?php
require_once('./partials/_head.php');
$dentists = getIdbyUserType('USER_DENTAL', 'Dentist');
$paitents = getAll('CUSTOMER');
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
                            <form method="POST" action="../../Controller/DentistController/add_appointment.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Name</label>
                                            <select name="dentist_id" id="dentistId" class="form-cotrol" onchange="getDentist(this.value)">
                                            <?php
                                                $count = sizeof($dentists['data']);
                                                if($count > 0)
                                                {
                                                ?>
                                                    <?php  foreach($dentists['data'] as $dentist) 
                                                    {  
                                                    ?>
                                                <option value="<?php echo $dentist['ID_User']?>" class=""><?php echo $dentist['Fullname'];
                                                                                                              echo " (ID_Dentist = {$dentist['ID_User']})" ?></option>
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
                                            <label for="" class="form-col__label">Paitent Id</label>
                                            <input type="number" name="paitent_id" class="form-control">
                                            <!-- <select name="paitent_id" id="ptId" class="form-cotrol" onchange="getPaintent(this.value)"> -->
                                            <?php
                                                // $count = sizeof($paitents['data']);
                                                // if($count > 0)
                                                // {
                                                ?>
                                                    <?php  //foreach($paitents['data'] as $paitent) 
                                                    // {  
                                                    ?>
                                                <!-- <option value="<?php //echo $paitent['ID_Customer']?>" class=""><?php //echo $paitent['ID_Customer']?></option> -->
                                                <?php
                                                //     }
                                                // }
                                                // else
                                                // {
                                                    ?>
                                                    <!-- <th class="text-column" scope="row"><?php //echo 'No Data Found'?></th>  -->
                                                    <?php
                                                //}
                                            ?>
                                            <!-- </select> -->
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Room</label>
                                            <select name="room_id" id="roomId" class="form-cotrol" onchange="getRoom(this.value)">
                                            <?php
                                                $count = sizeof($rooms['data']);
                                                if($count > 0)
                                                {
                                                ?>
                                                    <?php  foreach($rooms['data'] as $room) 
                                                    {  
                                                    ?>
                                                <option value="<?php echo $room['ID_Room']?>" class=""><?php echo $room['ID_Room'];
                                                                                                            echo " (Floor = {$room['Floorr']})" ?></option>
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
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Appointment Status</label>
                                            <select name="appt_status" id="apptStatus" class="form-cotrol">
                                                <option value="New" class="">New</option>
                                                <option value="Reassess" class="">Reassess</option>
                                            </select>
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