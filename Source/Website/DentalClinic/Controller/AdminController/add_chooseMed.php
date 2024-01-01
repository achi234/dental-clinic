<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-medicine']))
    {
        $patient_id = $_POST['ID_HoSo'];
        $medid = $_POST['ID_Thuoc'];
        $soluong = $_POST['SoLuong'];
        $price = $_POST['DonGia'];

        if(!empty($medid) && !empty($patient_id) 
        && !empty($price) && $price > 0  && !empty($total) && $total > 0)
        {
            $total = $soluong*$price;

            $dataCM = [
                'ID_HoSo' => $patient_id,
                'ID_Thuoc' => $medid,
                'SOLUONG' => $soluong,
                'DONGIA' => $price,
                'THANHTIEN' => $total,
            ];

            $addCM = insert('KEDON', $dataCM);

            echo $addCM['query'];

            if($addCM['status'])
            {
                echo "You've added medicine chosen successfully!";
                redirect('../../MainUI/AdminUI/choose_medicines.php', '', "You've added medicine chosen successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/AdminUI/add_medicines.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/AdminUI/add_medicines.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>