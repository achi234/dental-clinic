<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-appt']))
    {
        $id_appointment = $_POST['ID_CuocHen'];
        $dentist = $_POST['SDT_NS'];
        $patient = $_POST['SDT_KH'];
        $date = $_POST['appt_date'];
        $time = $_POST['appt_time'];

        if(!empty($date) && !empty($time))
        {
            $dataAppt = [
                'ID_CuocHen'  => $id_appointment,
                'SDT_NS'  => $dentist,
                'SDT_KH' => $patient,
                'Ngay'   => $date,
                'Gio'   => $time,
            ];

            $addAppt = insert('CUOCHEN', $dataAppt);

            echo $addAppt['query'];

            if($addAppt['status'])
            {
                echo "You've added appointment successfully!";
                redirect('../../MainUI/AdminUI/appointments.php', '', "You've added appointment successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_appointments.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_appointments.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>