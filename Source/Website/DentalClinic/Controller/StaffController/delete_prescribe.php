<?php

    include('../functions.php');
    include("../../config/config.php");

    session_start();

    global $conn;

    $param = checkParam('id');

    $medicine_id = checkParam('medicine_id');
    

    // echo $param;
    // echo $medicine_id;



    $query = "DELETE FROM PRESCRIBE WHERE ID_Select= '$param' AND ID_Medicine='$medicine_id' ";
   
    $result = sqlsrv_query($conn, $query);

    if($result)
    {
        redirect('../../MainUI/StaffUI/update_treatmentplans.php?id='.$param, '', 'Delete prescribe successfully');
    }
    else
    {
        redirect('../../MainUI/StaffUI/update_treatmentplans.php?id='.$param, 'Cannot delete medicine choice. Please try again!', '');
    }

?>
