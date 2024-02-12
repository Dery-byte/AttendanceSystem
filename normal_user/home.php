
<?php 
include("../admin/controller.php");
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
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Senate Attendance</title>
    <!-- Tell the browser to be responsive to screen width -->
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
    <style type="text/css">
    .mt20 {
        margin-top: 20px;
    }
    .result {
        font-size: 20px;
    }
    .bold {
        font-weight: bold;
    }
    </style>
</head>


<body class="hold-transition login-page">
<nav class=" navbar navbar-expand navbar-white navbar-light">
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
        </div>
    </form>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
<!--                <i class="fas fa-user"></i>-->
                <img src="<?php echo   $_SESSION['senator_photo'];?>" style="border-radius: 50%;width: 40px;height: 40px;" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['senator_fname']; ?> <?php echo $_SESSION['senator_lname']?></span>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:#222d32;">
                            <div class="image">
                                <img src="<?php echo   $_SESSION['senator_photo'];?>" style="border-radius: 50%; width:100px;height: 100px;" alt="User Image">
                            </div>
                        </span>
                <form method="POST">
<!--                    <button type="submit" name="logout" class="dropdown-item dropdown-footer">Logout</button>-->
                    <button type="submit" class="btn  btn-flat" name="logout"><i class="fas fa-sign-in-alt"></i> Logout</button>
                </form>
            </div>
        </li>
    </ul>
</nav>

    <div class="login-box">
        <div class="login-logo">
            <p id="date"><?php echo $today; ?></p>
            <p id="time" class="bold"><?php echo $time; ?></p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Log Attendance</p>






                <form method="POST" id="log_attendance">
                    <div class="input-group mb-3">
<!--                        <label class="col-sm-3 col-form-label">Schedule</label>-->
                        <span id="scheduleError" style="color: #dc0b2a; font-family: "Helvetica Neue", sans-serif";></span>
                        <div class="input-group mb-3">
                            <select name="senate_schedule" class="form-control" id="senate_schedule" required>
                                <option hidden selected  value="0" > - Select Schedule -</option>
                                <?php
                                $sql = "SELECT * FROM senate_sched";
                                $result = mysqli_query($db, $sql);
                                while($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                    <option value="<?php echo $row['sched_id']; ?>">
                                        <?php echo $row['sched_in']; ?> - <?php echo $row['sched_out']; ?>
                                       ( <?php echo $row['meeting_name']; ?> )
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <select name="operation" class="form-control">
                            <option value="time-in">Time In</option>
                            <option value="time-out">Time Out</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="student_id" class="form-control" readonly value="<?php echo $_SESSION['student_id']; ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat" name="attendance">Submit</button>
                </form>
            </div>











     <?php
    echo $_SESSION['mess'];
    echo $_SESSION['success'];

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

    </div>
    </div>
    <br><br>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
        $('#time').html(momentNow.format('hh:mm:ss A'));
    }, 100);
    </script>
</body>


</html>
