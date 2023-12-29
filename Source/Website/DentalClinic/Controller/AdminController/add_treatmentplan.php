<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();

    if(isset($_POST['btn-add-select']))
    {
        $dentist_id = $_POST['dentist_id'];
        $patient_id = $_POST['patient_id'];
        $datetime = $_POST['select_datetime'];
        $returndays = $_POST['select_returndays'];
        
        if(!empty($dentist_id) && !empty($patient_id) &&
        !empty($datetime) && !empty($returndays))
        {
            $dataPlan = [
                'ID_Dentist' => $dentist_id,
                'ID_Customer' => $patient_id,
                'DateSelect' => $datetime,
                'ReturnDays' => $returndays,
            ];

            $addPlan = insert('SELECT_TREATMENT', $dataPlan);

            echo $addPlan['query'];

            if($addPlan['status'])
            {
                echo "You've added treatment plan successfully!";
                redirect('../../MainUI/AdminUI/update_patients.php?id='.$patient_id, '', "You've added treatment plan successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_treatmentplans.php?id='.$patient_id, 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_treatmentplans.php?id='.$patient_id, 'All fields are required.', '');
            exit(0);                            
        }
    }
?>