<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('id');
    if(is_numeric($param))
    {
        $appointment_id = validate($param);

        $appointment = getbyKeyValue('CUOCHEN','ID_CuocHen', $appointment_id);
        if($appointment['status'] != 'Data Found')
        {
           redirect('../../MainUI/DentistUI/appointments.php', $appointment['status'], '');
        }
        else
        {

            $deleteAppointment = delete('CUOCHEN', 'ID_CuocHen', $appointment_id);

            if($deleteAppointment['status'])
            {
                redirect('../../MainUI/DentistUI/appointments.php', '', "You've deleted CUOCHEN {$appointment['data']['ID_CuocHen']} !");
            }
            else
            {
                redirect('../../MainUI/DentistUI/appointments.php', 'Cannot delete. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../MainUI/DentistUI/appointments.php', 'Something went wrong. Please try again!', '');
    }
?>