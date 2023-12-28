<?php
    $page_title = "Smile - Dentist List";
    require_once('./partials/_head.php');

    $pageSize = 20;
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $dentists = getByUserTypeWithPagination('USER_DENTAL', 'Dentist', $pageSize, $pageNumber, 'ID_User');
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
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Dentist Records</p>

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
                                    $dentists = searchUserByKeyword('USER_DENTAL', $strKeyword, 'Dentist');

                                    if($dentists['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $dentists['status'];
                                        $dentists = getByUserTypeWithPagination('USER_DENTAL', 'Dentist', $pageSize, $pageNumber, 'ID_User');
                                    }
                                }
                                else
                                {
                                    $dentists = getByUserTypeWithPagination('USER_DENTAL', 'Dentist', $pageSize, $pageNumber, 'ID_User');
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
                                        <th class="text-column-emphasis" scope="col">Dentist ID</th> 
                                        <th class="text-column" scope="col">USERNAME</th> 
                                        <th class="text-column" scope="col">FULL NAME</th> 
                                        <th class="text-column" scope="col">Gender</th> 
                                        <th class="text-column" scope="col">Phone Number</th> 
                                        <th class="text-column" scope="col">Address</th>
                                        <th class="text-column" scope="col">Status</th>  
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
                                        <th class="text-column-emphasis" scope="row"><?php echo $dentist['ID']?></th>
                                        <th class="text-column" scope="row"><?php echo $dentist['Username']?></th>
                                        <th class="text-column" scope="row"><?php echo $dentist['Fullname']?></th> 
                                        <?php if($dentist['Gender'] = 'F')
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
                                        <th class="text-column" scope="row"><?php echo $dentist['PhoneNumber']?></th> 
                                        <th class="text-column" scope="row"><?php echo $dentist['CurrAddress']?></th>
                                        <?php  $dentist_status = getbyKeyValue('ACCOUNT', 'Username', $dentist['Username']);
                                            if($dentist_status['data']['isActive'] == 'Yes') 
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