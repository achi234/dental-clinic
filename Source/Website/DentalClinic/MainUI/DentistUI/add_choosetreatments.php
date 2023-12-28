<?php
require_once('./partials/_head.php');
$select_id = $_GET['id'];
$treatments = getAll('TREATMENT');
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
                            <form method="POST" action="../../Controller/DentistController/add_choosetreatment.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Select Id</label>
                                            <input type="text" name="select_id" class="form-control" readonly value="<?php echo $select_id?>">
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Treatment Id</label>
                                            <select name="treatment_id" id="treatmentId" class="form-cotrol">
                                            <?php  foreach($treatments['data'] as $treatment) 
                                            {  
                                            ?>
                                                <option value="<?php echo $treatment['ID_Treatment']?>" class=""><?php echo $treatment['ID_Treatment']?></option>
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
                                            <label for="" class="form-col__label">Price ($)</label>
                                            <input type="number" name="choosetreatment_price" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-choosetreatment" value="Add Choose Treatment" class="btn-control btn-control-add" value="">
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