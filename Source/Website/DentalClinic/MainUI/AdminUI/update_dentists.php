<?php
require_once('./partials/_head.php');

$dentist_phone = $_GET['id'];
$dentist = getbyKeyValue('TAIKHOAN', 'SDT', $dentist_phone);
$dentist_detail = getbyKeyValue('NHASI', 'SDT_NS', $dentist_phone);
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
                            <form method="POST" action="../../Controller/AdminController/update_dentist.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                        <input type="hidden" name="dentist_phone" value="<?php echo $dentist['data']['SDT']; ?>">
                                            <label for="" class="form-col__label">Dentist Name</label>
                                            <input type="text" name="dentist_name" class="form-control" value="<?php echo $dentist_detail['data']['HoTen_NS']?>">
                                        </div>

                                    </div>
                                </div>
                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Phone</label>
                                            <input type="text" name="dentist_phone" class="form-control" value="<?php echo $dentist['data']['SDT']?>" readonly>
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
                                            <input type="submit" name="btn-updateDentist" value="Update Dentist" class="btn-control btn-control-add">
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