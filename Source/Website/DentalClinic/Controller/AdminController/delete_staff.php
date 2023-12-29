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
            // echo "Here";
            // echo $staff['query'];

            // $deleteStaff = delete('STAFF', 'ID_Staff', $staff_phone);
            // $deleteUser = delete('TAIKHOAN', 'SDT', $staff_phone);

            $dataAccount = [
                'isActive' => 'No',
            ];

            $updateAccount = updatebyKeyValue('TAIKHOAN', 'SDT', $staff['data']['SDT'], $dataAccount);

            if($updateAccount['status'])
            {
                redirect('../../MainUI/AdminUI/staffs.php', '', "You've deleted staff {$staff['data']['HoTen_NS']} !");
            }
            else
            {
                redirect('../../MainUI/AdminUI/staffs.php', 'Cannot delete. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../MainUI/AdminUI/staffs.php', 'Something went wrong. Please try again!', '');
    }
?>