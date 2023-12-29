<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('sdt');
    if(is_numeric($param))
    {
        $dentist_phone = validate($param);

        $dentist = getbyKeyValue('TAIKHOAN','SDT', $dentist_phone);
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

            $updateAccount = updatebyKeyValue('TAIKHOAN', 'SDT', $dentist['data']['SDT'], $dataAccount);

            if($updateAccount['status'])
            {
                redirect('../../MainUI/AdminUI/dentists.php', '', "You've deleted dentist {$dentist['data']['HoTen_NS']} !");
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