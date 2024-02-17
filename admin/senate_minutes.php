<?php
include("controller.php");
require_once('../normal_user/auth_user.php');

global $db;

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

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>

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
                        <a href="senate_positions.php" class="nav-link">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                Position
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="senate_minutes.php" class="nav-link">
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
                        <h1 class="m-0 text-dark">Positions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">Positions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<!--        ===============================================================================================================-->



        <!-- START WIDGET SLIDER -->
        <div class="widget widget-default widget-carousel">
            <div class="owl-carousel" id="owl-example">
                <div>
                    <div class="widget-title">Total Visitors</div>
                    <div class="widget-subtitle">27/08/2017 15:23</div>
                    <div class="widget-int">3,548</div>
                </div>
                <div>
                    <div class="widget-title">Returned</div>
                    <div class="widget-subtitle">Visitors</div>
                    <div class="widget-int">1,695</div>
                </div>
                <div>
                    <div class="widget-title">New</div>
                    <div class="widget-subtitle">Visitors</div>
                    <div class="widget-int">1,977</div>
                </div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET SLIDER -->
        <div class="login-box">
            <div class="login-logo">
                <p class="bold">Login</p>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Upload file to a meeting</p>
                    <form method="POST">
                        <div class="input-group mb-3">
                            <select name="emp_position" class="form-control" required>
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
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                </div>
                            </div>
                        </div>
                        <div align="right">
                            <button type="submit" class="btn btn-primary btn-flat" name="Sign_in"><i class="fas fa-sign-in-alt"></i> Sign In</button>
                        </div>
                    </form>
                    <div class="register" data-toggle="modal" data-target="#modal-default" style="position: absolute; margin-top: -39px">
                        <button type="submit" class="btn btn-primary btn-flat" name="Sign_in"><i class="fas fa-sign-in-alt"></i> Register</button>
                    </div>
                </div>
            </div>




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

<div id="pos_delete_modal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting...</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body" id="pos_delete_details">
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-danger btn-flat" name="pos_delete"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('.pos_delete').click(function() {
            var pos_del_id = $(this).attr("id");
            $.ajax({
                url: "controller.php",
                method: "post",
                data: {
                    pos_del_id: pos_del_id
                },
                success: function(data) {
                    $('#pos_delete_details').html(data);
                    $('#pos_delete_modal').modal("show");
                }
            });
        });
    });
</script>

<script src="plugins/toastr/toastr.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>




        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>

        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>

        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
        <!-- END SCRIPTS -->
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