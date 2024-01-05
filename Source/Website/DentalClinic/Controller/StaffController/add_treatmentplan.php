<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();

    if(isset($_POST['btn-add-select']))
    {
        $dentist_id = $_POST['dentist_id'];
        $paitent_id = $_POST['paitent_id'];
        $datetime = $_POST['select_datetime'];
        $returndays = $_POST['select_returndays'];
        
        if(!empty($dentist_id) && !empty($paitent_id) &&
        !empty($datetime) && !empty($returndays))
        {
            $dataPlan = [
                'ID_Dentist' => $dentist_id,
                'ID_Customer' => $paitent_id,
                'DateSelect' => $datetime,
                'ReturnDays' => $returndays,
            ];

            $addPlan = insert('SELECT_TREATMENT', $dataPlan);

            echo $addPlan['query'];

            if($addPlan['status'])
            {
                echo "You've added treatment plan successfully!";
                redirect('../../MainUI/StaffUI/update_paitents.php?id='.$paitent_id, '', "You've added treatment plan successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/StaffUI/add_treatmentplans.php?id='.$paitent_id, 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/StaffUI/add_treatmentplans.php?id='.$paitent_id, 'All fields are required.', '');
            exit(0);                            
        }
    }
?>