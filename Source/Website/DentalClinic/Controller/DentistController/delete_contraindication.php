<?php

    include('../functions.php');
    include("../../config/config.php");

    session_start();

    global $conn;

    $param = checkParam('id');

    $medicine = checkParam('medicine');

    $query = "DELETE FROM CONTRAINDICATION WHERE ID_Customer= '$param' AND ID_Medicine= '$medicine' ";
   
    $result = sqlsrv_query($conn, $query);

    if($result)
    {
        redirect('../../MainUI/DentistUI/update_paitents.php?id='.$param, '', 'Delete contraindication successfully');
    }
    else
    {
        redirect('../../MainUI/DentistUI/update_paitents.php?id='.$param, 'Cannot delete contraindication. Please try again!', '');
    }

?>
