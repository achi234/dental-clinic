<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-changeProfile']))
    {
        if(empty($_POST['fullname']))
        {
            //echo 'Here';
            redirect('../../MainUI/DentistUI/change_profile.php', 'All fields are required.', '');
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

            $dataDentist = [
                'HoTen_NS'    => $fullname,
                
            ];
            $dataTaiKhoan = [
                'MatKhau'    => $password,
            ];

            $updateDentist = updatebyKeyValue('NHASI', 'SDT_NS', $sdt, $dataDentist);
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
            
            if($updateDentist['status'] && $updateTaikhoan['status'])
            {
                redirect('../../MainUI/DentistUI/change_profile.php', '', "You've update your information successfully!");
            }
            else
            {
                echo $updateDentist['query'];
                echo $updateTaikhoan['query'];
                
               redirect('../../MainUI/DentistUI/change_profile.php', 'Something went wrong! Please enter again...', "");
            }

        }
    }
?>