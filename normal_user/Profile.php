<?php
include("../admin/controller.php");
require_once('../normal_user/auth_user.php');
ini_set('display_errors', 0);
ini_set('display_errors', false);
date_default_timezone_set('Africa/Accra');
$time = date("h:i:s");
$today = date("D - F d, Y");
$date = date("Y-m-d");
$in = date("H:i:s");
$out = "12:00:00";

if(isset($_POST['attendance']))
{
    $_SESSION['expire'] = date("H:i:s", time() + 1);
    $code = $_POST['operation'];
    if($code == "time-in")
    {
        $id = $_POST['student_id'];
        $schedule=$_POST['senate_schedule'];
        $sql = "SELECT * FROM senate_list WHERE student_id = '$id'";
        $result = mysqli_query($db, $sql);
        if(!$row = $result->fetch_assoc()) {
            $_SESSION['mess'] = "<div id='time' class='alert alert-danger' role='alert'>
    <i class='fas fa-times'></i> Senator ID is not registered !
</div>";
            header("Location: home.php");
        }
        else {
//$sql2 = "SELECT * FROM senate_attendance WHERE senator_id = '$id' AND attendance_date = '$date'";

            $sql2 = "SELECT * FROM senate_attendance WHERE senator_id = '$id' AND schedule = '$schedule'";

            $result2 = mysqli_query($db, $sql2);
            if(!$row2 = $result2->fetch_assoc()) {
                $fname = $row['senator_fname'];
                $lname = $row['senator_lname'];
                $full = $lname . ', ' . $fname;
                $card = $row['student_id'];
                $first = new DateTime($in);
                $second = new DateTime($out);
                $interval = $first->diff($second);
                $hrs = $interval->format('%h');
                $mins = $interval->format('%i');
                $mins = $mins/60;
                $int = $hrs + $mins;
                $scheduleInattendance= $row['schedule'];
//$schedule=$_POST['senate_schedule'];




                if($scheduleInattendance !=$schedule ){
                    $int = $int - 1;
                }
                $sql3 = "INSERT INTO senate_attendance (senator_id, senator_name, attendance_date, attendance_timein, attendance_timeout, attendance_hour,schedule)
VALUES ('$id', '$full', '$date', '$in', '$out', '$int','$schedule' )";
                $result3 = mysqli_query($db, $sql3);
                $_SESSION['mess'] = "<div id='time' class='alert alert-success' role='alert'>
    <i class='fas fa-check'></i> Time in: $full .You've log your attendance.
</div>";
                header("Location: home.php");
            }
            else {
                $_SESSION['mess'] = "<div id='time' class='alert alert-warning' role='alert'>
    <i class='fas fa-exclamation'></i> You've already logged attendance.
</div>";
                header("Location: home.php");
            }
        }
    }
    if($code == "time-out")
    {
        $id = $_POST['student_id'];
        $sql = "SELECT * FROM senate_attendance WHERE senator_id = '$id' AND attendance_date = '$date'";
        $result = mysqli_query($db, $sql);
        if(!$row = $result->fetch_assoc()) {
            $_SESSION['mess'] = "<div id='time' class='alert alert-danger' role='alert'>
    <i class='fas fa-times'></i> You've not logged attendance for this schedule !
</div>";
            header("Location: home.php");
        }
        else {
            $query = "SELECT * FROM senate_attendance WHERE senator_id = '$id' AND attendance_date = '$date'";
            $queryres = mysqli_query($db, $query);
            while($rowres = mysqli_fetch_array($queryres))
            {
                $timein = $row['attendance_timein'];
            }
            $first = new DateTime($timein);
            $second = new DateTime($in);
            $interval = $first->diff($second);
            $hrs = $interval->format('%h');
            $mins = $interval->format('%i');
            $mins = $mins/60;
            $int = $hrs + $mins;
            if($int > 4){
                $int = $int - 1;
            }
            $sql2 = "UPDATE senate_attendance SET attendance_timeout = '$in', attendance_hour = '$int' WHERE senator_id = '$id' AND attendance_date = '$date'";
            $result2 = mysqli_query($db, $sql2);
            $_SESSION['mess'] = "<div id='time' class='alert alert-success' role='alert'>
    <i class='fas fa-check'></i> Timed Out
</div>";
            header("Location: home.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>UCC SENATE </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
<!--            <li class="xn-logo">-->
            <li class="">
            <a href="index.html">SENATE</a>
                <a href="#" class="x-navigation-control"></a>

            </li>
            <li class="xn-profile">
                <a href="#" class="profile-mini">
                    <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?php echo   $_SESSION['senator_photo'];?>" style="border-radius: 50%;width: 95px;height: 95px;" alt="User Image">
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?php echo $_SESSION['senator_fname']; ?> <?php echo $_SESSION['senator_lname']?></div>
                        <div class="profile-data-title"><?php echo $_SESSION['senator_program']; ?></div>
                    </div>
                    <div class="profile-controls">
                        <a href="Profile.php" class="profile-control-left"><span class="fa fa-info"></span></a>
<!--                        <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>-->
                    </div>
                </div>
            </li>


            <!--                        PROFILE ENDS-->



            <li class="xn-title">Navigation</li>
            <ul>

                <li><a href="home.php"><span class="fa fa-book"></span> Dashboard</a></li>

                <li><a href="minutes.php"><span class="fa fa-folder"></span> Minutes</a></li>
            </ul>

            <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->


    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>

            <!-- POWER OFF -->

            <li class="xn-icon-button pull-right last">

                <form method="POST">
                    <button type="submit"   class="btn  btn-flat" name="logout"><i class="fas fa-sign-in-alt"><span class="fa fa-sign-out"></span>Logout</button>
                </form
            </li>


<!--                                <li class="xn-icon-button pull-right last">-->
<!--                                    <a href="#">-->
<!---->
<!--                                    </a>-->
<!--                                    <ul class="xn-drop-left animated zoomIn">-->
<!--                                        <li><a href="pages-lock-screen.html"><span class="fa fa-lock"></span> Lock Screen</a></li>-->
<!--                                        <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--             END POWER OFF-->

        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
        <!-- END BREADCRUMB -->


        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-2">
                </div>

                <div class="col-md-8">

                    <div class="panel panel-default">
                        <div class="panel-body profile" style="background: url('assets/images/gallery/music-4.jpg') center center no-repeat;">
                            <div class="profile-image">
<!--                                <img src="assets/images/users/user3.jpg" alt="Nadia Ali"/>-->
                                <img src="<?php echo  $_SESSION['senator_photo'];?>" style="border-radius: 50%;width: 95px;height: 95px;" alt="User Image">

                            </div>
                            <div class="profile-data">

                                <div class="profile-data-name"><?php echo $_SESSION['senator_fname']; ?> <?php echo $_SESSION['senator_lname']?></div>
                                <div class="profile-data-title" style="color:slateblue; font-size: 20px"><?php echo $_SESSION['senator_program']; ?></div>
<!--                                <div class="profile-data-name">Nadia Ali</div>-->
<!--                                <div class="profile-data-title" style="color: #FFF;">Singer-Songwriter</div>-->
                            </div>
<!--                            <div class="profile-controls">-->
<!--                                <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>-->
<!--                                <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>-->
<!--                            </div>-->


                        </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="btn btn-info  btn-block">Position</label>
                                </div>
                                <div class="col-md-6">
<!--                                    <button class="btn btn-primary  btn-block"> --><?php //echo  $_SESSION['senator_program'] ?><!--</button>-->
                                    <button class="btn btn-primary  btn-block"> <?php echo  $_SESSION['senator_position'] ?></button>

                                </div>

<?php
$sql = "SELECT * FROM senate_list WHERE ";
$sql = "select * from senate_list where student_id = '".$_SESSION['student_id']."'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
?>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Student ID</label>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" readonly  value="<?php echo $row['student_id']; ?>">
                                                </div>
                                                <!--                                                    <span class="help-block">This is sample of text field</span>-->
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Name</label>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" readonly value="<?php echo $row['senator_lname'] .' '.  $row['senator_fname']; ?>"  />
                                                </div>
                                                <!--                                                    <span class="help-block">This is sample of text field</span>-->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Program</label>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" readonly  value="<?php echo $row['senator_program']; ?>" />
                                                </div>
                                                <!--                                                    <span class="help-block">This is sample of text field</span>-->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> Address</label>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" readonly  value="<?php echo $row['senator_address']; ?>" />
                                                </div>
                                                <!--                                                    <span class="help-block">This is sample of text field</span>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Date of Birth</label>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" readonly value="<?php echo $row['date_of_birth']; ?>"  />
                                                </div>
                                                <!--                                                    <span class="help-block">This is sample of text field</span>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Contact</label>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control"  readonly value="<?php echo $row['senator_contact']; ?>"/>
                                                </div>
                                                <!--                                                    <span class="help-block">This is sample of text field</span>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        </div>
                    </div>

                <div class="col-md-2">

<!--                   -->
                    <!-- END TIMELINE -->

                </div>

            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->



<?php
//echo $_SESSION['mess'];
//echo $_SESSION['success'];

$dd = date("H:i:s");

if($dd == $_SESSION['expire'])
{
    session_unset();
}
?>
<script>
    document.getElementById("log_attendance").addEventListener("submit", function(event) {
        var selectElement = document.getElementById("senate_schedule").value;
        var errorElement = document.getElementById("scheduleError");


        // console.log(selectElement);
        if (selectElement === "0") {
            errorElement.textContent = "Please select a schedule";
            // alert("Please select a schedule");
            event.preventDefault(); // Prevent form submission
        }
        // else {
        //     errorElement.textContent = ""; // Clear error message if there's no error
        // }
    });
</script>



<script type="text/javascript">
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
        $('#time').html(momentNow.format('hh:mm:ss A'));
    }, 100);
</script>




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
</body>
</html>






