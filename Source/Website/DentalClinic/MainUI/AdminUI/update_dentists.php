<?php
require_once('./partials/_head.php');

$dentist_id = $_GET['id'];
$dentist = getbyKeyValue('USER_DENTAL', 'ID_User', $dentist_id);
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
                                        <input type="hidden" name="dentist_id" value="<?php echo $dentist['data']['ID_User']; ?>">
                                            <label for="" class="form-col__label">Dentist Name</label>
                                            <input type="text" name="dentist_name" class="form-control" value="<?php echo $dentist['data']['Fullname']?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="dentist_gender" class="form-col__label">Gender</label>
                                            <select name="dentist_gender" id="ptGender" class="form-cotrol">
                                                <?php if($dentist['data']['Gender'] == 'F')
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
                                            <label for="" class="form-col__label">Dentist Address</label>
                                            <input type="text" name="dentist_address" class="form-control" value="<?php echo $dentist['data']['CurrAddress']?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Phone Number</label>
                                            <input type="text" name="dentist_phone" class="form-control" value="<?php echo $dentist['data']['PhoneNumber']?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Username</label>
                                            <input type="text" name="user_name" class="form-control" value="<?php echo $dentist['data']['Username']?>" readonly>
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