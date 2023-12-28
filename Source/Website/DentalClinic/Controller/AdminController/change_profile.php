<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-changeProfile']))
    {
        if(empty($_POST['fullname']) || empty($_POST['user_phone'])|| empty($_POST['user_gender'])|| empty($_POST['user_address']))
        {
            //echo 'Here';
            redirect('../../MainUI/AdminUI/change_profile.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $id = $_SESSION['auth_user']['id'];
            $username =  $_SESSION['auth_user']['username'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['user_phone'];
            $gender = $_POST['user_gender'];
            $address = $_POST['user_address'];
            $password = $_POST['new_password'];


            if(empty($password))
            {
                $info = getbyKeyValue('ACCOUNT', 'Username',$username);
                $password = $info['data']['Pass_word'];
            }

            $dataUser = [
                'Fullname'    => $fullname,
                'Gender'      => $gender,
                'CurrAddress' => $address,
                'PhoneNumber' => $phone,
            ];

            $updateUser = updatebyKeyValue('USER_DENTAL', 'ID_User', $id, $dataUser);
            // echo $username;
            // echo '<br>';
            // echo $fullname;
            // echo '<br>';
            // echo $phone;
            // echo '<br>';
            // echo $gender;
            // echo '<br>';
            // echo $address;
            // echo '<br>';
            // echo $password;
            // echo '<br>';

            if($updateUser['status'])
            {
                redirect('../../MainUI/AdminUI/change_profile.php', '', "You've update your information successfully!");
            }
            else
            {
                redirect('../../MainUI/AdminUI/change_profile.php', 'Something went wrong! Please enter again...', "");
            }

        }
    }
?>