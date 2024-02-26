<?php
include("../admin/controller.php");

?>

<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Senate Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- EOF CSS INCLUDE -->

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
    <body>


    <?php

    // LOGIN CODE
    if(isset($_POST['Sign_in']))
    {
        $username = mysqli_real_escape_string($db,$_POST['log_username']);
        $password = mysqli_real_escape_string($db,$_POST['log_password']);
  $password = md5($password);
//        $password = $password;

        $sql = "SELECT * FROM senate_list WHERE student_id='$username' AND password='$password'";
        $result = mysqli_query($db, $sql);
        if (!$row = $result->fetch_assoc()){
            echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Failed !",
                     text: "Username or Password is incorrect !",
                     type: "error"
                   }).then(function() {
                       window.location = "../login/index.php";
                   });
             }, 30);
         </script>';
        }
        else {
//      session_start();
            $_SESSION['senator_fname'] = $row['senator_fname'];
            $_SESSION['senator_lname'] = $row['senator_lname'];
            $_SESSION['senator_photo'] = $row['senator_photo'];
            $_SESSION['senator_program']= $row['senator_program'];
            $_SESSION['senator_position']= $row['senator_position'];


            $_SESSION['student_id'] = $row['student_id'];
            $sql = "SELECT * FROM senate_list WHERE student_id = '$username' and password = '$password' ";
            $result = mysqli_query($db, $sql);
            $row = $result->fetch_assoc();
            $_SESSION['student_id'] = $username;
            $_SESSION['senator_position']= $row['senator_position'];


            if ($row['type'] === 'admin') {
                header("Location: ../admin/home.php");
            }
            else if ($row['type']==='member'){
                header("Location: ../normal_user/home.php");
            }
        }
    }
    ?>
        
        <div class="login-container login-v2">
            <div class="login-box animated fadeInDown" >
                <div class="login-body" id="login">
                    <div class="login-title"><strong>Welcome</strong>, Please login.</div>
                    <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" class="form-control" name="log_username" placeholder="Username" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </div>                                
                                <input type="password" class="form-control" name="log_password" placeholder="Password" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
<!--                            <a href="#">Forgot your password?</a>-->
                            <button type="button" class="btn btn-default mb-control" data-box="#change_pass">Forgot your password?</button>

                        </div>          
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-default mb-control" data-box="#create_account">Create an account</button>
                        </div>


<!--                        POPUP BUTTON-->
<!--                        END POPUP BUTTON-->

                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button  type="submit" name="Sign_in" class="btn btn-primary btn-lg   btn-block">Login</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2024 Senate Activity Log
                    </div>

                </div>
            </div>
            
        </div>
<!--#Register-->

        <?php
// ADD SENATOR
if(isset($_POST['senator_registration']))
{
  $tag = $_POST['student_id'];
  $fname = $_POST['emp_name'];
  $lname = $_POST['emp_lastname'];
  $sprogram = $_POST['senator_program'];
    $address = $_POST['emp_address'];
  $contact = $_POST['emp_contact'];
  $gender = $_POST['emp_gender'];
  $position = $_POST['emp_position'];
  $password = $_POST['password'];
  $date_of_birth = $_POST['date_of_birth'];
  $type = $_POST['type'];
  $regdate = date("Y-m-d");
//  $sql = "SELECT sched_in, sched_out FROM senate_sched WHERE sched_id = '$sched'";
//  $result = mysqli_query($db, $sql);
//  while($row = mysqli_fetch_array($result))
//  {
//    $in = $row['sched_in'];
//    $out = $row['sched_out'];
//  }






  $target_dir = "../admin/img/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $filename = $_FILES['fileToUpload']['name'];
  if(!empty($filename)){
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../admin/img/".$filename);
  }
//  $query = "INSERT INTO senate_list (student_id, emp_fname, emp_lname, emp_position, emp_address, emp_contact, emp_gender, emp_timein, emp_timeout, sched_id, emp_regdate, emp_photo)
//                          VALUES ('$tag', '$fname', '$lname', '$position', '$address', '$contact', '$gender', '$in', '$out', '$sched', '$regdate', '$target_file')";
//  $resquery = mysqli_query($db, $query);

    $query = "INSERT INTO senate_list (student_id, senator_fname, senator_lname,senator_program, senator_position, senator_address, senator_contact, senator_gender, senator_regdate, senator_photo, password, type, date_of_birth)
                          VALUES ('$tag', '$fname', '$lname', '$sprogram','$position', '$address', '$contact', '$gender', '$regdate', '$target_file', '$password','$type', '$date_of_birth')";
    $resquery = mysqli_query($db, $query);
  echo '<script>
           setTimeout(function() {
               Swal.fire({
                   title: "Success !",
                   text: "Registration successful",
                   type: "success"
                 }).then(function() {
                     window.location = "index.php";
                 });
           }, 30);
       </script>';

}


        ?>





        <div class="message-box animated fadeIn" id="create_account">
            <div class="login-container login-v2">
                <div class="login-box animated fadeInDown">
                    <div class="login-body">
                        <div class="login-title"><strong>Welcome</strong>,Create Account.</div>
                        <div class="form-horizontal">

                            <div class="row">
                                <form  method="POST"   enctype="multipart/form-data">
                            <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-user"></span>
                                        </div>
                                        <input type="text" class="form-control" name="student_id" id="student_id" placeholder="Enter Student ID" required/>
                                    </div>

                                    <span id="status" style="color: purple; font-style: italic"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
