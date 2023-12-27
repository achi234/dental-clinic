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
                            <a href="add_invoices.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-file-invoice btn-control-icon"></i>
                                Add new invoice
                            </a>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by code, name..." name="search_text">
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
                                        <th class="text-column-emphasis" scope="col">Invoice Id</th> 
                                        <th class="text-column" scope="col">Select Treatment</th> 
                                        <th class="text-column" scope="col">Payment Id</th> 
                                        <!-- <th class="text-column" scope="col">Tooth Price</th>  -->
                                        <!-- <th class="text-column" scope="col">Medicine Price</th>  -->
                                        <th class="text-column" scope="col">Total</th> 
                                        <!-- <th class="text-column" scope="col">Amount Paid</th>  -->
                                        <!-- <th class="text-column" scope="col">Change</th>  -->
                                        <th class="text-column" scope="col">Time</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">731</th> 
                                        <th class="text-column" scope="row">2</th> 
                                        <th class="text-column" scope="row">1</th> 
                                        <!-- <th class="text-column" scope="row">$11</th>  -->
                                        <!-- <th class="text-column" scope="row">$20</th>  -->
                                        <th class="text-column" scope="row">$31</th> 
                                        <!-- <th class="text-column" scope="row">$31</th>  -->
                                        <!-- <th class="text-column" scope="row">$0</th>  -->
                                        <th class="text-column" scope="row">04/12/2022 11:37</th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="invoice_detail.php" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-file-lines btn-control-icon"></i>
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