<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-appt']))
    {
        $dentist = $_POST['dentist_id'];
        $paitent = $_POST['paitent_id'];
        $room = $_POST['room_id'];
        $date = $_POST['appt_date'];
        $time = $_POST['appt_time'];
        $status = $_POST['appt_status'];

        if(!empty($date) && !empty($time))
        {
            $dataAppt = [
                'ID_Dentist'  => $dentist,
                'ID_Customer' => $paitent,
                'ID_Room'     => $room,
                'Date_Appt'   => $date,
                'Time_Appt'   => $time,
                'Status_Appt' => $status,
            ];

            $addAppt = insert('APPOINTMENT', $dataAppt);

            echo $addAppt['query'];

            if($addAppt['status'])
            {
                echo "You've added appointment successfully!";
                redirect('../../MainUI/DentistUI/appointments.php', '', "You've added appointment successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/DentistUI/add_appointments.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/DentistUI/add_appointments.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>