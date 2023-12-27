<?php
    $page_title = "Smile - Paitent List";
    require_once('./partials/_head.php');

    $pageSize = 20;
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $paitents = getAllWithPagination('CUSTOMER', $pageSize, $pageNumber, 'ID_Customer');
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
                            <a href="add_paitents.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-bed-pulse btn-control-icon"></i>
                                Add new paitent
                            </a>

                            <div class="pagination">
                                <?php
                                    $totalPages = ceil($paitents['total'] / $pageSize);
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
                                    $paitents = searchByKeyword('CUSTOMER', $strKeyword);
                                }
                                else
                                {
                                    $paitents = getAllWithPagination('CUSTOMER', $pageSize, $pageNumber, 'ID_Customer');
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
                                        <th class="text-column-emphasis" scope="col">Id</th> 
                                        <th class="text-column" scope="col">FULL NAME</th> 
                                        <th class="text-column" scope="col">Gender</th> 
                                        <th class="text-column" scope="col">Phone Number</th> 
                                        <th class="text-column" scope="col">Address</th> 
                                        <!-- <th class="text-column" scope="col">DOB</th>  -->
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($paitents['data']);
                                    //echo $paitents['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($paitents['data'] as $paitent) 
                                        {  
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $paitent['ID_Customer']?></th>
                                        <th class="text-column" scope="row"><?php echo $paitent['Fullname']?></th>
                                        <?php if($paitent['Gender'] == 'F')
                                            {?>
                                                <th class="text-column" scope="row">Female</th> 
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <th class="text-column" scope="row">Male</th> 
                                            <?php
                                            }
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $paitent['PhoneNumber']?></th> 
                                        <th class="text-column" scope="row"><?php echo $paitent['CurrAddress']?></th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="update_paitents.php?id=<?php  echo $paitent['ID_Customer']?>" class="btn-control btn-control-edit">
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