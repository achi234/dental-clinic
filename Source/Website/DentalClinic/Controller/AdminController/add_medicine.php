<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-medicine']))
    {
        $medid = $_POST['ID_Thuoc'];
        $medname = $_POST['TenThuoc'];
        $donvitinh = $_POST['DONVITINH'];
        $chidinh = $_POST['CHIDINH'];
        $slton = $_POST['SOLUONGTON'];
        $ngayhethan = $_POST['NGAYHETHAN'];
        $price = $_POST['GIATHUOC'];

        if(!empty($medname) && !empty($price) && $price > 0)
        {
            $dataMedicine = [
                'ID_Thuoc' => $medid,
                'TenThuoc' => $medname,
                'DONVITINH' => $donvitinh,
                'CHIDINH' => $chidinh,
                'SOLUONGTON' => $slton,
                'NGAYHETHAN' => $ngayhethan,
                'GIATHUOC'        => $price,
            ];

            $addMedicine = insert('THUOC', $dataMedicine);

            echo $addMedicine['query'];

            if($addmedicine['status'])
            {
                echo "You've added medicine successfully!";
                redirect('../../MainUI/AdminUI/medicines.php', '', "You've added medicine successfully!");
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