<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();

    if(isset($_POST['btn-updatePrescribe']))
    {
        $select_id = $_POST['id_hoso'];
        $medicine_id = $_POST['id_thuoc'];
        $quantity = $_POST['soluong'];

        
        if(!empty($select_id) && !empty($medicine_id) && 
         !empty($quantity))
        {
            $dataUpdate = [
                'ID_HoSo' => $select_id,
                'ID_Thuoc' => $medicine_id,
                'Soluong' => $quantity,
            ];

            global $conn;

            $sql = "UPDATE KEDON SET Soluong = {$quantity}
            WHERE ID_HoSo ={$select_id} AND ID_Thuoc ={$medicine_id}";

            $result = sqlsrv_query($conn, $sql);


            if($result)
            {

                echo "You've updated successfully!";
                redirect('../../MainUI/StaffUI/update_patients.php?id='.$select_id, '', "You've added prescribe successfully!");
            }
            else
            {
                echo "Something went wrong! Please enter again...";
                redirect('../../MainUI/StaffUI/update_patients.php?id='.$select_id, 'Something went wrong! Please enter again...', "");
            }                            
        }
        else
        {
            echo "All fields are required.";
            redirect('../../MainUI/StaffUI/update_prescribes.php?id='.$medicine_id.'&record_id='.$select_id, 'All fields are required.', '');
            exit(0);                            
        }
    }
?>