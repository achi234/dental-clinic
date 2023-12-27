<?php
// session_start();
// include('config/config.php');
// include('config/checklogin.php');
// check_login();
require_once('./partials/_head.php');
// require_once('./partials/_analytics.php');
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
                    <div class="container-recent-inner">
                        <div class="container-recent__heading heading__button">
                            <a href="add_paitents.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-bed-pulse btn-control-icon"></i>
                                Add new paitent
                            </a>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by code, name..." name="search_text">
                                <button class="btn-control btn-control-search" name="btn-delete">
                                    <i class="fa-solid fa-magnifying-glass btn-control-icon"></i>
                                    Search
                                </button>                        

                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light"> 
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Paitent Id</th> 
                                        <th class="text-column" scope="col">FULL NAME</th> 
                                        <th class="text-column" scope="col">Gender</th> 
                                        <th class="text-column" scope="col">Phone Number</th> 
                                        <th class="text-column" scope="col">Address</th> 
                                        <th class="text-column" scope="col">DOB</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">3434</th> 
                                        <th class="text-column" scope="row">Sarah</th> 
                                        <th class="text-column" scope="row">Female</th> 
                                        <th class="text-column" scope="row">0923838456</th> 
                                        <th class="text-column" scope="row">District 5, HCM</th> 
                                        <th class="text-column" scope="row">23/1/2001</th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="update_paitents.php" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                    View Detail
                                                </a>
                                            </div>
                                        </th> 
                                    </tr>

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

</body>
</html>