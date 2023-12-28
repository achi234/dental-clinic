<?php

    include('../functions.php');
    include("../../config/config.php");

    session_start();

    global $conn;

    $param = checkParam('id');

    $tooth_id = checkParam('tooth_id');
    $surface_id = checkParam('surface_id');

    echo $param;
    echo $tooth_id;
    echo $surface_id;


    $query = "DELETE FROM CHOOSE_TOOTH WHERE ID_Select= '$param' AND ID_TOOTH='$tooth_id' AND ID_Surface= '$surface_id' ";
   
    $result = sqlsrv_query($conn, $query);

    if($result)
    {
        redirect('../../MainUI/DentistUI/update_treatmentplans.php?id='.$param, '', 'Delete tooth choice successfully');
    }
    else
    {
        redirect('../../MainUI/DentistUI/update_treatmentplans.php?id='.$param, 'Cannot delete tooth choice. Please try again!', '');
    }

?>
