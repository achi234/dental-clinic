
<?php
require_once('./partials/_head.php');
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
        
                            <form method="POST" action="../../Controller/AdminController/add_staff.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Name</label>
                                            <input type="text" name="staff_name" placeholder="Enter your fullname" class="form-control" value>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Gender</label>
                                            <select name="staff_gender" id="staffGender" class="form-cotrol">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Address</label>
                                            <input type="text" name="staff_address" placeholder="Enter your address" class="form-control">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Phone Number</label>
                                            <input type="text" name="staff_phone" placeholder="Enter your phone number" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Username</label>
                                            <input type="text" name="user_name" placeholder="Enter your username" class="form-control">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Password</label>
                                            <input type="text" name="password" placeholder="Enter your password" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-staff" value="Add Staff" class="btn-control btn-control-add" value="">
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