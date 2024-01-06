<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateMedicine']))
    {
        $medicine_id = $_POST['medicine_id'];
        $record_id = $_POST['$patient_id'];
        
        if(empty($_POST['medicine_name']) || empty($_POST['medicine_price']) 
        || empty($_POST['donvitinh']) || empty($_POST['soluongton'])
        || empty($_POST['ngayhethan']) || empty($_POST['chidinh']))
        {
            redirect('../../MainUI/AdminUI/update_medicines.php?id='.$medicine_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $medicine_name = $_POST['medicine_name'];
            $donvitinh = $_POST['donvitinh'];
            $soluongton= $_POST['soluongton'];
            $chidinh = $_POST['chidinh'];
            $ngayhethan = $_POST['ngayhethan'];
            $medicine_price = $_POST['medicine_price'];

            $formattedNHH = date('Y-m-d', strtotime($ngayhethan));

            $data = [
                'TenThuoc' => $medicine_name,
                'DONVITINH' => $donvitinh,
                'CHIDINH' => $chidinh,
                'NGAYHETHAN' => $formattedNHH,
                'SOLUONGTON' => $soluongton,
                'GIATHUOC' => $medicine_price,
            ];


            $updateMedicine = updatebyKeyValue('THUOC', 'ID_THUOC', $medicine_id, $data);


            if($updateMedicine['status'])
            {
                redirect('../../MainUI/AdminUI/update_medicines.php?id='.$medicine_id, '', "You've modified medicine successfully!");
            }
            else
            {
                redirect('../../MainUI/AdminUI/update_medicines.php?id='.$medicine_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>