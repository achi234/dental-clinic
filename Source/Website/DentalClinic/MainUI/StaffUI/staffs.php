<?php
$page_title = "Smile - Staff List";
require_once('./partials/_head.php');

$pageSize = 20;
$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$staffs = getAllWithPagination('NHANVIEN', $pageSize, $pageNumber, 'SDT_NV');
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
                    <div class="container-recent-inner">
                        <div class="container-recent__heading heading__button">
                            <p class="recent__heading-title">List Of Staffs</p>
                            <div class="pagination">
                                <?php
                                    $totalPages = ceil($staffs['total'] / $pageSize);
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
                                    $staffs = searchByKeyword('NHANVIEN', $strKeyword);
                                    if($staffs['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $staffs['status'];
                                        $staffs = getAllWithPagination('NHANVIEN', $pageSize, $pageNumber, 'SDT_NV');
                                    }
                                }
                                else
                                {
                                    $staffs = getAllWithPagination('NHANVIEN', $pageSize, $pageNumber, 'SDT_NV');
                                }
                            ?>
                            
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by code, name..." name="search_text" value="<?php echo $strKeyword;?>">
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
                    </form>
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