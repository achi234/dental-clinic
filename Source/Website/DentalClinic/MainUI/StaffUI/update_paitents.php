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
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Please Fill All Fields</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" class="">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Name</label>
                                            <input type="text" name="paitent_name" class="form-control" value="LJCH-7436">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Gender</label>
                                            <select name="paitent_gender" id="ptGender" class="form-cotrol" onchange="getCustomer(this.value)">
                                                <option value="" class="">Select Gender</option>
                                                <option value="" class="">Nam</option>
                                                <option value="" class="">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Phone Number</label>
                                            <input type="text" name="paintent_phone" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Address</label>
                                            <input type="text" name="paitent_address" class="form-control" value="Street 5">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Of Birth</label>
                                            <input type="text" name="paitent_dob" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="updatePaitent" value="Update Paitent" class="btn-control btn-control-add" value="">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Tooth Problem -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Tooth Problem</p>
                            <div class="container__heading-search" name="btn-add-problem">
                                <input type="text" class="heading-search__area" placeholder="Tooth Problem" name="problem_text">
                                    <button class="btn-control btn-control-search" name="btn-add-problem">
                                        <i class="fa-solid fa-tooth btn-control-icon"></i>
                                        Add
                                    </button>                        
                            </div>

                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Paitent Id</th> 
                                        <th class="text-column" scope="col">Note Date</th> 
                                        <th class="text-column" scope="col">Description</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">12/12/2023 13:22</th> 
                                        <th class="text-column" scope="row">Root Infection</th> 
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Contraindication -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Contraindication</p>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Medicine Id" name="contraindication_text">
                                    <button class="btn-control btn-control-search" name="btn-add-contraindication">
                                        <i class="fa-solid fa-hand-dots btn-control-icon"></i>
                                        Add
                                    </button>                        
                            </div>

                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Paitent Id</th> 
                                        <th class="text-column" scope="col">Medicine Id</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">12</th> 
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Select Treatment -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Treatment Plan</p>
                            <a href="add_treatmentplans.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-square-check btn-control-icon"></i>
                                Add new plan
                            </a>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Paitent Id</th> 
                                        <th class="text-column" scope="col">Select Treatment Id</th> 
                                        <th class="text-column" scope="col">Dentist Id</th> 
                                        <th class="text-column" scope="col">DateTime</th> 
                                        <th class="text-column" scope="col">Return Days</th> 
                                        <th class="text-column" scope="col">Status</th> 
                                        <th class="text-column" scope="col">Actions</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">1</th> 
                                        <th class="text-column" scope="row">2</th> 
                                        <th class="text-column" scope="row">12/12/2023</th> 
                                        <th class="text-column" scope="row">12</th> 
                                        <th class="text-column" scope="row">
                                            <span class="badge badge-success">Đã hoàn thành</span>
                                            <!-- <span class="badge badge-unsuccess">Đã hủy</span> -->
                                            <!-- <span class="badge badge-plan">Kế hoạch</span> -->
                                        </th> 
                                        <th class="text-column" scope="row">
                                            <a href="update_treatmentplans.php" class="btn-control btn-control-edit">
                                                <i class="fa-solid fa-square-check btn-control-icon"></i>
                                                Update
                                            </a>
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