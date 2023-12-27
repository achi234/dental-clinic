<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-dentist']))
    {
        $fullname = $_POST['dentist_name'];
        $gender = $_POST['dentist_gender'];
        $phone = $_POST['dentist_phone'];
        $address = $_POST['dentist_address'];
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
                'UserType'    => 'Dentist',
            ];

            $addAccount = insert('ACCOUNT', $dataAccount);
            $addUser = insert('USER_DENTAL', $dataUser);

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