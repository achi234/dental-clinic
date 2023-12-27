<?php
// session_start();
// include('config/config.php');
// include('config/checklogin.php');
// check_login();
require_once('./partials/_head.php');
// require_once('./partials/_analytics.php');
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
                            <form method="POST" class="">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Id</label>
                                            <select name="dentist_id" id="dentistId" class="form-cotrol" onchange="getDentist(this.value)">
                                                <option value="" class="">Select Dentist</option>
                                                <option value="" class="">1</option>
                                                <option value="" class="">2</option>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Id</label>
                                            <select name="paitent_id" id="ptId" class="form-cotrol" onchange="getPaintent(this.value)">
                                                <option value="" class="">Select Paitent</option>
                                                <option value="" class="">1</option>
                                                <option value="" class="">2</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Room</label>
                                            <select name="room_id" id="roomId" class="form-cotrol" onchange="getRoom(this.value)">
                                                <option value="" class="">Select Room</option>
                                                <option value="" class="">R01</option>
                                                <option value="" class="">R02</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Appointment Date</label>
                                            <input type="text" name="appt_date" class="form-control" value>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Appointment Time</label>
                                            <input type="text" name="appt_time" class="form-control" value>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Appointment Status</label>
                                            <select name="appt_status" id="apptStatus" class="form-cotrol" onchange="getStatus(this.value)">
                                                <option value="" class="">Mới</option>
                                                <option value="" class="">Tái khám</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="updateAppt" value="Update Appointment" class="btn-control btn-control-add" value="">
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