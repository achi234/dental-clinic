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
                                            <label for="" class="form-col__label">Paitent Name</label>
                                            <input type="text" name="paitent_name" class="form-control" value="LJCH-7436">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Gender</label>
                                            <select name="paitent_gender" id="ptGender" class="form-cotrol" onchange="getPaitent(this.value)">
                                                <option value="" class="">Select Gender</option>
                                                <option value="" class="">Nam</option>
                                                <option value="" class="">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Phone Number</label>
                                            <input type="text" name="paintent_phone" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Address</label>
                                            <input type="text" name="paitent_address" class="form-control" value="Street 5">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Of Birth</label>
                                            <input type="text" name="paitent_dob" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="addPaitent" value="Add Paitent" class="btn-control btn-control-add" value="">
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