<?php
require_once('./partials/_head.php');
$pageSize = 20;
$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// $appointments = getTopAppt('10');
// $records = getTopRecord('10');
$dentists = getTopDentist('10');
$staffs = getTopStaff('10');
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
                            <p class="recent__heading-title">Dentist List</p>
                            <a href="dentists.php" class="btn-control btn-control-search">See all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Phone Number</th> 
                                        <th class="text-column" scope="col">FULL NAME</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($dentists['data']);
                                    //echo $dentists['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($dentists['data'] as $dentist) 
                                        {  
                                        ?>
                                    <tr>
                                        <?php
                                        //$dentist_phone = $dentists['data']['ID_Payment'];
                                        $dentist_detail = getbyKeyValue('NHASI', 'SDT_NS', $dentist['SDT_NS']);
                                        ?>
                                        <th class="text-column-emphasis" scope="row"><?php echo $dentist_detail['data']['SDT_NS']?></th>
                                        <th class="text-column" scope="row"><?php echo $dentist_detail['data']['HoTen_NS']?></th> 
                                        <?php  $dentist_status = getbyKeyValue('TAIKHOAN', 'SDT', $dentist['SDT_NS']);
                                            if($dentist_status['data']['isActive'] == 'YES') 
                                        {?>
                                            <th class="text-column" scope="row">
                                                <span class="badge badge-success">Active</span>
                                            </th> 
                                        <?php
                                        }
                                            else
                                            {
                                            ?>
                                            <th class="text-column" scope="row">
                                                <span class="badge badge-unsuccess">Deleted</span>
                                            </th> 
                                            <?php
                                            }
                                        ?> 
                                    </tr>
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
                            <p class="recent__heading-title">Staff List</p>
                            <a href="staffs.php" class="btn-control btn-control-search">See all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Phone</th> 
                                        <th class="text-column" scope="col">FULL NAME</th> 
                                        <th class="text-column" scope="col">Status</th>  
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($staffs['data']);
                                    //echo $staffs['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($staffs['data'] as $staff) 
                                        {  
                                        ?>
                                    <tr>
                                        <?php
                                        $staff_detail = getbyKeyValue('NHANVIEN', 'SDT_NV', $staff['SDT_NV']);
                                        ?>
                                        <th class="text-column-emphasis" scope="row"><?php echo $staff_detail['data']['SDT_NV']?></th>
                                        <th class="text-column" scope="row"><?php echo $staff_detail['data']['HoTen_NV']?></th> 
                                        <?php  $staff_status = getbyKeyValue('TAIKHOAN', 'SDT', $staff['SDT_NV']);
                                            if($staff_status['data']['isActive'] == 'YES') 
                                        {?>
                                            <th class="text-column" scope="row">
                                                <span class="badge badge-success">Active</span>
                                            </th> 
                                        <?php
                                        }
                                            else
                                            {
                                            ?>
                                            <th class="text-column" scope="row">
                                                <span class="badge badge-unsuccess">Deleted</span>
                                            </th> 
                                            <?php
                                            }
                                        ?>  
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
    </div>
  <!-- Argon Scripts -->

</body>
</html>