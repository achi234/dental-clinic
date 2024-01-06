<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-changeProfile']))
    {
        if(empty($_POST['fullname']))
        {
            //echo 'Here';
            redirect('../../MainUI/AdminUI/change_profile.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $sdt = $_SESSION['sdt']['sdt'];
            $fullname = $_POST['fullname'];
            $password = $_POST['new_password'];


            if(empty($password))
            {
                $info = getbyKeyValue('TAIKHOAN', 'SDT',$sdt);
                $password = $info['data']['MatKhau'];
            }

            $dataAdmin = [
                'HoTen_Admin'    => $fullname,
                
            ];
            $dataTaiKhoan = [
                'MatKhau'    => $password,
            ];

            $updateAdmin = updatebyKeyValue('ADMINISTRATOR', 'SDT_Admin', $sdt, $dataAdmin);
            $updateTaikhoan = updatebyKeyValue('TAIKHOAN', 'SDT', $sdt, $dataTaiKhoan);
            
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
            
            if($updateAdmin['status'] && $updateTaikhoan['status'])
            {
                redirect('../../MainUI/AdminUI/change_profile.php', '', "You've update your information successfully!");
            }
            else
            {
                echo $updateAdmin['query'];
                echo $updateTaikhoan['query'];
                
               redirect('../../MainUI/AdminUI/change_profile.php', 'Something went wrong! Please enter again...', "");
            }

        }
    }
?>