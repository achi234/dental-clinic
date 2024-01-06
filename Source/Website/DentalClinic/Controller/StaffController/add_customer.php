<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-customer']))
    {
        $phone = $_POST['customer_phone'];
        $fullname = $_POST['customer_name'];
        $address = $_POST['customer_address'];
        $dob = $_POST['customer_dob'];

        if(!empty($fullname) && !empty($phone) &&
        !empty($address)  && !empty($dob))
        {
            $dataCustomer = [
                'SDT_KH' => $phone,
                'HoTen_KH'    => $fullname,
                'NgaySinh' => $dob,
                'DiaChi' => $address,
            ];

            $addcustomer = insert('KHACHHANG', $dataCustomer);

            echo $addcustomer['query'];

            if($addcustomer['status'])
            {
                echo "You've added customer successfully!";
                redirect('../../MainUI/StaffUI/customers.php', '', "You've added customer successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/StaffUI/add_customers.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/StaffUI/add_customers.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>