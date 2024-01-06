<?php
// session_start();
// include('config/config.php');
// include('config/checklogin.php');
// check_login();
require_once('./partials/_head.php');
// require_once('./partials/_analytics.php');

$staff_phone = $_GET['id'];
$staff = getbyKeyValue('TAIKHOAN', 'SDT', $staff_phone);
$staff_detail = getbyKeyValue('NHANVIEN', 'SDT_NV', $staff_phone);
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
                                        <input type="hidden" name="staff_phone" value="<?php echo $staff['data']['SDT']; ?>">
                                            <label for="" class="form-col__label">Staff Name</label>
                                            <input type="text" name="staff_name" class="form-control" value="<?php echo $staff_detail['data']['HoTen_NV']?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Status</label>
                                            <select name="staff_status"  class="form-cotrol">
                                            <?php if($staff['data']['isActive'] == 'NO')
                                                { ?>
                                                    <option value="YES" >Yes</option>
                                                    <option value="NO" selected>No</option>
                                                <?php 
                                                } 
                                                else
                                                { ?>
                                                    <option value="YES" selected>Yes</option>
                                                    <option value="NO" >No</option>
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
                                            <label for="" class="form-col__label">Phone</label>
                                            <input type="text" name="staff_phone" class="form-control" value="<?php echo $staff['data']['SDT']?>" readonly>
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