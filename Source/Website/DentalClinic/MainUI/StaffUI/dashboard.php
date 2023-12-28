<?php
require_once('./partials/_head.php');
$pageSize = 20;
$pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$appts = getTopAppt('10');
$invoices = getTopInvoice('10');
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
                            <p class="recent__heading-title">Recent Appointments</p>
                            <a href="appointments.php" class="btn-control btn-control-search">See all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Appointment ID</th> 
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column" scope="col">DENTIST</th> 
                                        <th class="text-column" scope="col">Room</th> 
                                        <th class="text-column" scope="col">Date</th> 
                                        <th class="text-column" scope="col">Time</th> 
                                        <th class="text-column" scope="col">Type</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($appts['data']);
                                    //echo $invoices['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($appts['data'] as $appt) 
                                        {  
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $appt['ID']?></th> 
                                        <th class="text-column" scope="row"><?php echo $appt['ID_Dentist']?></th> 
                                        <th class="text-column" scope="row"><?php echo $appt['ID_Customer']?></th> 
                                        <th class="text-column" scope="row"><?php echo $appt['ID_Room']?></th> 
                                        <?php
                                            $appt_date = $appt['Date_Appt']->format('d-m-Y');
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $appt_date?></th> 
                                        <?php
                                            $appt_time = $appt['Time_Appt']->format('H:i');
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $appt_time?></th> 
                                        <th class="text-column" scope="row">
                                        <?php if($appt['Status_Appt'] == 'New')
                                            {
                                        ?>
                                            <span class="badge badge-success"><?php echo $appt['Status_Appt']?></span>
                                        <?php
                                            } 
                                            else
                                            {
                                        ?>
                                            <span class="badge badge-unsuccess"><?php echo $appt['Status_Appt']?></span>
                                        <?php
                                            }
                                        ?>
                                        </th> 
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

            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Recent Invoice</p>
                            <a href="invoices.php" class="btn-control btn-control-search">See all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th class="text-column-emphasis" scope="col">Invoice Id</th> 
                                        <th class="text-column" scope="col">Treatment Plan</th> 
                                        <th class="text-column" scope="col">Payment Id</th> 
                                        <th class="text-column" scope="col">Total ($)</th> 
                                        <th class="text-column" scope="col">Time</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    $count = sizeof($invoices['data']);
                                    //echo $invoices['data'];
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($invoices['data'] as $invoice) 
                                        {  
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $invoice['ID']?></th>
                                        <th class="text-column" scope="row"><?php echo $invoice['ID_Select']?></th>
                                        <?php
                                            $payment = getbyKeyValue('PAYMENT_METHOD', 'ID_Payment', $invoice['ID_Payment']);
                                            $payment_method = $payment['data']['PaymentMethod'];
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $payment_method?></th>
                                        <th class="text-column" scope="row"><?php echo $invoice['Total']?></th> 
                                        <?php
                                            $invoice_time = $invoice['InvoiceTime']->format(' H:i:s Y-m-d');
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $invoice_time?></th>                                        
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
  <!-- Argon Scripts -->

</body>
</html>