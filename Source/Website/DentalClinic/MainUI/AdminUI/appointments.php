<?php
$page_title = "Smile - Appointment List";
require_once('./partials/_head.php');

$pageSize = 20;
$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$appointments = getAllWithPagination('CUOCHEN', $pageSize, $pageNumber, 'ID_CuocHen');
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
                    <form action="" method="POST" class="container-recent-inner">
                        <div class="container-recent__heading heading__button">
                            <a href="add_appointments.php" class="btn-control btn-control-add">
                                <i class="fa-regular fa-calendar-plus btn-control-icon"></i>
                                Add new appointment
                            </a>

                            <div class="pagination">
                                <?php
                                    $totalPages = ceil($appointments['total'] / $pageSize);
                                    $maxPagesToShow = 4;
                                    $halfMax = floor($maxPagesToShow / 2);

                                    // Hiển thị nút Previous
                                    if ($pageNumber > 1) {
                                        echo '<a href="?page=' . ($pageNumber - 1) . '">&laquo;</a>';
                                    } else {
                                        echo '<a class="disabled" href="#">&laquo;</a>';
                                    }

                                    // Hiển thị các nút trang
                                    for ($i = max(1, $pageNumber - $halfMax); $i <= min($totalPages, $pageNumber + $halfMax); $i++) {
                                        echo '<a class="' . ($i == $pageNumber ? 'active' : '') . '" href="?page=' . $i . '">' . $i . '</a>';
                                    }

                                    // Hiển thị nút Next
                                    if ($pageNumber < $totalPages) {
                                        echo '<a href="?page=' . ($pageNumber + 1) . '">&raquo;</a>';
                                    } else {
                                        echo '<a class="disabled" href="#">&raquo;</a>';
                                    }
                                ?>
                            </div>
                            <?php
                                $strKeyword = null;

                                if(isset($_POST["btn-search"]))
                                {
                                    $strKeyword = $_POST["search_text"];
                                    $appointments = searchByKeyword('CUOCHEN', $strKeyword);
                                }
                                else
                                {
                                    $appointments = getAllWithPagination('CUOCHEN', $pageSize, $pageNumber, 'ID_CuocHen');
                                }
                            ?>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by code, room..." name="search_text" value="<?php echo $strKeyword;?>">
                                <button class="btn-control btn-control-search" name="btn-search">
                                    <i class="fa-solid fa-magnifying-glass btn-control-icon"></i>
                                    Search
                                </button>      
                            </div>
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
                                        <th class="" scope="col"></th> 
                                        <!-- <th class="text-column" scope="col">Status</th>  -->
                                        <th class="text-column" scope="col">ACTIONS</th> 
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
                                        <th class="text-column" scope="row">
                                        
                                        <?php /*if($appointment['Status_Appt'] == 'New') 
                                        {?>
                                            <th class="text-column" scope="row">
                                                <span class="badge badge-success">New</span>
                                            </th> 
                                        <?php
                                        }
                                            else
                                            {
                                            ?>
                                            <th class="text-column" scope="row">
                                                <span class="badge badge-unsuccess">Reassess</span>
                                            </th> 
                                            <?php
                                            }
                                        */?> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="../../Controller/AdminController/delete_appointment.php?id=<?php  echo $appointment['ID_CuocHen']?>" 
                                                    class="btn-control btn-control-delete">
                                                        <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                        Delete
                                                    </a>
                                                <a href="update_appointments.php?id=<?php  echo $appointment['ID_CuocHen']?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-calendar-day btn-control-icon"></i>
                                                    Update
                                                </a>
                                            </div>
                                        </th> 
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
            <!-- Footer -->
            <?php 
            require_once('./partials/_footer.php'); 
            ?>
            </div>
        </div>
    </div>

</body>
</html>