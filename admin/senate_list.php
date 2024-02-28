<?php
include("controller.php");
require_once('../normal_user/auth_user.php');

//global $db;



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="img/Logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="dist/js/1.js"></script>
    <script src="dist/js/2.js"></script>
    <script src="dist/js/3.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                </div>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                        <span class="hidden-xs"><?php echo $_SESSION['senator_fname']; ?> <?php echo $_SESSION['senator_lname']?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:#222d32;">
                            <div class="image">
                                <img src="<?php echo   $_SESSION['senator_photo'];?>" style="border-radius: 50%; width:100px;height: 100px;" alt="User Image">
                            </div>
                        </span>
                        <form method="POST">
                            <button type="submit" name="logout" class="dropdown-item dropdown-footer">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222d32;">
            <a href="home.php" class="brand-link">
                <img src="img/Logo.png" alt="Senate Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Senate Attendance</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="home.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="senate_attendance.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Attendance
                                </p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Senators
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="senate_list.php" class="nav-link active">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>All Senators</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="senate_sched.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Schedules</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a href="senate_deduction.php" class="nav-link">-->
<!--                                <i class="nav-icon fas fa-sticky-note"></i>-->
<!--                                <p>-->
<!--                                    Deduction-->
<!--                                </p>-->
<!--                            </a>-->
<!--                        </li>-->
                        <li class="nav-item">
                            <a href="senate_positions.php" class="nav-link">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>
                                    Positions
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="senate_minutes.php" class="nav-link">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>
                                    Minutes
                                </p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Commitee
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="comm_names.php" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Name</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="comm_members.php" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Members</p>
                                    </a>
                                </li>
                            </ul>
                        </li>




                        <li class="nav-item">
                            <a href="request.php" class="nav-link">
                                <i class="nav-icon fas fa-exclamation-circle"></i>
                                <p>
                                    Requests
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Senators</h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Senators</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div  data-toggle="modal" align="right" data-target="#modal-default">
                                    <button  class="btn btn-primary btn-flat" name="Sign_in"><i class="fas fas fa-plus"></i> Add Senator</button>
                                </div>
                                <br>
                                <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>Senator ID</th>
                                            <th>Photo</th>
                                            <th>Name</th>

                                            <th>Bank Details</th>
                                            <th>DOB</th>
                                            <th>Contact</th>
                                            <th>Program</th>




                                            <th>Position</th>
                                            <th>Member Since</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                $sql = "SELECT * FROM senate_list";
                $result = mysqli_query($db, $sql);

                while($row = mysqli_fetch_array($result))
                {
                    ?>
                                        <tr>
                                            <td><?php echo $row['student_id']; ?></td>
                                             <td><img src="<?php echo $row['senator_photo'];?>" style="width: 40px; height: 40px; border-radius: 50%"></td>
                                            <td><?php echo $row['senator_fname']; ?> <?php echo $row['senator_lname']; ?></td>
                                            <td><?php echo $row['senator_address']; ?></td>
                                            <td><?php echo $row['date_of_birth']; ?></td>
                                            <td><?php echo $row['senator_contact']; ?></td>
                                            <td><?php echo $row['senator_program']; ?></td>
                                            <td><?php echo $row['senator_position']; ?></td>
<!--                                            <td>--><?php //echo $row['emp_timein']; ?><!-- - --><?php //echo $row['emp_timeout']; ?><!--</td>-->
                                            <td><?php echo $row['senator_regdate']; ?></td>
                                            <td>
                                                <button class="btn btn-success btn-flat emp_edit" id="<?php echo $row['senate_id']; ?>"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-flat emp_delete" id="<?php echo $row['senate_id']; ?>"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                }
                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>
<!--============================== ADD MEMBER===================================================================-->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Register senate Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Student ID</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="student_id" id="student_id" placeholder="Enter Student ID" required>
                                <span id="status" style="color: purple; font-style: italic"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Firstname</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_name" placeholder="Enter First Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Lastname</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_lastname" placeholder="Enter Last Name" required>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">D O B</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="date_of_birth" placeholder="Enter Last Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Program</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="senator_program" placeholder="Enter Program of study" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Bank Details</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_address" placeholder="Bank Account Details" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Contact Info</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="emp_contact" placeholder="Enter Contact Number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-7">
                                <select name="emp_gender" class="form-control" required>
                                    <option hidden> - Select -</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer Not">Prefer Not to say</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-7">
                                <select name="emp_position" class="form-control" required>
                                    <option hidden> - Select -</option>
                                    <?php
                                    $sql = "SELECT * FROM senate_position";
                                    $result = mysqli_query($db, $sql);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                        <option value="<?php echo $row['position_title']; ?>">

                                            <?php echo $row['position_title']; ?>

                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-7">
                                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <!--                                <label class="col-sm-3 col-form-label">Member Type</label>-->
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="type"  value="member" hidden placeholder="Member Type" required>
                            </div>
                        </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add_senator"><i class="fas fa-save"></i> Add</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>



    <div id="emp_edit_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editing...</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body" id="emp_edit_details">
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="emp_update"><i class="fas fa-check"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.emp_edit').click(function() {
            var emp_edit_id = $(this).attr("id");
            $.ajax({
                url: "controller.php",
                method: "post",
                data: {
                    emp_edit_id: emp_edit_id
                },
                success: function(data) {
                    $('#emp_edit_details').html(data);
                    $('#emp_edit_modal').modal("show");
                }
            });
        });
    });
    </script>
    <div id="emp_delete_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deleting...</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body" id="emp_delete_details">
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" name="emp_delete"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
    $(document).ready(function() {
        $('.emp_delete').click(function() {
            var emp_del_id = $(this).attr("id");
            $.ajax({
                url: "controller.php",
                method: "post",
                data: {
                    emp_del_id: emp_del_id
                },
                success: function(data) {
                    $('#emp_delete_details').html(data);
                    $('#emp_delete_modal').modal("show");
                }
            });
        });
    });
    </script>



