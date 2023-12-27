<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();

    if(isset($_POST['btn-add-choosetreatment']))
    {
        $select_id = $_POST['select_id'];
        $treatment_id = $_POST['treatment_id'];
        $choosetreatment_price = $_POST['choosetreatment_price'];
        
        if(!empty($select_id) && !empty($treatment_id) && 
        !empty($choosetreatment_price))
        {
            $dataCT = [
                'ID_Select' => $select_id,
                'ID_Treatment' => $treatment_id,
                'Price' => $choosetreatment_price,
            ];

            $addCT = insert('CHOOSE_TREATMENT', $dataCT);

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