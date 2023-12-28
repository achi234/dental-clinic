<?php
require_once('./partials/_head.php');

$paitent_id = $_GET['id'];
$paitent = getbyKeyValue('CUSTOMER', 'ID_Customer', $paitent_id);
$tooth_problems = getAllByKeyValue('TOOTH_PROBLEM', 'ID_Customer', $paitent_id);
$contraindications = getAllByKeyValue('CONTRAINDICATION', 'ID_Customer', $paitent_id);
$selects = getAllByKeyValue('SELECT_TREATMENT', 'ID_Customer', $paitent_id);
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
                            <form method="POST" action="../../Controller/StaffController/update_patient.php">
                            <input type="hidden" name="patient_id" value="<?php echo $paitent['data']['ID_Customer']; ?>">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Name</label>
                                            <input type="text" name="patient_name" class="form-control" value="<?php echo $paitent['data']['Fullname']?>">
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Gender</label>
                                            <select name="patient_gender" id="ptGender" class="form-cotrol">
                                            <?php if($paitent['data']['Gender'] == 'F')
                                                { ?>
                                                    <option value="M" >Male</option>
                                                    <option value="F" selected>Female</option>
                                                <?php 
                                                } 
                                                else
                                                { ?>
                                                    <option value="M" selected>Male</option>
                                                    <option value="F" >Female</option>
                                                <?php 
                                                } 
                                                ?> 
                                            </select>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Phone Number</label>
                                            <input type="text" name="patient_phone" class="form-control" value="<?php echo $paitent['data']['PhoneNumber']?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Paitent Address</label>
                                            <input type="text" name="patient_address" class="form-control" value="<?php echo $paitent['data']['CurrAddress']?>">
                                        </div>
                                        <?php
                                            $paitent_dob = $paitent['data']['DOB']->format('Y-m-d');
                                        ?>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Of Birth</label>
                                            <input type="date" name="patient_dob" class="form-control" value="<?php echo $paitent_dob?>">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updatePaitent" value="Update Paitent" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Tooth Problem -->
            <div class="container">
                <div class="container-recent">
                <form method="POST" action="">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Tooth Problem</p>
                            <?php
                            if(isset($_POST["btn-add-problem"]))
                            {
                                $problem = $_POST["problem_text"];
                                if(!empty($problem))
                                {
                                    $dataProblem = [
                                        'ID_Customer' => $paitent_id,
                                        'Descript' => $problem,
                                        // 'NoteDate' => '2023-12-24 16:45',
                                    ];
                                    $addProblem = insert('TOOTH_PROBLEM', $dataProblem);
                                }
                                $tooth_problems = getAllByKeyValue('TOOTH_PROBLEM', 'ID_Customer', $paitent_id);
                            }
                            ?>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Descript" name="problem_text">
                                    <button class="btn-control btn-control-search" name="btn-add-problem">
                                        <i class="fa-solid fa-tooth btn-control-icon"></i>
                                        Add
                                    </button>                        
                            </div>

                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Paitent Id</th> 
                                        <th class="text-column" scope="col">Note Date</th> 
                                        <th class="text-column" scope="col">Description</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    // $count = sizeof($tooth_problems['data']);
                                    // echo $tooth_problems['status'];
                                    // if($count > 0)
                                    if($tooth_problems['status'] != 'No Data Found')
                                    {
                                ?>
                                        <?php  foreach($tooth_problems['data'] as $tooth_problem) 
                                        {  
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="col"><?php echo $paitent['data']['ID_Customer']; ?></th> 
                                        <?php
                                            $problem_time = $tooth_problem['NoteDate']->format('Y-m-d H:i');
                                        ?>
                                        <th class="text-column" scope="col"><?php echo $problem_time?></th> 
                                        <th class="text-column" scope="col"><?php echo $tooth_problem['Descript']?></th> 
                                        <th class="text-column" scope="col">
                                            <div class="text-column__action">
                                            <a href="../../Controller/StaffController/delete_toothproblem.php?id=<?php echo $paitent['data']['ID_Customer'];?>&Description=<?php echo $tooth_problem['Descript'];?>" 
                                            class="btn-control btn-control-delete">
                                                <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                Delete
                                            </a>
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
                    </div>
                </form>
                </div>
            </div>

            <!-- Contraindication -->
            <div class="container">
                <div class="container-recent">
                <form method="POST" action="">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Contraindication</p>
                            <?php
                            if(isset($_POST["btn-add-contraindication"]))
                            {
                                $medicine_id = $_POST["contraindication_text"];
                                if(!empty($medicine_id))
                                {
                                    $dataCI = [
                                        'ID_Customer' => $paitent_id,
                                        'ID_Medicine' => $medicine_id,
                                    ];
                                    $addCI = insert('CONTRAINDICATION', $dataCI);
                                }
                                $contraindications = getAllByKeyValue('CONTRAINDICATION', 'ID_Customer', $paitent_id);
                            }
                            ?>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Medicine Id" name="contraindication_text">
                                    <button class="btn-control btn-control-search" name="btn-add-contraindication">
                                        <i class="fa-solid fa-hand-dots btn-control-icon"></i>
                                        Add
                                    </button>                        
                            </div>

                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Paitent Id</th> 
                                        <th class="text-column" scope="col">Medicine Id</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    // $count = sizeof($contraindications['data']);
                                    //     if($count > 0)
                                    if($contraindications['status'] != 'No Data Found')
                                    {
                                    ?>
                                        <?php  foreach($contraindications['data'] as $contraindication) 
                                        {  
                                        ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $paitent['data']['ID_Customer']; ?></th> 
                                        <th class="text-column" scope="row"><?php echo $contraindication['ID_Medicine']; ?></th>
                                        <th class="text-column" scope="col">
                                            <div class="text-column__action">
                                            <a href="../../Controller/StaffController/delete_contraindication.php?id=<?php echo $paitent['data']['ID_Customer'];?>&medicine=<?php echo $contraindication['ID_Medicine'];?>" 
                                            class="btn-control btn-control-delete">
                                                <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                Delete
                                            </a>
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
                    </div>
                </form>
                </div>
            </div>

            <!-- Select Treatment -->
            <div class="container">
                <div class="container-recent">
                <!-- <form method="POST" action="../../Controller/StaffController/add_toothproblem.php"> -->
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Treatment Plan</p>
                            <a href="add_treatmentplans.php?id=<?php echo $paitent_id?>" class="btn-control btn-control-add">
                                <i class="fa-solid fa-square-check btn-control-icon"></i>
                                Add new plan
                            </a>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Paitent Id</th> 
                                        <th class="text-column" scope="col">Select Treatment Id</th> 
                                        <th class="text-column" scope="col">Dentist Id</th> 
                                        <th class="text-column" scope="col">DateTime</th> 
                                        <th class="text-column" scope="col">Return Days</th> 
                                        <th class="text-column" scope="col">Status</th> 
                                        <th class="text-column" scope="col">Actions</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php
                                    if($selects['status'] != 'No Data Found')
                                    {
                                    ?>
                                        <?php  foreach($selects['data'] as $select) 
                                        {  
                                        ?>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $paitent['data']['ID_Customer']; ?></th> 
                                        <th class="text-column" scope="row"><?php echo $select['ID_Select']?></th> 
                                        <th class="text-column" scope="row"><?php echo $select['ID_Dentist']?></th> 
                                        <?php
                                            $select_time = $select['DateSelect']->format('Y-m-d H:i:s');
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $select_time?></th> 
                                        <th class="text-column" scope="row"><?php echo $select['ReturnDays']?></th> 
                                        <th class="text-column" scope="row">
                                        <?php if($select['SelectionStatus'] == 'Planning')
                                            {?>
                                                <span class="badge badge-plan">Planning</span>
                                            <?php
                                            }
                                            elseif($select['SelectionStatus'] == 'Completed')
                                            {
                                            ?>
                                                <span class="badge badge-success">Completed</span>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <span class="badge badge-unsuccess">Canceled</span>
                                            <?php
                                            }
                                        ?>
                                        </th> 
                                        <th class="text-column" scope="row">
                                            <a href="update_treatmentplans.php?id=<?php echo $select['ID_Select']?>" class="btn-control btn-control-edit">
                                                <i class="fa-solid fa-square-check btn-control-icon"></i>
                                                View detail
                                            </a>
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
                    </div>
                <!-- </form> -->
                </div>
            </div>

            <!-- Footer -->
            <?php 
            require_once('./partials/_footer.php'); 
            ?>
        </div>
    </div>

</body>
</html>
