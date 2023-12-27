<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateMedicine']))
    {
        $medicine_id = $_POST['medicine_id'];
        if(empty($_POST['medicine_name']) || empty($_POST['medicine_price']))
        {
            redirect('../../MainUI/AdminUI/update_medicines.php?id='.$medicine_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $medicine_name = $_POST['medicine_name'];
            $medicine_price = $_POST['medicine_price'];

            $data = [
                'MedicineName' => $medicine_name,
                'Price' => $medicine_price,
            ];


            $updateMedicine = updatebyKeyValue('MEDICINE', 'ID_Medicine', $medicine_id, $data);


            if($updateMedicine['status'])
            {
                redirect('../../MainUI/AdminUI/medicines.php', '', "You've modified medicine successfully!");
            }
            else
            {
                redirect('../../MainUI/AdminUI/update_medicines.php?id='.$medicine_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>