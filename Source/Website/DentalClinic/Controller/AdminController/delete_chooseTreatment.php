<?php

    include('../functions.php');
    include("../../config/config.php");

    session_start();

    global $conn;

    $param = checkParam('id');

    $treatment_id = checkParam('treatment_id');
    

    // echo $param;
    // echo $treatment_id;

    $query = "DELETE FROM DICHVU WHERE ID_Select= '$param' AND ID_Treatment='$treatment_id' ";
   
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
