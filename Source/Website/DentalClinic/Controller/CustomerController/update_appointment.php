<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateAppt']))
    {
        $appointment_id = $_POST['appointment_id'];

        if(empty($_POST['dentist_phone']) || empty($_POST['customer_phone']) 
        || empty($_POST['appt_date'])  || empty($_POST['appt_time']) )
        {
            redirect('../../MainUI/CustomerUI/update_appointments.php?id='.$appointment_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {

            $appt_dentist = $_POST["dentist_phone"];
            $appt_customer = $_POST["customer_phone"];
            $appt_date = $_POST["appt_date"];
            $appt_time = $_POST["appt_time"];

            $checkCustomer = getbyKeyValue('KHACHHANG', 'SDT_KH', $appt_customer);

            if($checkCustomer['status'] == 'No Data Found')
            {
                redirect('../../MainUI/CustomerUI/update_appointments.php?id='.$appointment_id, 'Cannot find customer <' .$appt_customerName. '>.Please try again', '');
                exit(0);
            }

            $appt_customer = $checkCustomer['data']['SDT_KH'];

            $formattedDate = date('Y-m-d', strtotime($appt_date));
            $formattedTime = date('H:i:s', strtotime($appt_time));

            $data = [
                'SDT_NS' => $appt_dentist,
                'SDT_KH' => $appt_customer,
                'Ngay' => $formattedDate,
                'Gio' => $formattedTime,
            ];


            $updateAppointment = updatebyKeyValue('CUOCHEN', 'ID_CuocHen', $appointment_id, $data);
            echo $updateAppointment['query'];

            if($updateAppointment['status'])
            {
                redirect('../../MainUI/CustomerUI/appointments.php', '', "You've modified appointment successfully!");
            }
            else
            {
                redirect('../../MainUI/CustomerUI/update_appointments.php?id='.$appointment_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>