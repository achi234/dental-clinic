<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-changeProfile']))
    {
        if(!empty(trim($_POST['sdt'])) && !empty(trim($_POST['hoten'])) && !empty(trim($_POST['matkhau'])) &&  !empty(trim($_POST['diachi'])) && !empty(trim($_POST['dob'])))
        {
            //echo 'Here';
            redirect('../../MainUI/CustomerUI/change_profile.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $phone = $_SESSION['sdt']['sdt'];
            $fullname = $_POST['hoten'];
            $address = $_POST['diachi'];
            $dob = $_POST['dob'];
            $password = $_POST['matkhau'];

            $formattedDOB = date('Y-m-d', strtotime($dob));

            if(empty($password))
            {
                $info = getbyKeyValue('TAIKHOAN', 'SDT',$sdt);
                $password = $info['data']['MatKhau'];
            }

            $dataCustomer = [
                'SDT_KH' => $phone,
                'HoTen_KH'    => $fullname,
                'NgaySinh' => $formattedDOB,
                'DiaChi' => $address,
            ];

            $dataAccount = [
                'SDT' => $phone,
                'MatKhau' => $password,
                'VaiTro' => 'CUSTOMER',
                'isActive' => 'YES',
            ];

            $updateCustomer = updatebyKeyValue('KHACHHANG', 'SDT_KH', $sdt, $dataCustomer);
            $updateTaikhoan = updatebyKeyValue('TAIKHOAN', 'SDT', $sdt, $dataAccount);
            
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
            
            if($updateCustomer['status'] && $updateTaikhoan['status'])
            {
                redirect('../../MainUI/CustomerUI/change_profile.php', '', "You've update your information successfully!");
            }
            else
            {
                echo $updateCustomer['query'];
                echo $updateTaikhoan['query'];
                
               redirect('../../MainUI/CustomerUI/change_profile.php', 'Something went wrong! Please enter again...', "");
            }

        }
    }
?>