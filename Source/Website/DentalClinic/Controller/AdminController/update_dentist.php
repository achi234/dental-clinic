<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    
    if(isset($_POST['btn-updateDentist']))
    {
        $dentist_phone = $_POST['dentist_phone'];
        if(empty($_POST['dentist_name']))
        {
            redirect('../../MainUI/AdminUI/update_dentists.php?id='.$dentist_phone, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            echo "Here";
            $dentist_name = $_POST['dentist_name'];
            $dentist_phone = $_POST['dentist_phone'];
            $dentist_password = $_POST['password'];

            $password = "";
            if(!empty($dentist_password))
            {
                $password = $dentist_password;
            }
            else
            {
                $dentist = getbyKeyValue('TAIKHOAN', 'SDT', $dentist_phone);
                $password = $dentist['data']['MatKhau'];
            }

            $dataAccount = [
                'MatKhau' => $password,
            ];

            $dataUser = [
                'HoTen_NS'    => $dentist_name,
            ];

            $updateAccount = updatebyKeyValue('TAIKHOAN', 'SDT', $dentist_phone, $dataAccount);
            $updateUser = updatebyKeyValue('NHASI', 'SDT_NS', $dentist_phone, $dataUser);

            // echo $updateAccount['query'];
            // echo '<br>';
            // echo $updateUser['query'];

            if($updateAccount['status'] && $updateUser['status'])
            {
               redirect('../../MainUI/AdminUI/dentists.php', '', "You've modified dentist successfully!");
            }
            else
            {
                redirect('../../MainUI/AdminUI/update_dentists.php?id='.$dentist_phone, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>