<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-invoice']))
    {
        $select_id = $_POST['select_id'];
        $payment_id = $_POST['payment_id'];
        $amount_paid = $_POST['amount_paid'];

        if(!empty($select_id) && !empty($payment_id) && !empty($amount_paid))        {
            $dataInvoice = [
                'ID_Select'  => $select_id,
                'ID_Payment' => $payment_id,
                'AmountPaid' => $amount_paid,
            ];

            $addInvoice = insert('INVOICE', $dataInvoice);

            echo $addInvoice['query'];

            if($addInvoice['status'])
            {
                echo "You've added invoice successfully!";
                redirect('../../MainUI/AdminUI/invoices.php', '', "You've added invoice successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_invoices.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_invoices.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>