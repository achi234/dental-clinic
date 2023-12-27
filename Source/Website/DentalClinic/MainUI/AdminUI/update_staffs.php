<?php
// session_start();
// include('config/config.php');
// include('config/checklogin.php');
// check_login();
require_once('./partials/_head.php');
// require_once('./partials/_analytics.php');

$staff_id = $_GET['id'];
$staff = getbyKeyValue('USER_DENTAL', 'ID_User', $staff_id);
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
                            <form method="POST" action="../../Controller/AdminController/update_staff.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                        <input type="hidden" name="staff_id" value="<?php echo $staff['data']['ID_User']; ?>">
                                            <label for="" class="form-col__label">Staff Name</label>
                                            <input type="text" name="staff_name" class="form-control" value="<?php echo $staff['data']['Fullname']?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="staff_gender" class="form-col__label">Gender</label>
                                            <select name="staff_gender" id="ptGender" class="form-cotrol">
                                                <?php if($staff['data']['Gender'] == 'F')
                                                { ?>
                                                    <option value="M" >Male</option>
                                                    <option value="F" selected>Female</option>
                                                <?php 
                                                } 
                                                else
                                                { ?>
                                                    <option value="M" selected>Male</option>
                                                    <option value="F" >Female</option>
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
                                            <label for="" class="form-col__label">Staff Address</label>
                                            <input type="text" name="staff_address" class="form-control" value="<?php echo $staff['data']['CurrAddress']?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Phone Number</label>
                                            <input type="text" name="staff_phone" class="form-control" value="<?php echo $staff['data']['PhoneNumber']?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Username</label>
                                            <input type="text" name="user_name" class="form-control" value="<?php echo $staff['data']['Username']?>" readonly>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Password</label>
                                            <input type="password" name="password" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateStaff" value="Update Staff" class="btn-control btn-control-add">
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