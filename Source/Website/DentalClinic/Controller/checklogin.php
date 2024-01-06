<?php
    session_start();
    include("../config/config.php");
    include("./functions.php");
    $count = 0;
    if(isset($_POST['btn-login']))
    {    
        if(!empty(trim($_POST['sdt'])) && !empty(trim($_POST['matkhau'])))
        {
            $sdt=$_POST['sdt'];
            $matkhau=$_POST['matkhau'];

            $sdt = stripslashes($sdt);
            $matkhau = stripslashes($matkhau);

            $sql="SELECT * FROM TAIKHOAN WHERE SDT='$sdt' and MatKhau='$matkhau'";
            $stmt = sqlsrv_query($conn, $sql);
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            if(!sqlsrv_has_rows($stmt))
            {
                $_SESSION['status'] = 'Wrong Phone number or Password. Please enter again';
                header("location: ../login.php");
                exit(0);               
            }
            elseif($row['isActive'] == 'No')
            {
                $_SESSION['status'] = 'Your account has been banned!';
                header("location: ../login.php");
                exit(0); 
            }
            else
            {
                $sql="SELECT * FROM TAIKHOAN WHERE SDT='$sdt'";
                $stmt = sqlsrv_query($conn, $sql);
                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);


                if(sqlsrv_has_rows($stmt))
                {
                    
                    $_SESSION['authenticated'] = true;

                    $_SESSION['sdt'] = 
                    [
                        'sdt' => $row['SDT'],
                        /*'hoten_kh' => $row['HoTen_KH'],
                        'ngaysinh' => $row['NgaySinh'],
                        'diachi' => $row['DiaChi'],*/
                        'vaitro' => $row['VaiTro'],
                    ];
            
                    switch($_SESSION['sdt']['vaitro'])
                    {
                        case 'ADMINISTRATOR':
                            header("location: ../MainUI/AdminUI/dashboard.php");
                            exit(0);
                        case "DENTIST":
                            header("location: ../MainUI/DentistUI/dashboard.php");
                            exit(0);
                        case "STAFF":
                            header("location: ../MainUI/StaffUI/dashboard.php");
                            exit(0);
                        case "CUSTOMER":
                            header("location: ../MainUI/CustomerUI/dashboard.php");
                            exit(0);
                        default:
                            echo $_SESSION['sdt']['vaitro'];
                            $_SESSION['status'] = 'Error when directing...Please try again!';
                            header("location: ../login.php");
                            exit(0);
                    }
                }
                else
                {
                    $_SESSION['status'] = 'No user found.';
                    header("location: ../login.php");
                    exit(0);
                }
            }
        }
        else
        {
            $_SESSION['status'] = 'All fields must be filled in.';
            header("location: ../login.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = 'Please click login button!';
        header("location: ../login.php");
        exit(0);
    }

?>