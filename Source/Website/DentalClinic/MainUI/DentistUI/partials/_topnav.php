<?php
    //session_start();
    global $conn;
    $sql = "SELECT HoTen_NS FROM NHASI WHERE SDT_NS = {$_SESSION['sdt']['sdt']}";
    $result = sqlsrv_query($conn, $sql);
    
    $name= "";
    if(sqlsrv_has_rows($result))
    {
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        $name = $row['HoTen_NS'];
    }
    
?>
<div class="navbar navbar-top navbar-expand-md">
    <div class="container container-header">
        <a href="dashboard.php" class="h4 container__dashboard-name">SYSTEM DENTIST DASHBOARD</a>

        <li class="navbar-user">
            <img src="../../assets/image/user_avatar.png" alt="" class="navbar-user-img">
            <span class="navbar-user-name"><?php 
            echo $name?></span>

            <ul class="navbar-user-menu">
                <li class="navbar-nav__item">
                    <a href="change_profile.php" class="nav-item__link text-primary">
                        <i class="fa-solid fa-user nav-item__icon"></i>
                        <p class="nav-item__text">My profile</p>
                    </a>
                </li>  
                
                <hr class="">
                
                <li class="navbar-nav__item">
                    <a href="../../Controller/logout.php" class="nav-item__link text-primary">
                        <i class="fa-solid fa-person-running nav-item__icon"></i>
                        <p class="nav-item__text">Logout</p>
                    </a>
                </li>                       
            </ul>
        </li>
    </div>
</div>
