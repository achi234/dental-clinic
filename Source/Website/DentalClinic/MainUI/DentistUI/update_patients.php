<?php
require_once('./partials/_head.php');

$record_id = $_GET['id'];
$record = getbyKeyValue('HOSOKHACHHANG', 'ID_HoSo', $record_id);
$precripts = getAllByKeyValue('KEDON', 'ID_HoSo', $record_id);
$patients = getAll('KHACHHANG');
$services = getAll('DICHVU');
?>

<body>
    <!-- Sidebar -->
    <?php
    require_once('./partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <div class="content">
            <!-- Top navbar -->
            <?php
            require_once('./partials/_topnav.php');
            ?>
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Please Fill All Fields</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" action="../../Controller/DentistController/update_patient.php">
                            <input type="hidden" name="patient_id" value="<?php echo $record['data']['ID_HoSo']; ?>">
                            <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer</label>
                                            <select name="customer_phone" class="form-control">
                                                <option>Select customer</option>
                                                <?php foreach ($patients['data'] as $patient) 
                                                { 
                                                    if($patients['SDT_KH'] == $recoeds['data']['SDT_KH'])
                                                    {?>
                                                    <option value="<?php echo $patient['SDT_KH']; ?>" selected> <?php echo $patient['HoTen_KH'];
                                                                                                              echo " (PhoneNum = {$patient['SDT_KH']})" ?></option>
                                                <?php 
                                                    }
                                                    else
                                                    { ?>
                                                    <option value="<?php echo $patient['SDT_KH']; ?>"> <?php echo $patient['HoTen_KH'];
                                                                                                              echo " (PhoneNum = {$patient['SDT_KH']})" ?></option>
                                                <?php
                                                    } 
                                                }?>
                                            </select>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Dentist Phone</label>
                                            <input type="text" name="dentist_phone" placeholder="Enter..." class="form-control"
                                            value="<?php echo $record['data']['SDT_NS']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Created</label>
                                            <?php
                                                $ngay_tao = $record['data']['NgayTaoHoSo']->format('Y-m-d');
                                            ?>
                                            <input type="date" name="ngay_tao" class="form-control" value="<?php echo $ngay_tao;?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Service</label>
                                            <!-- <input type="text" name="id_dichvu" placeholder="Enter service id" class="form-control"
                                            value="<?php echo $record['data']['ID_DichVu']; ?>"> -->
                                            <select name="id_dichvu" class="form-control">
                                                <?php foreach ($services['data'] as $service) 
                                                { 
                                                    if($services['ID_DichVu'] == $record['data']['ID_DichVu'])
                                                    {?>
                                                    <option value="<?php echo $service['ID_DichVu']; ?>" selected> <?php echo $service['TenDv'];
                                                                                                              echo " (ID = {$service['ID_DichVu']})" ?></option>
                                                <?php 
                                                    }
                                                    else
                                                    { ?>
                                                    <option value="<?php echo $service['ID_DichVu']; ?>"> <?php echo $service['TenDV'];
                                                                                                              echo " (ID = {$service['ID_DichVu']})" ?></option>
                                                <?php
                                                    } 
                                                }?>
                                            </select>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Examination Fee</label>
                                            <input type="text" name="phi_kham" placeholder="Enter amount" class="form-control"
                                            value="<?php echo $record['data']['PhiKham']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updatePatient" value="Update Record" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Kê đơn -->
            <div class="container">
                <div class="container-recent">
                    <form action="" method="POST" class="container-recent-inner">
                        <div class="container-recent__heading heading__button">
                            <p class="recent__heading-title">Prescribing List</p>
                            <a href="add_prescribes.php?id=<?php echo $record_id?>" class="btn-control btn-control-add">
                                <i class="fa-solid fa-pills btn-control-icon"></i>
                                Add prescription
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Medicine ID</th>
                                        <th class="text-column" scope="col">Medicine Name</th>
                                        <th class="text-column" scope="col">Amount</th>  
                                        <th class="text-column" scope="col">Price ($)</th> 
                                        <th class="text-column" scope="col">Total</th> 
                                        <th class="text-column" scope="col">Action</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    // $count = sizeof($precripts['data']);
                                    $status = $precripts['status'];
                                    //echo $staffs['data'];
                                    if($status != 'No Data Found')
                                    {
                                    ?>
                                        <?php  foreach($precripts['data'] as $precript) 
                                        {  
                                            $medicine = getbyKeyValue('THUOC', 'ID_Thuoc', $precript['ID_THUOC']);
                                            $medicine_name = $medicine['data']['TenThuoc'];
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $precript['ID_THUOC']?></th>
                                        <th class="text-column" scope="row"><?php echo $medicine_name?></th>
                                        <th class="text-column" scope="row"><?php echo $precript['SOLUONG']?></th>
                                        <th class="text-column" scope="row"><?php echo $precript['DONGIA']?></th> 
                                        <th class="text-column" scope="row"><?php echo $precript['THANHTIEN']?></th> 
 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="../../Controller/DentistController/delete_prescribe.php?id=<?php echo $precript['ID_THUOC'];?>&record_id=<?php echo $record_id?>" 
                                                    class="btn-control btn-control-delete">
                                                        <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                        Delete
                                                </a>

                                                <a href="update_prescribes.php?id=<?php echo $precript['ID_THUOC'];?>&record_id=<?php echo $record_id?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-pills btn-control-icon"></i>
                                                    Update
                                                </a>
                                            </div>
                                        </th> 
                                    </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {?>
                                       <th class="text-column" scope="row"><?php echo 'No Data Found'?></th> 
                                    <?php    
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
        
            <!-- Footer -->
            <?php 
            require_once('./partials/_footer.php'); 
            ?>
        </div>
    </div>

</body>
</html>
