<?php
require_once('./partials/_head.php');
$pageSize = 20;
$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

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
            <!-- Header Card -->
            <!-- <div class="header">
                <div class="container header__body">
                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">CUSTOMERS</div>
                                <div class="card-inner__number">14</div>
                            </div>
                            <i class="fa-solid fa-users card__icon bg-danger"></i>                        
                        </div>
                    </div>

                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">PRODUCTS</div>
                                <div class="card-inner__number">26</div>
                            </div>
                            <i class="fa-solid fa-utensils card__icon bg-update"></i>
                        </div>
                    </div>
                    
                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">ODERS</div>
                                <div class="card-inner__number">11</div>
                            </div>
                            <i class="fa-solid fa-cart-shopping card__icon bg-warning"></i>
                        </div>
                    </div>

                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">SALES</div>
                                <div class="card-inner__number">$139</div>
                            </div>
                            <i class="fa-solid fa-dollar-sign card__icon bg-green"></i>
                        </div>
                    </div>
                </div>
            </div>     -->
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Recent Appointments</p>
                            <a href="appointments.php" class="btn-control btn-control-search">See all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">ID Appointment</th> 
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column" scope="col">DENTIST</th> 
                                        <th class="text-column" scope="col">Room</th> 
                                        <th class="text-column" scope="col">Date</th> 
                                        <th class="text-column" scope="col">Time</th> 
                                        <th class="text-column" scope="col">Type</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">731</th> 
                                        <th class="text-column" scope="row">434</th> 
                                        <th class="text-column" scope="row">989</th> 
                                        <th class="text-column" scope="row">R12</th> 
                                        <th class="text-column" scope="row">12/2/2023</th> 
                                        <th class="text-column" scope="row">12:00</th> 
                                        <th class="text-column" scope="row">
                                            <span class="badge badge-success">New</span>
                                        </th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">731</th> 
                                        <th class="text-column" scope="row">434</th> 
                                        <th class="text-column" scope="row">989</th> 
                                        <th class="text-column" scope="row">R12</th> 
                                        <th class="text-column" scope="row">12/2/2023</th> 
                                        <th class="text-column" scope="row">12:00</th> 
                                        <th class="text-column" scope="row">
                                            <span class="badge badge-success">New</span>
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
  <!-- Argon Scripts -->

</body>
</html>