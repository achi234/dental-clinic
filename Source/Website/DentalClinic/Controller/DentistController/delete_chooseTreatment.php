<?php

    include('../functions.php');
    include("../../config/config.php");

    session_start();

    global $conn;

    $param = checkParam('id');

    $treatment_id = checkParam('treatment_id');
    

    // echo $param;
    // echo $treatment_id;



    $query = "DELETE FROM CHOOSE_TREATMENT WHERE ID_Select= '$param' AND ID_Treatment='$treatment_id' ";
   
    $result = sqlsrv_query($conn, $query);

    if($result)
    {
        redirect('../../MainUI/DentistUI/update_treatmentplans.php?id='.$param, '', 'Delete treatment choice successfully');
    }
    else
    {
        redirect('../../MainUI/DentistUI/update_treatmentplans.php?id='.$param, 'Cannot delete treatment choice. Please try again!', '');
    }

?>
