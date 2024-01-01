<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateStaff']))
    {
        $staff_phone = $_POST['staff_phone'];
        if(empty($_POST['staff_name']))
        {
            redirect('../../MainUI/AdminUI/update_staffs.php?id='.$staff_phone, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $staff_phone = $_POST['staff_phone'];
            $staff_name = $_POST['staff_name'];
            $staff_password = $_POST['password'];

            $password = "";
            if(!empty($staff_password))
            {
                $password = $staff_password;
            }
            else
            {
                $staff = getbyKeyValue('TAIKHOAN', 'SDT', $staff_phone);
                $password = $staff['data']['MatKhau'];
            }

            $dataAccount = [
                'MatKhau' => $password,
            ];

            $dataUser = [
                'HoTen_NV'    => $staff_name,
            ];

            $updateAccount = updatebyKeyValue('TAIKHOAN', 'SDT', $staff_phone, $dataAccount);
            $updateUser = updatebyKeyValue('NHANVIEN', 'SDT_NV', $staff_phone, $dataUser);

            // echo $updateAccount['query'];
            // echo '<br>';
            // echo $updateUser['query'];

            if($updateAccount['status'] && $updateUser['status'])
            {
                redirect('../../MainUI/AdminUI/staffs.php', '', "You've modified staff successfully!");
            }
            else
            {
                redirect('../../MainUI/AdminUI/update_staffs.php?id='.$staff_phone, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>