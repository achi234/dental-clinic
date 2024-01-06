<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-add-medicine']))
    {
        $medname = $_POST['TenThuoc'];
        $donvitinh = $_POST['DONVITINH'];
        $chidinh = $_POST['CHIDINH'];
        $slton = $_POST['SOLUONGTON'];
        $ngayhethan = $_POST['NGAYHETHAN'];
        $price = $_POST['GIATHUOC'];

        if(!empty($medname) && !empty($donvitinh) && !empty($slton) 
        && !empty($slton) && !empty($price) && $price > 0)
        {
            $dataMedicine = [
                'TenThuoc' => $medname,
                'DONVITINH' => $donvitinh,
                'CHIDINH' => $chidinh,
                'SOLUONGTON' => $slton,
                'NGAYHETHAN' => $ngayhethan,
                'GIATHUOC'        => $price,
            ];

            $addMedicine = insert('THUOC', $dataMedicine);

            echo $addMedicine['query'];

            if($addMedicine['status'])
            {
                echo "You've added medicine successfully!";
                redirect('../../MainUI/DentistUI/medicines.php', '', "You've added medicine successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/DentistUI/add_medicines.php', 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/DentistUI/add_medicines.php', 'All fields are required.', '');
            exit(0);                            
        }
    }
?>