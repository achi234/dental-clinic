<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateAppt']))
    {
        $appointment_id = $_POST['appointment_id'];

        if(empty($_POST['dentist_id']) || empty($_POST['customer_name']) || empty($_POST['room_id']) || empty($_POST['appt_date']) 
        || empty($_POST['appt_time']) || empty($_POST['appt_status']))
        {
            redirect('../../MainUI/DentistUI/update_appointments.php?id='.$appointment_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {

            $appt_dentist = $_POST["dentist_id"];
            
            $appt_customerName = $_POST["customer_name"];
            $appt_room = $_POST["room_id"];
            $appt_date = $_POST["appt_date"];
            $appt_time = $_POST["appt_time"];
            $appt_status = $_POST["appt_status"];
            
            $checkCustomer = getbyKeyValue('CUSTOMER', 'Fullname', $appt_customerName);

            if($checkCustomer['status'] == 'No Data Found')
            {
                redirect('../../MainUI/DentistUI/update_appointments.php?id='.$appointment_id, 'Cannot find customer <' .$appt_customerName. '>.Please try again', '');
                exit(0);
            }

            $appt_customer = $checkCustomer['data']['ID_Customer'];

            $formattedDate = date('Y-m-d', strtotime($appt_date));
            $formattedTime = date('H:i:s', strtotime($appt_time));

            $data = [
                'ID_Dentist' => $appt_dentist,
                'ID_Customer' => $appt_customer,
                'ID_Room' => $appt_room,
                'Date_Appt' => $formattedDate,
                'Time_Appt' => $formattedTime,
                'Status_Appt' => $appt_status,
            ];


            $updateAppointment = updatebyKeyValue('APPOINTMENT', 'ID_Appointment', $appointment_id, $data);
            echo $updateAppointment['query'];

            if($updateAppointment['status'])
            {
                redirect('../../MainUI/DentistUI/appointments.php', '', "You've modified appointment successfully!");
            }
            else
            {
                redirect('../../MainUI/DentistUI/update_appointments.php?id='.$appointment_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>