<!--                                    <div class="input-group">-->
<!--                                        <div class="input-group-addon">-->
<!--                                            <span class="fa fa-lock"></span>-->
<!--                                        </div>-->
                                        <input type="text" class="form-control" name="emp_name" placeholder=" Enter First name" required/>
<!--                                    </div>-->
                                </div>
                            </div>

                                <div class="form-group">
                                    <div class="col-md-12">
<!--                                        <div class="input-group">-->
<!--                                            <div class="input-group-addon">-->
<!--                                                <span class="fa fa-user"></span>-->
<!--                                            </div>-->
                                            <input type="text" class="form-control" name="emp_lastname" placeholder="Enter last Name" required/>
<!--                                        </div>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
<!--                                        <label> Provide Bank Details</label>-->
<!--                                        <div class="input-group">-->
<!--                                            <div class="input-group-addon">-->
<!--                                                <span class="fa fa-lock"></span>-->
<!--                                            </div>-->
                                            <input type="date" class="form-control"  name="date_of_birth" placeholder="Provide Date of Birth" required/>
<!--                                        </div>-->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
<!--                                        <label> Provide Bank Details</label>-->
<!--                                        <div class="input-group">-->
<!--                                            <div class="input-group-addon">-->
<!--                                                <span class="fa fa-user"></span>-->
<!--                                            </div>-->
                                            <input type="text" class="form-control" name="senator_program" placeholder="Enter Program of study" required/>
<!--                                        </div>-->
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-12">
<!--                                        <label> Provide Bank Details</label>-->
<!--                                        <div class="input-group">-->
<!--                                            <div class="input-group-addon">-->
<!--<!--                                                <span class="fa fa-lock"></span>-->
<!--                                            </div>-->

<!--                                            <textarea cols="34" rows="3" type="text" class="form-control" name="emp_address" placeholder="Bank Account No. And Name">-->
<!---->
<!--                                            </textarea>-->
                                            <input type="text" class="form-control"  name="emp_address" placeholder="Bank Account No. And Name" required/>
<!--                                        </div>-->
                                    </div>
                                </div>


                        </div>
                 <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
<!--                                    <div class="input-group">-->
<!--                                        <div class="input-group-addon">-->
<!--                                            <span class="fa fa-lock"></span>-->
<!--                                        </div>-->
                                        <input type="number" class="form-control" name="emp_contact" placeholder=" Contact Number" required/>
<!--                                    </div>-->
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
<!--                                    <div class="input-group">-->
<!--                                        <div class="input-group-addon">-->
<!--                                            <span class="fa fa-lock"></span>-->
<!--                                        </div>-->
                                        <select name="emp_gender" class="form-control" required>
                                            <option hidden> - Select Gender-</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Prefer Not">Prefer Not to say</option>
                                        </select>
<!--                                    </div>-->
                                </div>
                            </div>

                     <div class="form-group">
                         <div class="col-md-12">
<!--                             <div class="input-group">-->
<!--                                 <div class="input-group-addon">-->
<!--                                     <span class="fa fa-user"></span>-->
<!--                                 </div>-->
                                 <select name="emp_position" class="form-control" required>
                                     <option hidden> - Select Position -</option>
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
<!--                         </div>-->
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="col-md-12">
<!--                             <div class="input-group">-->
<!--                                 <div class="input-group-addon">-->
<!--                                     <span class="fa fa-lock"></span>-->
<!--                                 </div>-->
                                 <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*" required/>
<!--                             </div>-->
                         </div>
                     </div>

                     <div class="form-group">
                         <div class="col-md-12">
                             <div class="input-group">
                                 <div class="input-group-addon">
                                     <span class="fa fa-lock"></span>
                                 </div>
                                 <input type="password" class="form-control" name="password" placeholder="Password" required/>
                             </div>
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="col-md-12">
                             <div class="input-group">
