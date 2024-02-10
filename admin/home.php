<?php
include("controller.php");
global $db;

if($_SESSION == ""){
    header("Location: index.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Senate Attendance | Dashboard</title>
    <link rel="icon" type="image/png" href="img/Logo.png">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <?php
  include("header.php");
  ?>

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
                        <span class="hidden-xs"><?php echo $_SESSION['senator_fname']; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:#222d32;">
                            <div class="image">
                                <img src="dist/img/me.jpg" style="border-radius: 50%;width: 100px;height: 100px;" alt="User Image">
                            </div>
                        </span>

                        <form method="POST">
                            <button type="submit" class="btn  btn-flat" name="logout"><i class="fas fa-sign-in-alt"></i> Logout</button>

<!--                            <a type="submit" name="logout" class="dropdown-item dropdown-footer">Logout</a>-->

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
                            <a href="home.php" class="nav-link active">
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
                                        <p> All Senators</p>
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
                            <a href="senate_deduction.php" class="nav-link">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p>
                                    Deduction
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="senate_positions.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Positions
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="print_payroll.php" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-alt"></i>
                                <p>Payroll</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="print_sched.php" class="nav-link">
                                <i class="nav-icon far fa-clock"></i>
                                <p>Schedules</p>
                            </a>
                        </li>
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
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

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

                    <div class="row">
                        <section class="col-lg-5 connectedSortable">


                        </section>
                    </div>

                </div>
            </section>


        </div>



        <?php
include("footer.php");
?>

        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="plugins/datatables/jquery.dataTables.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
</body>

</html>