<?php
include("controller.php");
require_once('../normal_user/auth_user.php');


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
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

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
                                    <a href="senate_list.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> All Senators</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="senate_sched.php" class="nav-link active">
                                        <i class="fas fa-circle nav-icon"></i>
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


                        <li class="nav-item">
                            <a href="request.php" class="nav-link">
                                <i class="nav-icon fas fa-exclamation-circle"></i>
                                <p>
                                    Requests
                                </p>
                            </a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a href="print_payroll.php" class="nav-link">-->
<!--                                <i class="nav-icon fas fa-money-bill-alt"></i>-->
<!--                                <p>Payroll</p>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a href="print_sched.php" class="nav-link">-->
<!--                                <i class="nav-icon far fa-clock"></i>-->
<!--                                <p>Schedules</p>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
<!--                <div style="padding-top: 10px;">-->
<!--                    <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a> is the sole owner of this script. It is not suitable for personal use. And releasing it in demo version. Besides, it is being provided for free only from <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a>. For any of your problems contact us on <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a> facebook group / page or message <a href="https://www.facebook.com/dev.mhrony">MH RONY</a> on facebook. Thanks for staying with <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a>.</marquee>-->
<!--                </div>-->
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Schedules</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Schedules</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>





            <section class="content">
<!--                --><?php
//      ini_set('display_errors', 0);
//      ini_set('display_errors', false);
//      $dd = date("H:i:s");
//      if(isset($_SESSION['success'])) {
//        echo "
//          <div class='alert alert-success alert-dismissible'>
//            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
//            <h4><i class='icon fa fa-check'></i> Success!</h4>
//            ".$_SESSION['success']."
//          </div>
//        ";
//      }
//      if(isset($_SESSION['error'])) {
//        echo "
//          <div class='alert alert-danger alert-dismissible'>
//            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
//            <h4><i class='icon fa fa-times'></i> Failed !</h4>
//            ".$_SESSION['error']."
//          </div>
//        ";
//      }
//      if($dd == $_SESSION['expire'])
//      {
//        session_unset();
//      }
//      //session_unset();
//      ?>


            <?php


            if(isset($_POST['add_sched']))
            {
                $meeting_name=$_POST['meeting_name'];
                $in = $_POST['sched_timein'];
                $out = $_POST['sched_timeout'];

                $in_24  = date("H:i", strtotime($in));
                $out_24 = date("H:i", strtotime($out));

                $chkquery = "SELECT * FROM senate_sched WHERE sched_in = '$in_24' AND sched_out = '$out_24'";
                $chkresult = mysqli_query($db, $chkquery);

                if(!$row = $chkresult->fetch_assoc()) {
                    $sql = "INSERT INTO senate_sched (meeting_name, sched_in, sched_out) VALUES ('$meeting_name','$in_24', '$out_24')";
                    $result = mysqli_query($db, $sql);

//    $_SESSION['success'] = "New Schedule has been added ! ";
//    $_SESSION['expire'] =  date("H:i:s", time() + 1);

                    echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Schedule has been updated !",
                    type: "success"
                  }).then(function() {
                      window.location = "senate_sched.php";
                  });
            }, 30);
        </script>';
                }

//                else {
////    $_SESSION['error'] = "Failed to add new schedule ! ";
////    $_SESSION['expire'] =  date("H:i:s", time() + 1);
//                }
//                header('location: senate_sched.php');

            }
            ?>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">



                                <div align="right" data-toggle="modal" data-target="#modal-default"><button class="btn btn-primary btn-flat">
                                        <i class="fas fa-plus"></i> New</button>
                                </div>
                                <br>
                                <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Meeting Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                $sql = "SELECT * FROM senate_sched";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                                        <tr>
                                            <td><?php echo $row['sched_in']; ?></td>
                                            <td><?php echo $row['sched_out']; ?></td>
                                            <td><?php echo $row['meeting_name']; ?></td>

                                            <td>
                                                <button class="btn btn-success btn-flat sched_edit" id="<?php echo $row['sched_id']; ?>"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-flat del_sched" id="<?php echo $row['sched_id']; ?>"><i class="fas fa-trash"></i></button>
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



    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Senator </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Meeting Name</label>
                            <div class="col-sm-7">
                                <div class="">
                                    <div class="input-group " data-target-input="nearest">
                                        <input type="text" name="meeting_name" class="form-control" required placeholder="Meeting name">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Start Time</label>
                            <div class="col-sm-7">
                                <div class="bootstrap-timepicker">
                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                        <input type="text" name="sched_timein" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">End Time</label>
                            <div class="col-sm-7">
                                <div class="bootstrap-timepicker">
                                    <div class="input-group date" id="secondpicker" data-target-input="nearest">
                                        <input type="text" name="sched_timeout" class="form-control datetimepicker-input" data-target="#secondpicker" data-toggle="datetimepicker" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add_sched"><i class="fas fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="sched_edit_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Updating...</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body" id="sched_edit_details">
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="update_sched"><i class="fas fa-edit"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>







    <script>
    $(document).ready(function() {
        $('.sched_edit').click(function() {
            var sched_edit_id = $(this).attr("id");
            $.ajax({
                url: "controller.php",
                method: "post",
                data: {
                    sched_edit_id: sched_edit_id
                },
                success: function(data) {
                    $('#sched_edit_details').html(data);
                    $('#sched_edit_modal').modal("show");
                }
            });
        });
    });
    </script>

    <div id="delete_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deleting...</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body" id="delete_details">
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" name="delete_sched"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.del_sched').click(function() {
            var delsched_id = $(this).attr("id");
            $.ajax({
                url: "controller.php",
                method: "post",
                data: {
                    delsched_id: delsched_id
                },
                success: function(data) {
                    $('#delete_details').html(data);
                    $('#delete_modal').modal("show");
                }
            });
        });
    });
    </script>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <script>
    $(function() {

        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        $('#secondpicker').datetimepicker({
            format: 'LT'
        })

        $('#thirdpicker').datetimepicker({
            format: 'LT'
        })

        $('#fourthpicker').datetimepicker({
            format: 'LT'
        })

    })
    </script>

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