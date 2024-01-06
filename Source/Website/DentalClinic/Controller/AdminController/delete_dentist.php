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
            $dataAccount = [
                'isActive' => 'NO',
            ];

            $updateAccount = updatebyKeyValue('TAIKHOAN', 'SDT', $dentist['data']['SDT'], $dataAccount);

            //echo $updateAccount['query'];
            
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