<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();

    if(isset($_POST['btn-add-choosetreatment']))
    {
        $treatment_id = $_POST['treatment_id'];
        $treatment_name = $_POST['treatment_name'];
        $choosetreatment_price = $_POST['choosetreatment_price'];
        
        if(!empty($select_id) && !empty($treatment_id) && 
        !empty($choosetreatment_price))
        {
            $dataCT = [
                'ID_DichVu' => $treatment_id,
                'TenDV' => $treatment_name,
                'PhiDV' => $choosetreatment_price,
            ];

            $addCT = insert('DICHVU', $dataCT);

            echo $addCT['query'];

            if($addCT['status'])
            {
                echo "You've added choose treatment successfully!";
                redirect('../../MainUI/AdminUI/update_treatmentplans.php?id='.$select_id, '', "You've added choose treatment successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_choosetreatments.php?id='.$select_id, 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_choosetreatments.php?id='.$select_id, 'All fields are required.', '');
            exit(0);                            
        }
    }
?>