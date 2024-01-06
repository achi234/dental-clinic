<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('sdt');
    if(is_numeric($param))
    {
        $staff_phone = validate($param);

        $staff = getbyKeyValue('TAIKHOAN','SDT', $staff_phone);
        if($staff['status'] != 'Data Found')
        {
           redirect('../../MainUI/AdminUI/staffs.php', $staff['status'], '');
        }
        else
        {
            $dataAccount = [
                'isActive' => 'NO',
            ];

            $updateAccount = updatebyKeyValue('TAIKHOAN', 'SDT', $staff['data']['SDT'], $dataAccount);

            //echo $updateAccount['query'];
            
            if($updateAccount['status'])
            {
                redirect('../../MainUI/AdminUI/staffs.php', '', "You've deleted staff {$staff['data']['HoTen_NV']} !");
            }
            else
            {
                redirect('../../MainUI/AdminUI/staffs.php', 'Cannot delete. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../MainUI/AdminUI/dentists.php', 'Something went wrong. Please try again!', '');
    }
?>