<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();

    if(isset($_POST['btn-add-prescribe']))
    {
        $select_id = $_POST['select_id'];
        $medicine_id = $_POST['medicine_id'];
        $quantity = $_POST['quantity'];
        // $unit_price = $_POST['unit_price'];
        // $total_price = $_POST['total_price'];
        
        if(!empty($select_id) && !empty($medicine_id) && 
         !empty($quantity))
        {
            $dataPrescribe = [
                'ID_Select' => $select_id,
                'ID_Medicine' => $medicine_id,
                'Quantity' => $quantity,
                // 'UnitPrice' => $unit_price,
                // 'TotalPrice' => $total_price,
            ];

            $addPrescribe = insert('PRESCRIBE', $dataPrescribe);

            echo $addPrescribe['query'];

            if($addPrescribe['status'])
            {
                echo "You've added choose treatment successfully!";
                redirect('../../MainUI/AdminUI/update_treatmentplans.php?id='.$select_id, '', "You've added prescribe successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_precribes.php?id='.$select_id, 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_precribes.php?id='.$select_id, 'All fields are required.', '');
            exit(0);                            
        }
    }
?>