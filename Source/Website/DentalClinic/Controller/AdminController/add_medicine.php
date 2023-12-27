<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-medicine']))
    {
        $medname = $_POST['medicine_name'];
        $price = $_POST['medicine_price'];

        if(!empty($medname) && !empty($price) && $price > 0)
        {
            $dataMedicine = [
                'MedicineName' => $medname,
                'Price'        => $price,
            ];

            $addMedicine = insert('MEDICINE', $dataMedicine);

            echo $addMedicine['query'];

            if($addmedicine['status'])
            {
                echo "You've added customer successfully!";
                redirect('../../MainUI/AdminUI/medicines.php', '', "You've added customer successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_medicines.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_medicines.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>