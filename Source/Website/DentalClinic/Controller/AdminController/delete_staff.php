<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('id');
    if(is_numeric($param))
    {
        $staff_id = validate($param);

        $staff = getbyKeyValue('USER_DENTAL','ID_User', $staff_id);
        if($staff['status'] != 'Data Found')
        {
           redirect('../../MainUI/AdminUI/staffs.php', $staff['status'], '');
        }
        else
        {
            // echo "Here";
            // echo $staff['query'];

            // $deleteStaff = delete('STAFF', 'ID_Staff', $staff_id);
            // $deleteUser = delete('USER_DENTAL', 'ID_User', $staff_id);

            $dataAccount = [
                'isActive' => 'No',
            ];

            $updateAccount = updatebyKeyValue('ACCOUNT', 'Username', $staff['data']['Username'], $dataAccount);

            if($updateAccount['status'])
            {
                redirect('../../MainUI/AdminUI/staffs.php', '', "You've deleted staff {$staff['data']['fullname']} !");
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