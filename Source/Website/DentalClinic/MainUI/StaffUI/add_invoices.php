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
                                            <label for="" class="form-col__label">Select Treatment</label>
                                            <select name="select_id" id="selectId" class="form-cotrol" onchange="getSelect(this.value)">
                                                <option value="" class="">1</option>
                                                <option value="" class="">2</option>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment Id</label>
                                            <select name="payment_id" id="paymentId" class="form-cotrol" onchange="getPayment(this.value)">
                                                <option value="" class="">1</option>
                                                <option value="" class="">2</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Tooth Price</label>
                                            <input type="text" name="tooth_price" class="form-control" readonly value>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Price</label>
                                            <input type="text" name="medicine_price" class="form-control" readonly value>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Invoice Total</label>
                                            <input type="text" name="invoice_total" class="form-control" readonly value>
                                        </div>
                                    </div>
                                    
                                    <hr class="navbar__divider">

                                    <div class="form-row">
                                        <div class="form-row__flex">
                                            <div class="form-col">
                                                <label for="" class="form-col__label">Amount Paid</label>
                                                <input type="text" name="amount_paid" class="form-control" value>
                                            </div>
                                            
                                            <div class="form-col">
                                                <label for="" class="form-col__label">Change</label>
                                                <input type="text" name="change" class="form-control" readonly value>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="addInvoice" value="Add Invoice" class="btn-control btn-control-add" value="">
                                        </div>
                                    </div>
                                </div>

                            </form>
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