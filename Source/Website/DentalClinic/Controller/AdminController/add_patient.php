<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-patient']))
    {
        $phone = $_POST['patient_phone'];
        $fullname = $_POST['patient_name'];
        $address = $_POST['patient_address'];
        $dob = $_POST['patient_dob'];

        if(!empty($fullname) && !empty($phone) &&
        !empty($address)  && !empty($dob))
        {
            $dataCustomer = [
                'SDT_KH' => $phone,
                'HoTen_KH'    => $fullname,
                'NgaySinh' => $dob,
                'DiaChi' => $address,
            ];

            $addpatient = insert('KHACHHANG', $dataCustomer);

            echo $addpatient['query'];

            if($addpatient['status'])
            {
                echo "You've added customer successfully!";
                redirect('../../MainUI/AdminUI/patients.php', '', "You've added customer successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_patients.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_patients.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>