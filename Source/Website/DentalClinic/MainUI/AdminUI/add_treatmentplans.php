<?php
require_once('./partials/_head.php');
$paitent_id = $_GET['id'];
$dentists = getIdbyUserType('USER_DENTAL', 'Dentist');
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
                            <form method="POST" action="../../Controller/AdminController/add_treatmentplan.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Id</label>
                                            <input type="text" name="paitent_id" class="form-control" readonly value='<?php echo $paitent_id?>'>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Id</label>
                                            <select name="dentist_id" id="dentistId" class="form-cotrol" onchange="getDentist(this.value)">
                                            <?php
                                                $count = sizeof($dentists['data']);
                                                if($count > 0)
                                                {
                                                ?>
                                                    <?php  foreach($dentists['data'] as $dentist) 
                                                    {  
                                                    ?>
                                                <option value="<?php echo $dentist['ID_User']; ?>"> <?php echo $dentist['Fullname'];
                                                                                                    echo " (ID_Dentist = {$dentist['ID_User']})"?></option>
                                                <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <th class="text-column" scope="row"><?php echo 'No Data Found'?></th> 
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
                                            <label for="" class="form-col__label">Date Time</label>
                                            <input type="datetime-local" name="select_datetime" class="form-control" value>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Return Days</label>
                                            <input type="number" name="select_returndays" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-select" value="Add Treatment Plan" class="btn-control btn-control-add">
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