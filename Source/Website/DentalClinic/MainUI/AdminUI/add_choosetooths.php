<?php
require_once('./partials/_head.php');
$select_id = $_GET['id'];
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
                            <form method="POST" action="../../Controller/AdminController/add_choosetooth.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Select Id</label>
                                            <input type="text" name="select_id" class="form-control" readonly value="<?php echo $select_id?>">
                                        </div>

                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Tooth Id</label>
                                            <select name="tooth_id" id="toothId" class="form-cotrol">
                                                <option value="1" class="">1</option>
                                                <option value="2" class="">2</option>
                                                <option value="3" class="">3</option>
                                                <option value="4" class="">4</option>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Surface Id</label>
                                            <select name="surface_id" id="surfaceId" class="form-cotrol">
                                                <option value="Lingual" class="">Lingual</option>
                                                <option value="Facial" class="">Facial</option>
                                                <option value="Distal" class="">Distal</option>
                                                <option value="Medial" class="">Medial</option>
                                                <option value="Top" class="">Top</option>
                                                <option value="Root" class="">Root</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Price ($)</label>
                                            <input type="number" name="choosetooth_price" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-choosetooth" value="Add Choose Tooth" class="btn-control btn-control-add">
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