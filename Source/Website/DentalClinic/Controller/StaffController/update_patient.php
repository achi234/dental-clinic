<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updatePatient']))
    {
        $patient_id = $_POST['patient_id'];
        if(empty($_POST['customer_phone']) || empty($_POST['dentist_phone']) || empty($_POST['ngay_tao']) || empty($_POST['id_dichvu'])
          || empty($_POST['phi_kham']) /*|| empty($_POST['tongtien_thuoc']) || empty($_POST['tongtien'])*/)
        {
            redirect('../../MainUI/StaffUI/update_patients.php?id='.$patient_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $customer_phone = $_POST['customer_phone'];
            $dentist_phone = $_POST['dentist_phone'];
            $date_created = $_POST['ngay_tao'];
            $id_dichvu = $_POST['id_dichvu'];
            $phi_kham = $_POST['phi_kham'];
            
            // echo $customer_phone;
            // echo $dentist_phone;
            // echo $date_created;
            // echo $id_dichvu;
            // echo $phi_kham;

            $formattedDate = date('Y-m-d', strtotime($date_created));

            $dataPatient = [
                'SDT_KH'    => $customer_phone,
                'SDT_NS'      => $dentist_phone,
                'NgayTaoHoSo' => $formattedDate,
                'ID_DichVu' => $id_dichvu,
                'PhiKham' => $phi_kham,
            ];

            $updatePatient = updatebyKeyValue('HOSOKHACHHANG', 'ID_HoSo', $patient_id, $dataPatient);


            if($updatePatient['status'])
            {
                //echo "Here";
               redirect('../../MainUI/StaffUI/patients.php?id='.$patient_id, '', "You've modified patient successfully!");
            }
            else
            {
               redirect('../../MainUI/StaffUI/update_patients.php?id='.$patient_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>