<!--    ===================================CHECKING IF student_id exist===================================================-->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("modal-default");
            var inputField = document.getElementById("student_id");
            var statusElement = document.getElementById("status");

            inputField.addEventListener("input", function() {
                var tag = inputField.value.trim(); // Trim whitespace from the input
                if (tag.length === 0) {
                    statusElement.textContent = ""; // Clear status if input is empty
                    return;
                }

                // Make an AJAX request to check if student ID exists
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var response = xhr.responseText;
                            statusElement.textContent = response;
                        } else {
                            statusElement.textContent = "Error: Unable to perform check.";
                        }
                    }
                };

                xhr.open("POST", "../login/check_user_id.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("student_id=" + encodeURIComponent(tag));
            });
        });
    </script>



    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>

    <script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    </script>
</body>

</html>






<!--==========================================================================-->


<!--if(isset($_POST["min_edit_id"]))-->
<!--{-->
<!--$output = '';-->
<!--$sql = "SELECT * FROM sched_minutes WHERE minutes_id = '".$_POST["min_edit_id"]."'";-->
<!--$result = mysqli_query($db, $sql);-->
<!--$output .= '-->
<!--<form method="POST">';-->
<!--    while($row = mysqli_fetch_array($result))-->
<!--    {   $id = $row["minutes_id"];-->
<!--    $title = $row['description'];-->
<!--    $output .= '-->
<!--    <input type="text" name="min_edit_id" class="form-control" value="'.$id.'" hidden>-->
<!--    <div class="text-center">-->
<!--        <p>DELETE POSITION</p>-->
<!--        <h2>'.$title.'</h2>-->
<!--    </div>-->
<!--    ';-->
<!--    }-->
<!--    $output .= "</form>";-->
<!--echo $output;-->
<!--}-->
<!--if(isset($_POST["min_edit"]))-->
<!--{   $id = $_POST['min_edit_id'];-->
<!--$sql = "DELETE FROM sched_minutes WHERE minutes_id = '$id'";-->
<!--$result = mysqli_query($db, $sql);-->
<!--echo '<script>-->
<!--    setTimeout(function() {-->
<!--        Swal.fire({-->
<!--            title: "Success !",-->
<!--            text: "Minutes has been Deleted!",-->
<!--            type: "success"-->
<!--        }).then(function() {-->
<!--            window.location = "senate_minutes.php";-->
<!--        });-->
<!--    }, 30);-->
<!--</script>';-->
<!--}-->




