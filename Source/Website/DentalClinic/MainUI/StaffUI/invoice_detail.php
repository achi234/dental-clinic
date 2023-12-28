<?php
require_once('./partials/_head.php');
$invoice_id = $_GET['id'];
$invoice = getbyKeyValue('INVOICE', 'ID_Invoice', $invoice_id);

$payment_id = $invoice['data']['ID_Payment'];
$payment = getbyKeyValue('PAYMENT_METHOD', 'ID_Payment', $payment_id);

$select_id = $invoice['data']['ID_Select'];
$selects = getbyKeyValue('SELECT_TREATMENT', 'ID_Select', $select_id);
$customers = getbyKeyValue('CUSTOMER', 'ID_Customer', $selects['data']['ID_Customer']);
$customer_name = $customers['data']['Fullname'];

$prescribes = getAllByKeyValue('PRESCRIBE', 'ID_Select', $select_id);
$choose_tooths = getAllByKeyValue('CHOOSE_TOOTH', 'ID_Select', $select_id);
$choose_treatments = getAllByKeyValue('CHOOSE_TREATMENT', 'ID_Select', $select_id);
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
                                            <h3 name="select_id" class="form-control margin-0"><?php echo $select_id?></h3>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Price ($)</label>
                                            <h3 name="medicine_price" class="form-control margin-0"><?php echo $invoice['data']['MedicineFee']?></h3>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment</label>
                                            <h3 name="payment_id" class="form-control margin-0"><?php echo $payment['data']['PaymentMethod']?></h3>
                                        </div>
                                        
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Tooth Price ($)</label>
                                            <h3 name="tooth_price" class="form-control margin-0"><?php echo $invoice['data']['ToothPrice']?></h3>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Medicine Price ($)</label>
                                            <h3 name="medicine_price" class="form-control margin-0"><?php echo $invoice['data']['MedicineFee']?></h3>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Invoice Total ($)</label>
                                            <h3 name="invoice_total" class="form-control margin-0"><?php echo $invoice['data']['Total']?></h3>
                                        </div>
                                    </div>
                                    
                                    <hr class="navbar__divider">

                                    <div class="form-row">
                                        <div class="form-row__flex">
                                            <div class="form-col">
                                                <label for="" class="form-col__label">Amount Paid ($)</label>
                                                <h3 name="amount_paid" class="form-control"><?php echo $invoice['data']['AmountPaid']?></h3>
                                            </div>
                                            
                                            <div class="form-col">
                                                <label for="" class="form-col__label">Change ($)</label>
                                                <h3 name="change" class="form-control"><?php echo $invoice['data']['Changee']?></h3>
                                            </div>

                                            <div class="form-col">
                                                <label for="" class="form-col__label">Time</label>
                                                <?php
                                                    $invoice_time = $invoice['data']['InvoiceTime']->format(' d-m-Y H:i:s ');
                                                ?>
                                                <h3 name="invoice_time" class="form-control"><?php echo $invoice_time?></h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
                                        <!-- <th class="text-column-emphasis" scope="col">Medicine Id</th>  -->
                                        <th class="text-column-emphasis" scope="col">Medicine Name</th> 
                                        <th class="text-column" scope="col">Unit Price ($)</th> 
                                        <th class="text-column" scope="col">Quantity</th> 
                                        <th class="text-column" scope="col">Total ($)</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    // $count = sizeof($prescribes['data']);
                                    // echo $medicine_name;
                                    // if($count > 0)
                                    if($prescribes['status'] != 'No Data Found')
                                    {
                                    ?>
                                    <tr>    
                                        <?php  foreach($prescribes['data'] as $prescribe) 
                                        {  
                                            $medicines = getbyKeyValue('MEDICINE', 'ID_Medicine', $prescribe['ID_Medicine']);
                                        ?>
                                        <th class="text-column-emphasis" scope="row"><?php echo $medicines['data']['MedicineName']?></th> 
                                        <th class="text-column" scope="row"><?php echo $prescribe['UnitPrice']?></th> 
                                        <th class="text-column" scope="row"><?php echo $prescribe['Quantity']?></th> 
                                        <th class="text-column" scope="row"><?php echo $prescribe['TotalPrice']?></th> 
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
                                <?php
                                    // $count = sizeof($choose_tooths['data']);
                                    // echo $medicine_name;
                                    // if($count > 0)
                                    if($choose_tooths['status'] != 'No Data Found')
                                    {
                                    ?>
                                    <tr>    
                                        <?php  foreach($choose_tooths['data'] as $choose_tooth) 
                                        {  
                                        ?>
                                        <th class="text-column-emphasis" scope="row"><?php echo $choose_tooth['ID_Tooth']?></th> 
                                        <th class="text-column" scope="row"><?php echo $choose_tooth['ID_Surface']?></th> 
                                        <th class="text-column" scope="row"><?php echo $choose_tooth['Price']?></th> 
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
                                        <th class="text-column" scope="col">Treatment Name</th> 
                                        <th class="text-column" scope="col">Price ($)</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    // $count = sizeof($choose_treatments['data']);
                                    // echo $medicine_name;
                                    // if($count > 0)
                                    if($choose_treatments['status'] != 'No Data Found')
                                    {
                                    ?>
                                    <tr>    
                                        <?php  foreach($choose_treatments['data'] as $choose_treatment) 
                                        {  
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $choose_treatment['ID_Treatment']?></th> 
                                        <?php 
                                            $treatments = getbyKeyValue('TREATMENT', 'ID_Treatment', $choose_treatment['ID_Treatment'])
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $treatments['data']['TreatmentName']?></th> 
                                        <th class="text-column" scope="row"><?php echo $choose_treatment['Price']?></th> 
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