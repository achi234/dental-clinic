<?php
    $page_title = "Smile - Patient List";
    require_once('./partials/_head.php');

    $pageSize = 20;
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $patients = getAllWithPagination('HOSOKHACHHANG', $pageSize, $pageNumber, 'ID_HoSo');
?>

<body>
    <!-- Sidebar -->
    <?php
    require_once('./partials/_sidebar.php');
    ?>
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
                            <a href="add_patients.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-bed-pulse btn-control-icon"></i>
                                Add new patient
                            </a>

                            <div class="pagination">
                                <?php
                                    $totalPages = ceil($patients['total'] / $pageSize);
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
                                    $patients = searchByKeyword('HOSOKHACHHANG', $strKeyword);

                                    if($patients['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $patients['status'];
                                        $patients = getAllWithPagination('HOSOKHACHHANG', $pageSize, $pageNumber, 'ID_HoSo');
                                    }
                                }
                                else
                                {
                                    $patients = getAllWithPagination('HOSOKHACHHANG', $pageSize, $pageNumber, 'ID_HoSo');
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
                                        <th class="text-column-emphasis" scope="col">Patient Id</th> 
                                        <th class="text-column" scope="col">Dentist</th> 
                                        <th class="text-column" scope="col">Customer</th> 
                                        <th class="text-column" scope="col">Date created</th> 
                                        <th class="text-column" scope="col">PhiKham</th> 
                                        <th class="text-column" scope="col">Service_ID</th> 
                                        <th class="text-column" scope="col">Medincine Fee</th> 
                                        <th class="text-column" scope="col">Total</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($patients['data']);
                                    //echo $patients['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($patients['data'] as $patient) 
                                        { 
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $patient['ID_HoSo']?></th>
                                        <th class="text-column" scope="row"><?php echo $patient['SDT_NS']?></th>
                                        <th class="text-column" scope="row"><?php echo $patient['SDT_KH']?></th> 
                                        <th class="text-column" scope="row"><?php echo $patient['NgayTaoHoSo']->format('d-m-Y')?></th> 
                                        <th class="text-column" scope="row"><?php echo $patient['PhiKham']?></th> 
                                        <th class="text-column" scope="row"><?php echo $patient['ID_DichVu']?></th> 
                                        <th class="text-column" scope="row"><?php echo $patient['TongTienThuoc']?></th> 
                                        <th class="text-column" scope="row"><?php echo $patient['TongTien']?></th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="update_patients.php?id=<?php  echo $patient['ID_HoSo']?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                    View Detail
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