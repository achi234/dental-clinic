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
                            <a href="add_appointments.php" class="btn-control btn-control-add">
                                <i class="fa-regular fa-calendar-plus btn-control-icon"></i>
                                Add new appointment
                            </a>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by code, name..." name>
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
                                        <th class="text-column" scope="col">Room</th> 
                                        <th class="text-column" scope="col">Date</th> 
                                        <th class="text-column" scope="col">Time</th> 
                                        <th class="text-column" scope="col">Status</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">5762</th> 
                                        <th class="text-column" scope="row">FCWU-5762</th> 
                                        <th class="text-column" scope="row">FCWU-5762</th> 
                                        <th class="text-column" scope="row">R01</th> 
                                        <th class="text-column" scope="row">12/02/2023</th> 
                                        <th class="text-column" scope="row">12:30</th> 
                                        <th class="text-column" scope="row">
                                            <span class="badge badge-success">Mới</span>
                                            <!-- <span class="badge badge-unsuccess">Tái khám</span> -->
                                        </th> 

                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <button class="btn-control btn-control-delete" name="btn-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </button>
                                                <a href="update_appointments.php" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-calendar-day btn-control-icon"></i>
                                                    Update
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