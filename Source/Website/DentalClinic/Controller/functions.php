<?php
    //session_start();

    function validate($data)
    {
        global $conn;
        //$validateData = sqlsrv_real_escape_string($conn, $data);

        return trim($data);
    }

    function redirect($path, $status, $noti)
    {
        $_SESSION['status'] = $status;
        $_SESSION['noti'] = $noti;
        header('location: ' .$path);
        exit(0);
    }

    function insert($tableName, $data)
    {
        global $conn;

        $table = validate($tableName);

        $keys = array_keys($data);
        $values = array_values($data);
       
        $keys = implode(',' , $keys);
        $values = "'".implode("','" , $values)."'";

        $query = "INSERT INTO $table ($keys) VALUES ($values)";
        
        //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        //echo $query;
        $result = 
        [ 'status' => sqlsrv_query($conn, $query),
           'query' => $query,
        ];
        return $result;
    }
    function updatebyKeyValue($tableName, $keys, $values, $data)
    {
        global $conn;
        //print_r($data);
        $table = validate($tableName);
        $keys = validate($keys);
        $values = validate($values);


        $dataString = "";

        //" key=value,"
        foreach($data as $key => $value)
        {
            $dataString .= "$key = '$value', ";
        }

        $setClause = rtrim($dataString, ', ');

        $query = "UPDATE $table SET $setClause WHERE $keys ='$values'";

        //echo $query;
        $result =  [
            'status' => sqlsrv_query($conn, $query),
            'query'  => $query,
        ];


        return $result;
    }

    
    function getAllWithPagination($tableName, $pageSize, $pageNumber, $pageOrder)
    {
        global $conn;

        $table = validate($tableName);
        $startRow = ($pageNumber - 1) * $pageSize;

        $query = "SELECT COUNT(*) as total FROM $table"; // Đếm tổng số dòng
        $result = sqlsrv_query($conn, $query);
        $totalRows = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)['total'];

        $query = "SELECT * FROM $table ORDER BY $pageOrder OFFSET $startRow ROWS FETCH NEXT $pageSize ROWS ONLY";
        $result = sqlsrv_query($conn, $query);

        if ($result) {
            $data = array();

            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }

            $response = [
                'status' => 'Data Found',
                'data' => $data,
                'total' => $totalRows,
            ];
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
        }

        return $response;
    }

    function getByUserTypeWithPagination($tableName, $userType, $pageSize, $pageNumber, $pageOrder)
    {
        global $conn;

        $table = validate($tableName);
        $startRow = ($pageNumber - 1) * $pageSize;
        $userType = validate($userType);

        $query = "SELECT COUNT(*) as total FROM $table WHERE UserType = '$userType'"; // Đếm tổng số dòng
        $result = sqlsrv_query($conn, $query);
        $totalRows = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)['total'];

        $query = "SELECT * FROM $table WHERE UserType = '$userType' ORDER BY $pageOrder OFFSET $startRow ROWS FETCH NEXT $pageSize ROWS ONLY";
        $result = sqlsrv_query($conn, $query);

        if ($result) {
            $data = array();

            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }

            $response = [
                'status' => 'Data Found',
                'data' => $data,
                'total' => $totalRows,
            ];
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
        }

        return $response;
    }

    function getAll($tableName)
    {
        global $conn;
    
        $table = validate($tableName);
    
        $query = "SELECT * FROM $table";
        $result = sqlsrv_query($conn, $query);
    
        if ($result) {
            $data = array();
    
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }
    
    function getAllByKeyValue($tableName, $key, $value)
    {
        global $conn;
    
        $table = validate($tableName);
    
        $query = "SELECT * FROM $table WHERE $key = '$value'";
        $result = sqlsrv_query($conn, $query);
    
        if ($result) {
            $data = array();
    
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }

    function getTopAppt($count)
    {
        global $conn;
    
        $count = validate($count);

        $query = "SELECT TOP $count *
                FROM APPOINTMENT
                ORDER BY Date_Appt DESC, Time_Appt DESC";
        $result = sqlsrv_query($conn, $query);
    
        if ($result) {
            $data = array();
    
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }

    function getTopInvoice($count)
    {
        global $conn;
    
        $count = validate($count);

        $query = "SELECT TOP $count *
                FROM INVOICE
                ORDER BY InvoiceTime DESC";
        $result = sqlsrv_query($conn, $query);
    
        if ($result) {
            $data = array();
    
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }

    function getbyKeyValue($tableName, $key, $value)
    {
        global $conn;

        $table = validate($tableName);
        $key = validate($key);
        $value = validate($value);

        $query = "SELECT * FROM $table WHERE $key = '$value'";
        $result =  sqlsrv_query($conn, $query);


        if($result)
        {
            $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            //$cnt = sqlsrv_num_rows($result);
            if($row == 0)
            {
                $response = [
                    'status' => 'No Data Found',
                    'query' => $query,
                    
                ];
                return $response;
            }
            else
            {

                $response = [
                    'status' => 'Data Found',
                    'data' => $row,
                    'query' => $query,
                ];
                return $response;
            }
        }
        else
        {
            $response = [
                'status' => 'Somethig went wrong! Please try again.',
            ];
            return $response;
        }
    }


    function delete($tableName, $key, $value)
    {
        global $conn;

        $table = validate($tableName);
        $key = validate($key);
        $value = validate($value);

        $query = "DELETE FROM $table WHERE $key = '$value'";
        
        $result = [
           'status' => sqlsrv_query($conn, $query),
           'query'  => $query
        ];

        return $result;
    }

    // Hàm lấy tên các cột trong bảng
    function getTableColumns($tableName)
    {
        global $conn;
    
        // Xác thực và tránh SQL injection
        $tableName = validate($tableName);
    
        // Truy vấn để lấy tên các cột
        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ?";
        
        // Thực thi truy vấn
        $params = array($tableName);
        $result = sqlsrv_query($conn, $query, $params);
    
        $columns = array();
    
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $columns[] = $row['COLUMN_NAME'];
        }
    
        return $columns;
    }

    function searchUserByKeyword($tableName, $value, $userType)
    {
        global $conn;
    
        $table = validate($tableName);
        $userType = validate($userType);
        $value = validate($value);
    
        $query = "SELECT * FROM $table WHERE (UserType = '$userType') AND ";
        $columns = getTableColumns($tableName);
    
        $conditions = [];
        foreach ($columns as $column) {
            $conditions[] = "$column LIKE '%$value%'";
        }
    
        $query = "SELECT * FROM $tableName WHERE UserType = '$userType' AND ";
        $query = str_pad($query, strlen($query) + 1, "(");
        $query .= implode(" OR ", $conditions);
        $query = str_pad($query, strlen($query) + 1, ")");

        // Thực hiện truy vấn chính
        $result = sqlsrv_query($conn, $query);

        if ($result) {
            $data = array();
    
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }

    function searchByKeyword($tableName, $value)
    {
        global $conn;
    
        $table = validate($tableName);
        $value = validate($value);
    
        $query = "SELECT * FROM $table WHERE ";
        $columns = getTableColumns($tableName);
    
        $conditions = [];
        foreach ($columns as $column) {
            $conditions[] = "$column LIKE '%$value%'";
        }
    
        $query = "SELECT * FROM $tableName WHERE ";
        $query = str_pad($query, strlen($query) + 1, "(");
        $query .= implode(" OR ", $conditions);
        $query = str_pad($query, strlen($query) + 1, ")");
    
        // Thực hiện truy vấn chính
        $result = sqlsrv_query($conn, $query);
    
        if ($result) {
            $data = array();
    
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }

    function getbyUserType($tableName, $userType)
    {
        global $conn;

        $table = validate($tableName);
        $userType = validate($userType);
    
        $query = "SELECT * FROM $table WHERE UserType = '$userType'";
        $result = sqlsrv_query($conn, $query);
    
        if ($result) {
            $data = [];
    
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }
    
    function getIdbyUserType($tableName, $userType)
    {
        global $conn;

        $table = validate($tableName);
        $userType = validate($userType);
    
        $query = "SELECT ID_User, Fullname FROM $table WHERE UserType = '$userType'";
        $result = sqlsrv_query($conn, $query);
    
        if ($result) {
            $data = [];
    
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
    
            if (!empty($data)) {
                $response = [
                    'status' => 'Data Found',
                    'data' => $data,
                ];
            } else {
                $response = [
                    'status' => 'No Data Found',
                ];
            }
    
            return $response;
        } else {
            $response = [
                'status' => 'Something went wrong! Please try again.',
            ];
            return $response;
        }
    }
    

    function checkParam($type)
    {
        if(!empty($_GET[$type]))
        {
            return $_GET[$type];
        }
        else
        {
            return false;
        }
    }
?>