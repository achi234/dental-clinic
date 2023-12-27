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
                                        <!-- <div class="form-col">
                                            <label for="" class="form-col__label">Select Treatment Id</label>
                                            <select name="select_id" id="selectId" class="form-cotrol" onchange="getSelect(this.value)">
                                                <option value="" class="">1</option>
                                                <option value="" class="">2</option>
                                            </select>
                                        </div> -->

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Id</label>
                                            <input type="text" name="paitent_id" class="form-control" readonly value>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Treatment Id</label>
                                            <select name="treatment_id" id="treatmentId" class="form-cotrol" onchange="getTreatment(this.value)">
                                                <option value="" class="">1</option>
                                                <option value="" class="">2</option>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Id</label>
                                            <select name="dentist_id" id="dentistId" class="form-cotrol" onchange="getDentist(this.value)">
                                                <option value="" class="">1</option>
                                                <option value="" class="">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Tooth Surface</label>
                                            <select name="surface_id" id="surfaceId" class="form-cotrol" onchange="getTreatment(this.value)">
                                                <option value="" class="">D</option>
                                                <option value="" class="">L</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Tooth Id</label>
                                            <select name="tooth_id" id="toothId" class="form-cotrol" onchange="getTreatment(this.value)">
                                                <option value="" class="">1</option>
                                                <option value="" class="">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Time</label>
                                            <input type="text" name="select_datetime" class="form-control" value>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Return Days</label>
                                            <input type="text" name="select_returndays" class="form-control" value>
                                        </div>
<!--                                         
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Select Treatment Status</label>
                                            <select name="select_status" id="selectStatus" class="form-cotrol" onchange="getStatus(this.value)">
                                                <option value="" class=""></option>
                                                <option value="" class="">Tái khám</option>
                                            </select>
                                        </div> -->

                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="addSelect" value="Add Select Treatment" class="btn-control btn-control-add" value="">
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