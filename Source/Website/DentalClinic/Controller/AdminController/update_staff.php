<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateStaff']))
    {
        $staff_id = $_POST['staff_id'];
        if(empty($_POST['staff_name']) || empty($_POST['staff_gender']) || empty($_POST['staff_address']) || empty($_POST['staff_phone'])
          || empty($_POST['user_name']))
        {
            redirect('../../MainUI/AdminUI/update_staffs.php?id='.$staff_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $staff_name = $_POST['staff_name'];
            $staff_gender = $_POST['staff_gender'];
            $staff_address = $_POST['staff_address'];
            $staff_phone = $_POST['staff_phone'];
            $username = $_POST['user_name'];
            $staff_password = $_POST['password'];

            $password = "";
            if(!empty($staff_password))
            {
                $password = $staff_password;
            }
            else
            {
                $staff = getbyKeyValue('ACCOUNT', 'Username', $username);
                $password = $staff['data']['Pass_word'];
            }

            $dataAccount = [
                'Pass_word' => $password,
            ];

            $dataUser = [
                'Fullname'    => $staff_name,
                'Gender'      => $staff_gender,
                'CurrAddress' => $staff_address,
                'PhoneNumber' => $staff_phone,
            ];

            $updateAccount = updatebyKeyValue('ACCOUNT', 'Username', $username, $dataAccount);
            $updateUser = updatebyKeyValue('USER_DENTAL', 'ID_User', $staff_id, $dataUser);

            // echo $updateAccount['query'];
            // echo '<br>';
            // echo $updateUser['query'];

            if($updateAccount['status'] && $updateUser['status'])
            {
                redirect('../../MainUI/AdminUI/staffs.php', '', "You've modified staff successfully!");
            }
            else
            {
                redirect('../../MainUI/AdminUI/update_staffs.php?id='.$staff_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>