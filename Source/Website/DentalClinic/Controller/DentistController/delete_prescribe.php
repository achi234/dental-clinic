<?php

    include('../functions.php');
    include("../../config/config.php");

    session_start();

    global $conn;

    $param = checkParam('record_id');
    $medicine_id = checkParam('id');
    

    // echo $param;
    // echo $medicine_id;



    $query = "DELETE FROM KEDON WHERE ID_HoSo= '$param' AND ID_Thuoc='$medicine_id' ";
   
    $result = sqlsrv_query($conn, $query);

    if($result)
    {
        redirect('../../MainUI/DentistUI/update_patients.php?id='.$param, '', 'Delete prescribe successfully');
    }
    else
    {
        redirect('../../MainUI/DentistUI/update_patients.php?id='.$param, 'Cannot delete medicine choice. Please try again!', '');
    }

?>
