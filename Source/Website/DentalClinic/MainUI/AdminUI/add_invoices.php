<?php
require_once('./partials/_head.php');
$select_treatments = getAll('SELECT_TREATMENT');
$payments = getAll('PAYMENT_METHOD');
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
                            <form method="POST" action="../../Controller/AdminController/add_invoice.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Select Treatment</label>
                                            <input type="text" name="select_id" class="form-control" value>
                                            
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment</label>
                                            <select name="payment_id" id="paymentId" class="form-cotrol">
                                                <option value="1" class="">Cash</option>
                                                <option value="2" class="">Momo</option>
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
                                            <input type="submit" name="btn-add-invoice" value="Add Invoice" class="btn-control btn-control-add" value="">
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