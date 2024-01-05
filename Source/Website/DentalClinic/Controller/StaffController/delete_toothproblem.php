<?php

    include('../functions.php');
    include("../../config/config.php");

    session_start();

    global $conn;

    $param = checkParam('id');
    echo $param;
    echo "<br>";
    $description = checkParam('Description');

    $query = "DELETE FROM TOOTH_PROBLEM WHERE ID_Customer= '$param' AND Descript= '$description' ";
   
    $result = sqlsrv_query($conn, $query);

    if($result)
    {
        redirect('../../MainUI/StaffUI/update_paitents.php?id='.$param, '', 'Delete tooth problem successfully');
    }
    else
    {
        redirect('../../MainUI/StaffUI/update_paitents.php?id='.$param, 'Cannot delete. Please try again!', '');
    }

?>
