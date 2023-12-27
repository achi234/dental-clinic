<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    
    if(isset($_POST['btn-changeProfile']))
    {
        if(empty($_POST['username']) || empty($_POST['user_phone']))
        {
            redirect('../../MainUI/AdminUI/change_profile.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $username = $_POST['username'];
            $phone = $_POST['user_phone'];
            $password = $_POST['new_password'];

            if(empty($password))
            {

            }
            else
            {
                
            }

        }
    }
?>