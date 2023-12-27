<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    
    if(isset($_POST['btn-updateDentist']))
    {
        $dentist_id = $_POST['dentist_id'];
        if(empty($_POST['dentist_name']) || empty($_POST['dentist_gender']) || empty($_POST['dentist_address']) || empty($_POST['dentist_phone'])
          || empty($_POST['user_name']))
        {
            redirect('../../MainUI/AdminUI/update_dentists.php?id='.$dentist_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            echo "Here";
            $dentist_name = $_POST['dentist_name'];
            $dentist_gender = $_POST['dentist_gender'];
            $dentist_address = $_POST['dentist_address'];
            $dentist_phone = $_POST['dentist_phone'];
            $username = $_POST['user_name'];
            $dentist_password = $_POST['password'];

            $password = "";
            if(!empty($dentist_password))
            {
                $password = $dentist_password;
            }
            else
            {
                $dentist = getbyKeyValue('ACCOUNT', 'Username', $username);
                $password = $dentist['data']['Pass_word'];
            }

            $dataAccount = [
                'Pass_word' => $password,
            ];

            $dataUser = [
                'Fullname'    => $dentist_name,
                'Gender'      => $dentist_gender,
                'CurrAddress' => $dentist_address,
                'PhoneNumber' => $dentist_phone,
            ];

            $updateAccount = updatebyKeyValue('ACCOUNT', 'Username', $username, $dataAccount);
            $updateUser = updatebyKeyValue('USER_DENTAL', 'ID_User', $dentist_id, $dataUser);

            // echo $updateAccount['query'];
            // echo '<br>';
            // echo $updateUser['query'];

            if($updateAccount['status'] && $updateUser['status'])
            {
               redirect('../../MainUI/AdminUI/dentists.php', '', "You've modified dentist successfully!");
            }
            else
            {
                redirect('../../MainUI/AdminUI/update_dentists.php?id='.$dentist_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>