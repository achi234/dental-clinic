<?php
require_once('./partials/_head.php');
$pageSize = 20;
$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$appointments = getTopAppt('10');
$records = getTopRecord('10');
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
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Recent Appointments</p>
                            <a href="appointments.php" class="btn-control btn-control-search">See all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th class="text-column-emphasis" scope="col">Appointment Id</th> 
                                        <th class="text-column" scope="col">Dentist</th> 
                                        <th class="text-column" scope="col">Customer</th>
                                        <th class="text-column" scope="col">Date</th> 
                                        <th class="text-column" scope="col">Time</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($appointments['data']);
                                    //echo $appointments['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($appointments['data'] as $appointment) 
                                        {  
                                            $dentist = getbyKeyValue('NHASI','SDT_NS', $appointment['SDT_NS']);
                                            $customer = getbyKeyValue('KHACHHANG','SDT_KH', $appointment['SDT_KH']);
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $appointment['ID_CuocHen']?></th>
                                        <th class="text-column" scope="row"><?php echo $dentist['data']['HoTen_NS']?></th>
                                        <th class="text-column" scope="row"><?php echo $customer['data']['HoTen_KH']?></th> 
                                        <?php
                                            $appt_date = $appointment['Ngay']->format('d-m-Y');
                                            $appt_time = $appointment['Gio']->format('H:i');
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $appt_date?></th>   
                                        <th class="text-column" scope="row"><?php echo $appt_time?></th>                                        
                                    </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {?>
                                       <th class="text-column" scope="row"><?php echo 'No Data Found'?></th> 
                                    <?php    
                                    }
                                    ?>                                
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Recent Patient Record</p>
                            <a href="patients.php" class="btn-control btn-control-search">See all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th class="text-column-emphasis" scope="col">Patient Id</th> 
                                        <th class="text-column" scope="col">Dentist</th> 
                                        <th class="text-column" scope="col">Customer</th> 
                                        <th class="text-column" scope="col">Date created</th> 
                                        <th class="text-column" scope="col">Total</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($records['data']);
                                    //echo $records['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($records['data'] as $record) 
                                        { 
                                            $dentist = getbyKeyValue('NHASI','SDT_NS', $record['SDT_NS']);
                                            $customer = getbyKeyValue('KHACHHANG','SDT_KH', $record['SDT_KH']);
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $record['ID_HoSo']?></th>
                                        <th class="text-column" scope="row"><?php echo $dentist['data']['HoTen_NS']?></th>
                                        <th class="text-column" scope="row"><?php echo $customer['data']['HoTen_KH']?></th> 
                                        <th class="text-column" scope="row"><?php echo $record['NgayTaoHoSo']->format('d-m-Y')?></th> 
                                        <!-- <th class="text-column" scope="row"><?php //echo $record['PhiKham']?></th> 
                                        <th class="text-column" scope="row"><?php //echo $record['ID_DichVu']?></th> 
                                        <th class="text-column" scope="row"><?php //echo $record['TongTienThuoc']?></th>  -->
                                        <th class="text-column" scope="row"><?php echo $record['TongTien']?></th> 
                                    </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {?>
                                       <th class="text-column" scope="row"><?php echo 'No Data Found'?></th> 
                                    <?php    
                                    }
                                    ?>
                                </tbody>
                            </table>

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
  <!-- Argon Scripts -->

</body>
</html>