<?php
    session_start();
    include('./functions.php');  
    unset($_SESSION['authenticated']);
    unset($_SESSION['auth_user']);

    redirect('../login.php','','');
?>