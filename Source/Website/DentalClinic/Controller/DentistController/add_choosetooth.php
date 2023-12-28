<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();

    if(isset($_POST['btn-add-choosetooth']))
    {
        $select_id = $_POST['select_id'];
        $tooth_id = $_POST['tooth_id'];
        $surface_id = $_POST['surface_id'];
        $choosetooth_price = $_POST['choosetooth_price'];
        
        if(!empty($select_id) && !empty($tooth_id) &&
        !empty($surface_id) && !empty($choosetooth_price))
        {
            $dataCT = [
                'ID_Select' => $select_id,
                'ID_Tooth' => $tooth_id,
                'ID_Surface' => $surface_id,
                'Price' => $choosetooth_price,
            ];

            $addCT = insert('CHOOSE_TOOTH', $dataCT);

            echo $addCT['query'];

            if($addCT['status'])
            {
                echo "You've added choose tooth successfully!";
                redirect('../../MainUI/DentistUI/update_treatmentplans.php?id='.$select_id, '', "You've added choose tooth successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/DentistUI/add_choosetooths.php?id='.$select_id, 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/DentistUI/add_choosetooths.php?id='.$select_id, 'All fields are required.', '');
            exit(0);                            
        }
    }
?>