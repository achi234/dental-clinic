<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-patient']))
    {
        $customer_phone = $_POST['customer_phone'];
        $dentist_phone = $_POST['dentist_phone'];
        //$ngaytaohoso = $_POST['ngay_tao'];
        $phikham = $_POST['phi_kham'];
        $id_dichvu = $_POST['id_dichvu'];
        //$tongtienthuoc = $_POST['tongtien_thuoc'];
        //$tongtien = $_POST['tongtien'];

        // echo $customer_phone;
        // echo $dentist_phone;
        // echo $ngaytaohoso;
        // echo $phikham;
        // echo $id_dichvu;
        
        if(!empty($customer_phone) && !empty($dentist_phone)  && !empty($phikham)
        &&  !empty($id_dichvu))
        {
            $dataPatient = [
                'SDT_KH' => $customer_phone,
                'SDT_NS' => $dentist_phone,
                'PhiKham' => $phikham,
                'ID_DichVu' => $id_dichvu,
                //'TongTienThuoc' => $tongtienthuoc,
                //'TongTien' => $tongtien,
            ];

            $addpatient = insert('HOSOKHACHHANG', $dataPatient);

            echo $addpatient['query'];

            if($addpatient['status'])
            {
                echo "You've added a new patient successfully!";
                redirect('../../MainUI/StaffUI/patients.php', '', "You've added patient's profile successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/StaffUI/add_patients.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/StaffUI/add_patients.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>