<!--                                 <div class="input-group-addon">-->
<!--                                     <span class="fa fa-lock"></span>-->
<!--                                 </div>-->
                                 <input type="text" class="form-control" name="type"  value="member" hidden placeholder="Member Type"  required/>
                             </div>
                         </div>
                     </div>

                    </div>

                </div>
                        </div>

<br>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button  type="submit" name="senator_registration" class="btn btn-primary btn-lg   btn-block">Sign Up</button>
                                </div>
                            </div>
                        </form>

                        <div class="form-group">
                            <div class="col-md-12">
<!--                                <button class="btn btn-default mb-control" data-box="#change_pass">Already have Account?</button>-->
                                <a href="index.php" >Already have Account?</a>

                            </div>
                        </div>
                    </div>
                    <div class="login-footer">
                        <div class="pull-left">
                            &copy; 2024 Senate Activity Log
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <!--    POPUP BOX-->


        <?php

        if(isset($_POST['reset_pass'])) {
            // Assuming $db is your database connection

            $username = $_POST['username'];
            $password = $_POST['reset_password'];
            $confirm_password =$_POST['confirm_password'];


            if($password===$confirm_password){
            // Prepare and execute SELECT query
            $sql = "SELECT * FROM senate_list WHERE student_id=?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                // Username exists, proceed with password update
                $sql2 = "UPDATE senate_list SET password = ? WHERE student_id = ?";
                $stmt2 = $db->prepare($sql2);
//        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the new password
                $hashed_password = md5($password);
//                $hashed_password = $password; // Hash the new password
                $stmt2->bind_param("ss", $hashed_password, $username);
                if($stmt2->execute()) {
                    // Password reset successful
                    echo '<script>
                    setTimeout(function() {
                        Swal.fire({
                            title: "Success !",
                            text: "Password has been reset!",
                            type: "success"
                        }).then(function() {
                            window.location = "../login/index.php";
                        });
                    }, 30);
                </script>';
                }
            }else {
                    // Error updating password
                    echo '<script>
                    setTimeout(function() {
                        Swal.fire({
                            title: "Failed !",
                            text: "Password has not been reset !",
                            type: "error"
                        }).then(function() {
                            window.location = "../login/index.php";
                        });
                    }, 30);
                </script>';
                }
            } else {
                // Username does not exist
                echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        title: "Failed !",
                        text: "Username does not exist !",
                        type: "error"
                    }).then(function() {
                        window.location = "../login/index.php";
                    });
                }, 30);
            </script>';
            }
        }


        ?>

<!--    CHANGE PASSWORD POPUP-->
        <div class="message-box animated fadeIn" id="change_pass">
            <div class="login-container login-v2">
                <div class="login-box animated fadeInDown">
                    <div class="login-body">
                        <div class="login-title"><strong>Welcome</strong>,Change Password.</div>
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-user"></span>
                                        </div>
                                        <input type="text" class="form-control" name="username" placeholder="Username" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-lock"></span>
                                        </div>
                                        <input type="password" class="form-control" id="reset_password" name="reset_password" placeholder="New Password" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-lock"></span>
                                        </div>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required/>

                                    </div>
                                    <p id="message" style="color: #0a001f; font-size: 20px"></p>

                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-12">
                                    <button  type="submit" name="reset_pass" class="btn btn-primary btn-lg   btn-block">Reset Password</button>
                                </div>
                            </div>
                        </form>


                        <form  method="post">
                        <div class="form-group">
                            <div class="col-md-12">
<!--                                <a href="index.php" class="btn btn-default mb-control" >login</a>-->
                                <a href="index.php" >Login</a>


                            </div>
                        </div>

                        </form>
                        </div>
                    <div class="login-footer">
                        <div class="pull-left">
                            &copy; 2024 Senate Activity Log
                        </div>
                    </div>
                </div>

            </div>
        </div>





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




    <script>
        const confirm_password = document.getElementById('confirm_password');
        const reset_password = document.getElementById('reset_password');
        const message = document.getElementById('message');

        confirm_password.addEventListener('input', checkEquality);
        reset_password.addEventListener('input', checkEquality);

        function checkEquality() {
            const value1 = confirm_password.value;
            const value2 = reset_password.value;

            if (value1 === value2) {
                message.textContent = "Passwords are the same";
            } else {
                message.textContent = "Both password must be the same!";
            }
        }

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




<!--         START SCRIPTS -->
<!--         START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<!--         END PLUGINS -->
<!--         START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
<!--         END TEMPLATE -->
<!--         END SCRIPTS -->

    </body>
</html>







