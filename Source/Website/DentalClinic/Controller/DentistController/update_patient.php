<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updatePaitent']))
    {
        $patient_id = $_POST['patient_id'];
        if(empty($_POST['patient_name']) || empty($_POST['patient_gender']) || empty($_POST['patient_address']) || empty($_POST['patient_phone'])
          || empty($_POST['patient_dob']))
        {
            redirect('../../MainUI/DentistUI/update_paitents.php?id='.$patient_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $patient_name = $_POST['patient_name'];
            $patient_gender = $_POST['patient_gender'];
            $patient_address = $_POST['patient_address'];
            $patient_phone = $_POST['patient_phone'];
            $patient_dob = $_POST['patient_dob'];

            $formattedDOB = date('Y-m-d', strtotime($patient_dob));

            $dataCustomer = [
                'Fullname'    => $patient_name,
                'Gender'      => $patient_gender,
                'CurrAddress' => $patient_address,
                'PhoneNumber' => $patient_phone,
                'DOB' => $formattedDOB,
            ];

            $updateCustomer = updatebyKeyValue('CUSTOMER', 'ID_Customer', $patient_id, $dataCustomer);


            if($updateCustomer['status'])
            {
                //echo "Here";
               redirect('../../MainUI/DentistUI/update_paitents.php?id='.$patient_id, '', "You've modified patient successfully!");
            }
            else
            {
               redirect('../../MainUI/DentistUI/update_paitents.php?id='.$patient_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>