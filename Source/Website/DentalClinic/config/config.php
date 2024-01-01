<?php
$serverName = "LAPTOP-DUIAC375\SQLEXPRESS";
$connectionOptions = array(
     "Database" => "QLPHONGKHAMNHAKHOA",
     "Uid" => "KIEUNHI",
     "PWD" => "KIEUNHI"
 );

//$connectionOptions = array(
//    "Database" => "QLPHONGKHAMNHAKHOA",
//    "Uid" => "ADMINISTRATOR",
//    "PWD" => "ADMINISTRATOR"
//);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}
else{
    // echo "Connected!";
}
?>
