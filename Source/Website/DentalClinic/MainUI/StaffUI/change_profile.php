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
            <!-- Header -->
            <div class="heading">
                <div class="col-lg-7">
                    <div class="display-2">Hello System Admin</div>
                    <h2 class="text__profile-intro">This is your profile page. You can customize your profile as you want and also change pasword too</h2>
                </div>
            </div>
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="form-row__flex">
                        <div class="card shadow col-xl-8">
                            <div class="container-recent__heading">
                                <p class="recent__heading-title">My Account</p>
                            </div>
                            
                            <div class="container-recent__body card__body-form">
                                <form method="POST" class="">
                                    <div class="form-row">
                                        <h6 class="heading-small text-muted margin-0">User Information</h6>
                                        
                                        <br class="">

                                        <div class="form-small">
                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label">Email Address</label>
                                                <input type="text" name="customer_email" class="form-control" value="admin@mail.com">
                                            </div>

                                            <br class="">

                                            <div class="form-row__flex">
                                                <div class="form-col margin-0">
                                                    <label for="" class="form-col__label">User Name</label>
                                                    <input type="text" name="user_name" class="form-control" value>
                                                </div>

                                                <div class="form-col margin-0">
                                                    <label for="" class="form-col__label">Phone Number</label>
                                                    <input type="text" name="user_phone" class="form-control" value>
                                                </div>
                                            </div>

                                            <br class="">

                                            <div class="form-col">
                                                <div class="form-col-bottom">
                                                    <a href="" class="btn-control btn-control-add">
                                                        Submit
                                                    </a>
                                                </div>
                                            </div>        
                                        </div>

                                        <hr class="navbar__divider">

                                        
                                    </div>
                                </form>
                                <form method="POST" class="">
                                    <div class="form-row">
                                        <h6 class="heading-small text-muted">Change Password</h6>
                                        
                                        <br class="">
                                        
                                        <div class="form-small">
                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label">Old Password</label>
                                                <input type="text" name="new_password" class="form-control" value>
                                            </div>

                                            <br class="">

                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label">New Password</label>
                                                <input type="text" name="new_password" class="form-control" value>
                                            </div>
                                            
                                            <br class="">

                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label">Confirm New Password</label>
                                                <input type="text" name="" class="form-control" value>
                                            </div>

                                            <br class="">

                                            <div class="form-col">
                                                <div class="form-col-bottom">
                                                    <a href="" class="btn-control btn-control-add">
                                                        Change Password
                                                    </a>
                                                </div>
                                            </div>                
                                        </div>
                                    </div>
                                </form>     
                            </div>
                        </div>
                        <div class="card shadow col-xl-4">
                            <div class="form-row justify-content-center">
                                <div class="form-col order-lg-2">
                                    <div class="card-profile-image">
                                        <a href="#" class="">
                                            <img src="http://localhost/RestaurantPOS/Restro/admin/assets/img/theme/user-a-min.png" alt="" class="rounded-circle">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="container-recent__body card__body-form">
                                <div class="card-profile-status justify-content-center">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="recent__heading-title margin-0">System Admin</p>
                                <div class="text__profile-email">
                                    admin@mail.com
                                </div>
                            </div>
                            
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