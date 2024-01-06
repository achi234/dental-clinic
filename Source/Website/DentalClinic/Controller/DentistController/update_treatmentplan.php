<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updatePlan']))
    {
        $select_id = $_POST['select_id'];

        if(empty($_POST['dentist_id']) || empty($_POST['customer_name']) || empty($_POST['select_datetime']) || empty($_POST['select_returndays']) 
        || empty($_POST['select_status']))
        {
            redirect('../../MainUI/DentistUI/update_treatmentplans.php?id='.$select_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {

            $select_dentist = $_POST["dentist_id"];      
            $select_customerName = $_POST["customer_name"];
            $select_time = $_POST["select_datetime"];
            $select_returndays = $_POST["select_returndays"];
            $select_status = $_POST["select_status"];
            
            $checkCustomer = getbyKeyValue('CUSTOMER', 'Fullname', $select_customerName);

            if($checkCustomer['status'] == 'No Data Found')
            {
                redirect('../../MainUI/DentistUI/update_appointments.php?id='.$select_id, 'Cannot find customer <' .$select_customerName. '>.Please try again', '');
                exit(0);
            }

            $select_customer = $checkCustomer['data']['ID_Customer'];

            $formatted_datetime = date('Y-m-d H:i:s', strtotime($select_time));

            $data = [
                'ID_Dentist' => $select_dentist,
                'ID_Customer' => $select_customer,
                'ReturnDays' => $select_returndays,
                'DateSelect' => $formatted_datetime,
                'SelectionStatus' => $select_status,
            ];


            $updatePlan = updatebyKeyValue('SELECT_TREATMENT', 'ID_Select', $select_id, $data);
            echo $updatePlan['query'];

            if($updatePlan['status'])
            {
                redirect('../../MainUI/DentistUI/update_treatmentplans.php?id='.$select_id, '', "You've modified plan successfully!");
            }
            else
            {
                redirect('../../MainUI/DentistUI/update_treatmentplans.php?id='.$select_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>