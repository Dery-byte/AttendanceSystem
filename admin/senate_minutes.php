<?php
include("controller.php");
require_once('../normal_user/auth_user.php');

global $db;

?>

<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $file_name = $_FILES["fileToUpload"]["name"];
    $file_tmp = $_FILES["fileToUpload"]["tmp_name"];
    // Read file content
    $pdf_content = file_get_contents($file_tmp);
    // Insert into database
    $description = $_POST["description"];
    $sched_id = $_POST["sched_id"];
    $target_dir = "../admin/minutesFiles/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $filename = $_FILES['fileToUpload']['name'];
    if(!empty($filename)){
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../admin/minutesFiles/".$filename);
    }

    $stmt = $db->prepare("INSERT INTO sched_minutes (file, description, schedule_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $pdf_content, $description, $sched_id);

    if ($stmt->execute()) {
        echo '<script>
           setTimeout(function() {
               Swal.fire({
                   title: "Success !",
                   text: "Minutes Uploaded successfully",
                   type: "success"
                 }).then(function() {
                     window.location = "senate_minutes.php";
                 });
           }, 30);
       </script>';
    } else {
        echo "Error uploading file: " . $stmt->error;
    }

//    $stmt->close();
//    $db->close();
}

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
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Senators
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="senate_list.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
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

                    <li class="nav-item">
                        <a href="senate_positions.php" class="nav-link ">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                Positions
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="senate_minutes.php" class="nav-link active">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                Minutes
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
                        <h1 class="m-0 text-dark">Minutes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">Minutes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<!--=========================================================================================-->

        <section class="content">
            <div class="container-fluid">
                <div align="right">
                    <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Add Minutes</button>
                </div><br>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <?php
                                $sql0 = "SELECT count(senate_id) As 'Total' FROM senate_list";
                                $result0 = mysqli_query($db, $sql0);
                                $row0 = mysqli_fetch_array($result0);
                                $num0 = $row0['Total'];
                                ?>
                                <h3><?php echo $num0; ?></h3>
                                <p>Senators</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="senate_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <?php
                                $sql1 = "SELECT count(pos_id) As 'Pos' FROM senate_position";
                                $result1 = mysqli_query($db, $sql1);
                                $row1 = mysqli_fetch_array($result1);
                                $num1 = $row1['Pos'];
                                ?>
                                <h3><?php echo $num1; ?></h3>
                                <p>Total Positions</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="senate_positions.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-dark">
                            <div class="inner">
                                <?php
                                $sql2 = "SELECT count(*) As 'Ontime' FROM senate_attendance, senate_list, senate_sched WHERE senate_attendance.attendance_timein <= senate_sched.sched_in AND senate_attendance.senator_id = senate_list.student_id AND senate_sched.sched_id = senate_attendance.schedule AND senate_attendance.attendance_date = CURDATE();";
                                $result2 = mysqli_query($db, $sql2);
                                $row2 = mysqli_fetch_array($result2);
                                ?>
                                <h3><?php echo $row2['Ontime']; ?></h3>

                                <p>On Time Today</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="senate_attendance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <?php
                                $sql3 = "SELECT count(*) As 'Late' FROM senate_attendance, senate_list, senate_sched WHERE senate_attendance.attendance_timein > senate_sched.sched_in AND senate_attendance.senator_id = senate_list.student_id AND senate_sched.sched_id = senate_attendance.schedule AND senate_attendance.attendance_date = CURDATE(); ";
                                $result3 = mysqli_query($db, $sql3);
                                $row3 = mysqli_fetch_array($result3);
                                ?>
                                <h3><?php echo $row3['Late']; ?></h3>
                                <p>Late Today</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="senate_attendance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>

<!--                <div class="row">-->
<!--                    <section class="col-lg-5 connectedSortable">-->
<!---->
<!---->
<!--                    </section>-->
<!--                </div>-->

            </div>
        </section>


    </div>
</div>
<!--=======================================================================================-->


        <!--====================================================================================================================-->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-box">
                    <div class="login-logo">
                        <p class="bold">Minutes Upload</p>
                    </div>
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">Upload file to a meeting</p>
                            <form method="POST"  enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <select name="sched_id" class="form-control" required>
                                        <option hidden> - Select meeting -</option>
                                        <?php
                                        $sql = "SELECT * FROM senate_sched";
                                        $result = mysqli_query($db, $sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <option value="<?php echo $row['sched_id']; ?>">

                                                <?php echo $row['meeting_name']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="description" id="description" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>


                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <div align="right">
                                    <button type="submit" class="btn btn-primary btn-flat" name="pdf_file"><i class="fas fa-sign-in-alt"></i> Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
<!--===================================================================================================-->


<script>
    $(document).ready(function() {
        $('.pos_edit').click(function() {
            var pos_id = $(this).attr("id");
            $.ajax({
                url: "controller.php",
                method: "post",
                data: {
                    pos_id: pos_id
                },
                success: function(data) {
                    $('#pos_edit_details').html(data);
                    $('#pos_edit_modal').modal("show");
                }
            });
        });
    });
</script>

<!--<div id="pos_delete_modal" class="modal fade">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLabel">Deleting...</h5>-->
<!--                <button class="close" type="button" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">×</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <form method="POST">-->
<!--                <div class="modal-body" id="pos_delete_details">-->
<!--                </div>-->
<!--                <div class="modal-body"></div>-->
<!--                <div class="modal-footer justify-content-between">-->
<!--                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>-->
<!--                    <button type="submit" class="btn btn-danger btn-flat" name="pos_delete"><i class="fas fa-trash"></i> Delete</button>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<script>
    // $(document).ready(function() {
    //     $('.pos_delete').click(function() {
    //         var pos_del_id = $(this).attr("id");
    //         $.ajax({
    //             url: "controller.php",
    //             method: "post",
    //             data: {
    //                 pos_del_id: pos_del_id
    //             },
    //             success: function(data) {
    //                 $('#pos_delete_details').html(data);
    //                 $('#pos_delete_modal').modal("show");
    //             }
    //         });
    //     });
    // });
</script>

<script src="plugins/toastr/toastr.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
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