<?php
    $page_title = "Smile - Medicine List";
    require_once('./partials/_head.php');

    $pageSize = 20;
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $medicines = getAllWithPagination('THUOC', $pageSize, $pageNumber, 'ID_THUOC');
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
                            <a href="add_medicines.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-pills btn-control-icon"></i>
                                Add new medicine
                            </a>
                            <div class="pagination">
                                <?php
                                    $totalPages = ceil($medicines['total'] / $pageSize);
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
                                    $medicines = searchByKeyword('THUOC', $strKeyword);
                                }
                                else
                                {
                                    $medicines = getAllWithPagination('THUOC', $pageSize, $pageNumber, 'ID_THUOC');
                                }
                            ?>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by name, price" name="search_text" value="<?php echo $strKeyword;?>">
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
                                        
                                        <th class="text-column-emphasis" scope="col">Medicine Id</th> 
                                        <th class="text-column" scope="col">Medicine Name</th> 
                                        <th class="text-column" scope="col">Unit</th> 
                                        <th class="text-column" scope="col">Dosage</th> 
                                        <th class="text-column" scope="col">Quatity</th> 
                                        <th class="text-column" scope="col">Expiration Date</th> 
                                        <th class="text-column" scope="col">Price ($)</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($medicines['data']);
                                    //echo $staffs['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($medicines['data'] as $medicine) 
                                        {  
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $medicine['ID_THUOC']?></th>
                                        <th class="text-column" scope="row"><?php echo $medicine['TenThuoc']?></th>
                                        <th class="text-column" scope="row"><?php echo $medicine['DONVITINH']?></th>
                                        <th class="text-column" scope="row"><?php echo $medicine['CHIDINH']?></th>
                                        <th class="text-column" scope="row"><?php echo $medicine['SOLUONGTON']?></th>
                                        <th class="text-column" scope="row"><?php echo $medicine['NGAYHETHAN']->format('d-m-Y')?></th>
                                        <th class="text-column" scope="row"><?php echo $medicine['GIATHUOC']?></th> 
 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <!-- <a href="../../Controller/AdminController/delete_medicine.php?id=<?php  echo $medicine['ID_THUOC']?>" 
                                                    class="btn-control btn-control-delete">
                                                        <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                        Delete
                                                </a> -->
                                                <a href="update_medicines.php?id=<?php  echo $medicine['ID_THUOC']?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-pills btn-control-icon"></i>
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