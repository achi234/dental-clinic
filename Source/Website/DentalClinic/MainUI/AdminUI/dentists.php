<?php
    $page_title = "Smile - Dentist List";
    require_once('./partials/_head.php');

    $pageSize = 20;
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $dentists = getAllWithPagination('NHASI', $pageSize, $pageNumber, 'SDT_NS');
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
                            <a href="add_dentists.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-user-plus btn-control-icon"></i>
                                Add new dentist
                            </a>
                            <div class="pagination">
                                <?php
                                    $totalPages = ceil($dentists['total'] / $pageSize);
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
                                    $dentists = searchByKeyword('NHASI', $strKeyword);

                                    if($dentists['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $dentists['status'];
                                        $dentists = getAllWithPagination('NHASI', $pageSize, $pageNumber, 'SDT_NS');
                                    }
                                }
                                else
                                {
                                    $dentists = getAllWithPagination('NHASI', $pageSize, $pageNumber, 'SDT_NS');
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
                                        <th class="text-column-emphasis" scope="col">Phone Number</th> 
                                        <th class="text-column" scope="col">FULL NAME</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
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
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="../../Controller/AdminController/delete_dentist.php?sdt=<?php  echo $dentist['SDT_NS']?>" 
                                                    class="btn-control btn-control-delete">
                                                        <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                        Delete
                                                </a>
                                                <a href="update_dentists.php?id=<?php  echo $dentist['SDT_NS']?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                    Update
                                                </a>
                                            </div>
                                        </th> 
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