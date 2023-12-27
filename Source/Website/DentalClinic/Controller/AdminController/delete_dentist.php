<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('id');
    if(is_numeric($param))
    {
        $dentist_id = validate($param);

        $dentist = getbyKeyValue('USER_DENTAL','ID_User', $dentist_id);
        if($dentist['status'] != 'Data Found')
        {
           redirect('../../MainUI/AdminUI/dentists.php', $dentist['status'], '');
        }
        else
        {
            //echo "Here";
            //echo $dentist['query'];

            //$deletedentist = delete('dentist', 'ID_Dentist', $dentist_id);
            //$deleteUser = delete('USER_DENTAL', 'ID_User', $dentist_id);

            //echo $deletedentist['query'];
            //echo $deleteUser['query'];
            $dataAccount = [
                'isActive' => 'No',
            ];

            $updateAccount = updatebyKeyValue('ACCOUNT', 'Username', $dentist['data']['Username'], $dataAccount);

            if($updateAccount['status'])
            {
                redirect('../../MainUI/AdminUI/dentists.php', '', "You've deleted dentist {$dentist['data']['fullname']} !");
            }
            else
            {
                redirect('../../MainUI/AdminUI/dentists.php', 'Cannot delete. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../MainUI/AdminUI/dentists.php', 'Something went wrong. Please try again!', '');
    }
?>