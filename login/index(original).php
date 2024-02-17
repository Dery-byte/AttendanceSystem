
<?php
include("../admin/controller.php");





//
//// Check if the user is already logged in
//if (isset($_SESSION['student_id']) && $_SESSION['student_id'] === true) {
//    header('Location: ../admin/home.php'); // Redirect to dashboard or any other page
//    exit();
//}
//
//// Handle login form submission and authentication
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    // Perform login authentication
//    // If login is successful, set session variables and redirect to dashboard
//    // Otherwise, display error message
//        // Set session variables
//        $_SESSION['student_id'] = true;
//        // Redirect to dashboard or main page
//        header('Location: ../admin/home.php');
//        exit();
//
//}
?>


















<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Attendance System</title>
    <!-- Tell the browser to be responsive to screen width -->
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
    <div class="login-box">
        <div class="login-logo">
            <p class="bold">Login</p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="log_username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="log_password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye"></span>
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







        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Register as senate Member</h4>
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
<!--                                --><?php
//                                $sql = "SELECT * FROM senate_position";
//                                $result = mysqli_query($db, $sql);
//                                while($row = mysqli_fetch_array($result))
//                                {
//                                ?>
<!--                                <option value="--><?php //echo $row['pos_id']; ?><!--">-->
<!---->
<!--                                    --><?php //echo $row['position_title']; ?>
<!---->
<!--                                </option>-->
<!--                                --><?php
//                                        }
//                                        ?>



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

                                    <textarea cols="34" rows="3" type="text" class="form-control" name="emp_address" placeholder="Bank Account No. And Name" required>

                                    </textarea>
<!--                                    <input type="text" class="form-control" name="emp_address" placeholder="Bank Account No. And Name" required>-->
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
                                            <option value="<?php echo $row['pos_id']; ?>">

                                                <?php echo $row['position_title']; ?>

                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

<!--                            <div class="form-group row">-->
<!--                                <label class="col-sm-3 col-form-label">Schedule</label>-->
<!--                                <div class="col-sm-7">-->
<!--                                    <select name="emp_schedule" class="form-control" required>-->
<!--                                        <option hidden> - Select Schedule -</option>-->
<!--                                        --><?php
//                                        $sql = "SELECT * FROM senate_sched";
//                                        $result = mysqli_query($db, $sql);
//                                        while($row = mysqli_fetch_array($result))
//                                        {
//                                            ?>
<!--                                            <option value="--><?php //echo $row['sched_id']; ?><!--">--><?php //echo $row['sched_in']; ?><!-- - --><?php //echo $row['sched_out']; ?><!--</option>-->
<!--                                            --><?php
//                                        }
//                                        ?>
<!--                                    </select>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->

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
                        <button type="submit" class="btn btn-primary btn-flat" name="senator_registration"><i class="fas fa-save"></i> Save</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <br><br><br><br><br><br>



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

                xhr.open("POST", "check_user_id.php", true);
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
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>


    <script type="text/javascript">
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
        $('#time').html(momentNow.format('hh:mm:ss A'));
    }, 100);
    </script>




</body>

</html>