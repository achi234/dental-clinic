<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-paitent']))
    {
        $fullname = $_POST['paitent_name'];
        $gender = $_POST['paitent_gender'];
        $phone = $_POST['paintent_phone'];
        $address = $_POST['paitent_address'];
        $dob = $_POST['paitent_dob'];

        if(!empty($fullname) && !empty($gender) && !empty($phone) &&
        !empty($address)  && !empty($dob))
        {
            $dataCustomer = [
                'Fullname'    => $fullname,
                'Gender'      => $gender,
                'CurrAddress' => $address,
                'PhoneNumber' => $phone,
                'DOB' => $dob,
            ];

            $addPaitent = insert('CUSTOMER', $dataCustomer);

            echo $addPaitent['query'];

            if($addPaitent['status'])
            {
                echo "You've added customer successfully!";
                redirect('../../MainUI/AdminUI/paitents.php', '', "You've added customer successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_paitents.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_paitents.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>