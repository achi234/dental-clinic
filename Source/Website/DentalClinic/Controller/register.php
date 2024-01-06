<?php
    session_start();
    include("../config/config.php");
    include("./functions.php");
    $count = 0;
    if(isset($_POST['btn-register']))
    {    
        if(!empty(trim($_POST['sdt'])) && !empty(trim($_POST['hoten'])) && !empty(trim($_POST['matkhau'])) &&  !empty(trim($_POST['diachi'])) && !empty(trim($_POST['dob'])))
        {
            $phone = $_POST['sdt'];
            $fullname = $_POST['hoten'];
            $address = $_POST['diachi'];
            $dob = $_POST['dob'];
            $password = $_POST['matkhau'];

            $formattedDOB = date('Y-m-d', strtotime($dob));

                $dataCustomer = [
                    'SDT_KH' => $phone,
                    'HoTen_KH'    => $fullname,
                    'NgaySinh' => $dob,
                    'DiaChi' => $address,
                ];
                
                $dataAccount = [
                    'SDT' => $phone,
                    'MatKhau' => $password,
                    'VaiTro' => 'CUSTOMER',
                    'isActive' => 'YES',
                ];

                $addAccount = insert('TAIKHOAN', $dataAccount);
                $addcustomer = insert('KHACHHANG', $dataCustomer);
    
                //echo $addcustomer['query'];
    
                if($addcustomer['status'] && $addAccount['status'])
                {
                    echo "You've registered successfully!";
                    redirect('../login.php', '', "You've added customer successfully!Please login to continue");
                }
                else
                {
                   // echo "Something went wrong! Please enter again...";
                   
                    redirect('../register.php', 'Phone number has already registered!', "");
                }
            
        }         
        else
        {
                $_SESSION['status'] = 'All fields must be filled in.';
                header("location: ../register.php");
                exit(0);
        }    
    }
    else
    {
        $_SESSION['status'] = 'Please click registration button!';
        header("location: ../register.php");
        exit(0);
    }

?>