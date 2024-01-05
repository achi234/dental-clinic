<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();

    if(isset($_POST['btn-add-prescribe']))
    {
        $record_id = $_POST['record_id'];
        $medicine_id = $_POST['medicine_id'];
        $quantity = $_POST['quantity'];
        
        // echo $record_id;
        // echo $medicine_id;
        // echo $quantity;

        if(!empty($record_id) && !empty($medicine_id) && 
         !empty($quantity))
        {
            $dataPrescribe = [
                'ID_HoSo' => $record_id,
                'ID_Thuoc' => $medicine_id,
                'SOLUONG' => $quantity,
            ];

            $addPrescribe = insert('KEDON', $dataPrescribe);

            echo $addPrescribe['query'];

            if($addPrescribe['status'])
            {
                echo "You've added choose treatment successfully!";
                redirect('../../MainUI/AdminUI/update_patients.php?id='.$record_id, '', "You've added prescribe successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_precribes.php?id='.$record_id, 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_precribes.php?id='.$record_id, 'All fields are required.', '');
            exit(0);                            
        }
    }
?>