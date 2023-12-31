<?php

    include('../functions.php');
    include("../../config/config.php");

    session_start();

    global $conn;

    $param = checkParam('id');

    //$treatment_id = checkParam('ID_DichVu');
    

    // echo $param;
    // echo $treatment_id;

    $query = "DELETE FROM DICHVU WHERE ID_DichVu= '$param'";
   
    $result = sqlsrv_query($conn, $query);

    if($result)
    {
        redirect('../../MainUI/AdminUI/update_treatmentplans.php?id='.$param, '', 'Delete treatment choice successfully');
    }
    else
    {
        redirect('../../MainUI/AdminUI/update_treatmentplans.php?id='.$param, 'Cannot delete treatment choice. Please try again!', '');
    }

?>
