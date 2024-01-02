<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('id');
    if(is_numeric($param))
    {
        $medicine_id = validate($param);

        $medicine = getbyKeyValue('THUOC','ID_THUOC', $medicine_id);
        if($medicine['status'] != 'Data Found')
        {
           redirect('../../MainUI/AdminUI/medicines.php', $medicine['status'], '');
        }
        else
        {

            $deleteAppointment = delete('THUOC', 'ID_THUOC', $medicine_id);

            if($deleteAppointment['status'])
            {
                redirect('../../MainUI/AdminUI/medicines.php', '', "You've deleted THUOC {$medicine['data']['ID_THUOC']} !");
            }
            else
            {
                redirect('../../MainUI/AdminUI/medicines.php', 'Cannot delete. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../MainUI/AdminUI/medicines.php', 'Something went wrong. Please try again!', '');
    }
?>