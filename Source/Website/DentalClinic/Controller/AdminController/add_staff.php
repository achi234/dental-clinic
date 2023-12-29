<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-staff']))
    {
        $fullname = $_POST['staff_name'];
        $phone = $_POST['staff_phone'];
        $password = $_POST['password'];

        if(!empty($fullname)&& !empty($phone) && !empty($password))
        {
            $dataAccount = [
                'SDT'  => $phone,
                'MatKhau' => $password,
                'VaiTro'    => 'Staff',
            ];

            $dataUser = [
                'SDT_NV' => $phone,
                'HoTen_NV'    => $fullname,
            ];

            $addAccount = insert('TAIKHOAN', $dataAccount);
            $addUser = insert('STAFF', $dataUser);

            echo $addAccount['query'];
            echo $addUser['query'];

            if($addAccount['status'] && $addUser['status'])
            {
                echo "You've added staff successfully!";
                redirect('../../MainUI/AdminUI/staffs.php', '', "You've added staff successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_staffs.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_staffs.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>