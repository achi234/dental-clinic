<?php
require_once('./partials/_head.php');
$medicine_id = $_GET['id'];
$record_id = $_GET['record_id'];


global $conn;
$sql = "SELECT soluong FROM KEDON WHERE ID_HOSO = {$record_id} AND ID_Thuoc = {$medicine_id}";
$result = sqlsrv_query($conn, $sql);

$quantity= "";
if(sqlsrv_has_rows($result))
{
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $quantity = $row['soluong'];
}

$medicine_name ="";
$sql = "SELECT tenthuoc FROM Thuoc WHERE ID_Thuoc = {$medicine_id}";
$result = sqlsrv_query($conn, $sql);
if(sqlsrv_has_rows($result))
{
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $medicine_name = $row['tenthuoc'];
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
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Please Fill All Fields</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" action="../../Controller/AdminController/update_prescribe.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <input type="hidden" name="id_hoso" class="form-control" readonly value="<?php echo $record_id?>">
                                        <input type="hidden" name="id_thuoc" class="form-control" readonly value="<?php echo $medicine_id?>">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Name</label>
                                            <input type="text" name="medicine_name" class="form-control" class="form-cotrol" value="<?php echo $medicine_name?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Quantity</label>
                                            <input type="number" name="soluong" class="form-control" value="<?php echo $quantity?>">
                                        </div>

                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updatePrescribe" value="Update" class="btn-control btn-control-add">
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