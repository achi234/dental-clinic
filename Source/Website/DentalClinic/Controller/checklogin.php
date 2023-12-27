<?php
    session_start();
    include("../config/config.php");
    $count = 0;
    if(isset($_POST['btn-login']))
    {    
        if(!empty(trim($_POST['username'])) && !empty(trim($_POST['password'])))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];

            $username = stripslashes($username);
            $password = stripslashes($password);

            $sql="SELECT * FROM ACCOUNT WHERE username='$username' and pass_word='$password'";
            $stmt = sqlsrv_query($conn, $sql);

            if(!$stmt)
            {
                $_SESSION['status'] = 'Wrong Username or Password. Please enter again';
                header("location: ../login.php");
                exit(0);               
            }
            elseif(sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)['isActive'] == 'No')
            {
                $_SESSION['status'] = 'Your account has been banned!';
                header("location: ../login.php");
                exit(0); 
            }
            else
            {
                $sql="SELECT * FROM USER_DENTAL WHERE username='$username'";
                $stmt = sqlsrv_query($conn, $sql);
                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

                if(sqlsrv_num_rows($stmt) != 1)
                {
                    $count=sqlsrv_num_rows($stmt);
                    $_SESSION['authenticated'] = true;

                    $_SESSION['auth_user'] = 
                    [
                        'id' => $row['ID_User'],
                        'username' => $row['Username'],
                        'fullname' => $row['Fullname'],
                        'gender' => $row['Gender'],
                        'phone' => $row['PhoneNumber'],
                        'address' => $row['CurrAddress'],
                        'role' => $row['UserType'],
                    ];
            
                    switch($_SESSION['auth_user']['role'])
                    {
                        case 'Admin':
                            header("location: ../MainUI//AdminUI/dashboard.php");
                            exit(0);
                        //case "Dentist":
                        case "Nha si":
                            header("location: ../MainUI/DentistUI/dentistHomepage.php");
                            exit(0);
                        //case "Staff":
                        case "Nhan vien":
                            header("location: ../MainUI//StaffUI/dashboard.php");
                            exit(0);
                        default:
                            echo $_SESSION['auth_user']['role'];
                            $_SESSION['status'] = 'Error when directing...Please try again!';
                            header("location: ../login.php");
                            exit(0);
                    }
                }
                else
                {
                    $_SESSION['status'] = 'No user found in USER_DENTAL.';
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