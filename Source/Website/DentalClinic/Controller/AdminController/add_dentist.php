<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-dentist']))
    {
        $phone = $_POST['SDT_NS'];
        $fullname = $_POST['HoTen_NS'];
        $password = $_POST['MatKhau'];

        if(!empty($fullname) && !empty($phone)  && !empty($password))
        {
            $dataAccount = [
                'SDT'  => $phone,
                'MatKhau' => $password,
                'VaiTro'    => 'DENTIST'
            ];

            $dataUser = [
                'SDT_NS' => $phone,
                'HoTen_NS'    => $fullname,
            ];

            $addAccount = insert('TAIKHOAN', $dataAccount);
            $addUser = insert('NHASI', $dataUser);

            echo $addAccount['query'];
            echo $addUser['query'];

            if($addAccount['status'] && $addUser['status'])
            {
                echo "You've added dentist successfully!";
                redirect('../../MainUI/AdminUI/dentists.php', '', "You've added dentist successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_dentists.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_dentists.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>