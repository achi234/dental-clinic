<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-staff']))
    {
        $fullname = $_POST['staff_name'];
        $gender = $_POST['staff_gender'];
        $phone = $_POST['staff_phone'];
        $address = $_POST['staff_address'];
        $username = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($fullname) && !empty($gender) && !empty($phone) &&
        !empty($address)  && !empty($username) && !empty($password))
        {
            $dataAccount = [
                'Username'  => $username,
                'Pass_word' => $password,
            ];

            $dataUser = [
                'Fullname'    => $fullname,
                'Username'    => $username,
                'Gender'      => $gender,
                'CurrAddress' => $address,
                'PhoneNumber' => $phone,
                'UserType'    => 'Staff',
            ];

            $addAccount = insert('ACCOUNT', $dataAccount);
            $addUser = insert('USER_DENTAL', $dataUser);

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