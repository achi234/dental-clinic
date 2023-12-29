<?php
$serverName = ".";
// $connectionOptions = array(
//     "Database" => "QLPKNHAKHOA",
//     "Uid" => "KIEUNHI",
//     "PWD" => "KIEUNHI"
// );

$connectionOptions = array(
    "Database" => "QLPHONGKHAMNHAKHOA",
    "Uid" => "ADMINISTRATOR",
    "PWD" => "ADMIN123"
);

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
