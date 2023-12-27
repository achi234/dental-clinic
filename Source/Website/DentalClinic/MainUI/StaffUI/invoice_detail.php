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
                            <p class="recent__heading-title">Invoice Detail</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" class="">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Select Treatment</label>
                                            <h3 name="select_id" class="form-control margin-0">1</h3>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment Id</label>
                                            <h3 name="payment_id" class="form-control margin-0">1</h3>
                                        </div>
                                        
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Tooth Price ($)</label>
                                            <h3 name="tooth_price" class="form-control margin-0">11</h3>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Price ($)</label>
                                            <h3 name="medicine_price" class="form-control margin-0">20</h3>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Invoice Total ($)</label>
                                            <h3 name="invoice_total" class="form-control margin-0">31</h3>
                                        </div>
                                    </div>
                                    
                                    <hr class="navbar__divider">

                                    <div class="form-row">
                                        <div class="form-row__flex">
                                            <div class="form-col">
                                                <label for="" class="form-col__label">Amount Paid ($)</label>
                                                <h3 name="amount_paid" class="form-control">31</h3>
                                            </div>
                                            
                                            <div class="form-col">
                                                <label for="" class="form-col__label">Change ($)</label>
                                                <h3 name="change" class="form-control">0</h3>
                                            </div>

                                            <div class="form-col">
                                                <label for="" class="form-col__label">Time</label>
                                                <h3 name="invoice_time" class="form-control">12/12/2023</h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="addInvoice" value="Add Invoice" class="btn-control btn-control-add" value="">
                                        </div>
                                    </div>
                                </div> -->

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- Medicine Detail -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Medicine Detail</p>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Medicine Id</th> 
                                        <th class="text-column" scope="col">Medicine Name</th> 
                                        <th class="text-column" scope="col">Unit Price ($)</th> 
                                        <th class="text-column" scope="col">Quantity</th> 
                                        <th class="text-column" scope="col">Total ($)</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">731</th> 
                                        <th class="text-column" scope="row">Irelonne</th> 
                                        <th class="text-column" scope="row">12</th> 
                                        <th class="text-column" scope="row">2</th> 
                                        <th class="text-column" scope="row">24</th> 
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tooth Detail -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Tooth Detail</p>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Tooth Id</th> 
                                        <th class="text-column" scope="col">Surface Id</th> 
                                        <th class="text-column" scope="col">Price ($)</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">D</th> 
                                        <th class="text-column" scope="row">30</th> 
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Treatment Detail -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Treatment Detail</p>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Treatment Id</th> 
                                        <th class="text-column" scope="col">Price ($)</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">30</th> 
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