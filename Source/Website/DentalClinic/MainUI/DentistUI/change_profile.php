<?php
    require_once('./partials/_head.php');
    global $conn;
    $sql = "SELECT * FROM NHASI WHERE SDT_NS = {$_SESSION['sdt']['sdt']}";
    $result = sqlsrv_query($conn, $sql);
    
    //echo $sql;
    $name= '';
    $sdt = '';
    if(sqlsrv_has_rows($result))
    {
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $name = $row['HoTen_NS'];
        $sdt = $row['SDT_NS'];
    }
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
                    <div class="display-2">Hello <?php echo $name?></div>
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
                                <form method="POST" action="../../Controller/DentistController/change_profile.php">
                                    <div class="form-row">
                                        <h6 class="heading-small text-muted margin-0">User Information</h6>
                                        
                                        <br class="">

                                        <div class="form-small">

                                            <br class="">

                                            <div class="form-row__flex">
                                                <div class="form-col margin-0">
                                                    <label for="" class="form-col__label">Fullname</label>
                                                    <input type="text" name="fullname" class="form-control" value="<?php echo $name?>">
                                                </div>

                                                <div class="form-col margin-0">
                                                    <label for="" class="form-col__label">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $sdt?>" readonly>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <hr class="navbar__divider">

                                        
                                    </div>
                                    <div class="form-row">
                                        <h6 class="heading-small text-muted">Change Password</h6>
                                        
                                        <br class="">
                                        
                                        <div class="form-small">
                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label">Password</label>
                                                <input type="password" name="new_password" class="form-control">
                                            </div>

                                            <br class="">

                                            <div class="form-col">
                                                <div class="form-col-bottom">
                                                    <input type="submit" name="btn-changeProfile" value="Change Profile" class="btn-control btn-control-add">
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
                                            <img src="../../assets/image/user_avatar.png" alt="" class="rounded-circle">
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
                                <p class="recent__heading-title margin-0">System Dentist</p>
                                <div class="text__profile-email">
                                    <?php echo $name?>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php 
            require_once('./partials/_footer.php'); 
            ?>
        </div>
    </div>

</body>
</html>