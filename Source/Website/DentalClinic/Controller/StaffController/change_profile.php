<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-changeProfile']))
    {
        if(empty($_POST['fullname']))
        {
            //echo 'Here';
            redirect('../../MainUI/StaffUI/change_profile.php', 'All fields are required.', '');
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

            $dataNV = [
                'HoTen_NV'    => $fullname,
                
            ];
            $dataTaiKhoan = [
                'MatKhau'    => $password,
            ];

            $updateNV = updatebyKeyValue('NHANVIEN', 'SDT_NV', $sdt, $dataNV);
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
            
            if($updateNV['status'] && $updateTaikhoan['status'])
            {
                redirect('../../MainUI/StaffUI/change_profile.php', '', "You've update your information successfully!");
            }
            else
            {
                echo $updateNV['query'];
                echo $updateTaikhoan['query'];
                
               redirect('../../MainUI/StaffUI/change_profile.php', 'Something went wrong! Please enter again...', "");
            }

        }
    }
?>