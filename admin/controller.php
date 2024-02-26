<?php
include("Database/config.php");
global $db;


date_default_timezone_set('Africa/Accra');


//
//// LOGIN CODE
//if(isset($_POST['Sign_in']))
//{
//  $username = mysqli_real_escape_string($db,$_POST['log_username']);
//  $password = mysqli_real_escape_string($db,$_POST['log_password']);
////  $password = md5($password);
//    $password = $password;
//
//    $sql = "SELECT * FROM senate_list WHERE student_id='$username' AND password='$password'";
//  $result = mysqli_query($db, $sql);
//  if (!$row = $result->fetch_assoc()){
//    echo '<script>
//             setTimeout(function() {
//                 Swal.fire({
//                     title: "Failed !",
//                     text: "Username or Password is incorrect !",
//                     type: "error"
//                   }).then(function() {
//                       window.location = "../login/index.php";
//                   });
//             }, 30);
//         </script>';
//  }
//  else {
////      session_start();
//      $_SESSION['senator_fname'] = $row['senator_fname'];
//      $_SESSION['senator_lname'] = $row['senator_lname'];
//      $_SESSION['senator_photo'] = $row['senator_photo'];
//      $_SESSION['senator_program']= $row['senator_program'];
//
//
//
//      $_SESSION['student_id'] = $row['student_id'];
//      $sql = "SELECT * FROM senate_list WHERE student_id = '$username' and password = '$password' ";
//      $result = mysqli_query($db, $sql);
//      $row = $result->fetch_assoc();
//      $_SESSION['student_id'] = $username;
//
//      if ($row['type'] === 'admin') {
//          header("Location: ../admin/home.php");
//      }
//      else if ($row['type']==='member'){
//          header("Location: ../normal_user/home.php");
//      }
//  }
//}

//CHECK IF USER IS LOGGED IN
//function isLoggedIn() {
//    return isset($_SESSION['student_id']) && $_SESSION['student_id'] === true;
//}

// LOGOUT CODE
//============================



////=============RESET PASSWORD==================
//
//if(isset($_POST['reset_pass'])) {
//    // Assuming $db is your database connection
//
//    $username = $_POST['username'];
//    $password = $_POST['reset_password'];
//
//    // Prepare and execute SELECT query
//    $sql = "SELECT * FROM senate_list WHERE student_id=?";
//    $stmt = $db->prepare($sql);
//    $stmt->bind_param("s", $username);
//    $stmt->execute();
//    $result = $stmt->get_result();
//
//    if($result->num_rows > 0) {
//        // Username exists, proceed with password update
//        $sql2 = "UPDATE senate_list SET password = ? WHERE student_id = ?";
//        $stmt2 = $db->prepare($sql2);
////        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the new password
//        $hashed_password = $password; // Hash the new password
//
//        $stmt2->bind_param("ss", $hashed_password, $username);
//        if($stmt2->execute()) {
//            // Password reset successful
//            echo '<script>
//                    setTimeout(function() {
//                        Swal.fire({
//                            title: "Success !",
//                            text: "Password has been reset!",
//                            type: "success"
//                        }).then(function() {
//                            window.location = "../login/index.php";
//                        });
//                    }, 30);
//                </script>';
//        } else {
//            // Error updating password
//            echo '<script>
//                    setTimeout(function() {
//                        Swal.fire({
//                            title: "Failed !",
//                            text: "Password has not been reset !",
//                            type: "error"
//                        }).then(function() {
//                            window.location = "../login/index.php";
//                        });
//                    }, 30);
//                </script>';
//        }
//    } else {
//        // Username does not exist
//        echo '<script>
//                setTimeout(function() {
//                    Swal.fire({
//                        title: "Failed !",
//                        text: "Username does not exist !",
//                        type: "error"
//                    }).then(function() {
//                        window.location = "../login/index.php";
//                    });
//                }, 30);
//            </script>';
//    }
//}



//================RESET PASSWORD================
if(isset($_POST['logout'])) {
  session_start();
  if(session_destroy())
  {
    header("Location: ../login/index.php");
  }
}


//
//// ADD POSITION
//if(isset($_POST['add_position']))
//{
//  $title = $_POST['position_title'];
//  $rate = $_POST['position_rate'];
//
//  $chkquery = "SELECT * FROM senate_position WHERE position_title = '$title' AND position_rate = '$rate'";
//  $chkresult = mysqli_query($db, $chkquery);
//
//  if(!$row = $chkresult->fetch_assoc()) {
//    $sql = "INSERT INTO senate_position (position_title, position_rate) VALUES ('$title', '$rate')";
//    $result = mysqli_query($db, $sql);
//
////    $_SESSION['success'] = "New position has been added ! ";
////    $_SESSION['expire'] =  date("H:i:s", time() + 1);
//
//      echo '<script>
//            setTimeout(function() {
//                Swal.fire({
//                    title: "Success !",
//                    text: "position  has been added !",
//                    type: "success"
//                  }).then(function() {
//                      window.location = "senate_positions.php";
//                  });
//            }, 30);
//        </script>';
//
//  }
//  else {
//    $_SESSION['error'] = "Failed to add new position ! ";
//    $_SESSION['expire'] =  date("H:i:s", time() + 1);
//  }
//  header('location: senate_positions.php');
//}







// ADD SENATOR BY ADMIN
//========================================================================================================================
if(isset($_POST['add_senator']))
{
    $tag = $_POST['student_id'];
//    =====CHECK IF STUDENT_ID ALREADY EXIST IN DB====
//        $sql = "SELECT * FROM senate_list WHERE student_id = '$tag'";
//        $result = mysqli_query($db, $sql);
//    if ($result && $result->num_rows > 0) {
//        // $tag already exists in the database
//        echo "The student ID already exists in the database.";
//    }
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


    $target_dir = "../admin/img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $filename = $_FILES['fileToUpload']['name'];
    if(!empty($filename)){
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../admin/img/".$filename);
    }

//  $query = "INSERT INTO senate_list (student_id, emp_fname, emp_lname, emp_position, emp_address, emp_contact, emp_gender, emp_timein, emp_timeout, sched_id, emp_regdate, emp_photo)
//                          VALUES ('$tag', '$fname', '$lname', '$position', '$address', '$contact', '$gender', '$in', '$out', '$sched', '$regdate', '$target_file')";
//  $resquery = mysqli_query($db, $query);

    $query = "INSERT INTO senate_list (student_id, senator_fname, senator_lname,senator_program ,senator_position, senator_address, senator_contact, senator_gender, senator_regdate, senator_photo, password, type)
                          VALUES ('$tag', '$fname', '$lname', '$sprogram','$position', '$address', '$contact', '$gender', '$regdate', '$target_file', '$password','$type')";
    $resquery = mysqli_query($db, $query);
    echo '<script>
           setTimeout(function() {
               Swal.fire({
                   title: "Success !",
                   text: "Registration successful",
                   type: "success"
                 }).then(function() {
                     window.location = "senate_list.php";
                 });
           }, 30);
       </script>';
}




//=======================================================================================================================================
//// ADD SENATOR
//if(isset($_POST['senator_registration']))
//{
//  $tag = $_POST['student_id'];
//  $fname = $_POST['emp_name'];
//  $lname = $_POST['emp_lastname'];
//  $sprogram = $_POST['senator_program'];
//    $address = $_POST['emp_address'];
//  $contact = $_POST['emp_contact'];
//  $gender = $_POST['emp_gender'];
//  $position = $_POST['emp_position'];
//  $password = $_POST['password'];
//  $date_of_birth = $_POST['date_of_birth'];
//  $type = $_POST['type'];
//  $regdate = date("Y-m-d");
////  $sql = "SELECT sched_in, sched_out FROM senate_sched WHERE sched_id = '$sched'";
////  $result = mysqli_query($db, $sql);
////  while($row = mysqli_fetch_array($result))
////  {
////    $in = $row['sched_in'];
////    $out = $row['sched_out'];
////  }
//
//
//
//
//
//
//  $target_dir = "../admin/img/";
//  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//  $filename = $_FILES['fileToUpload']['name'];
//  if(!empty($filename)){
//    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../admin/img/".$filename);
//  }
////  $query = "INSERT INTO senate_list (student_id, emp_fname, emp_lname, emp_position, emp_address, emp_contact, emp_gender, emp_timein, emp_timeout, sched_id, emp_regdate, emp_photo)
////                          VALUES ('$tag', '$fname', '$lname', '$position', '$address', '$contact', '$gender', '$in', '$out', '$sched', '$regdate', '$target_file')";
////  $resquery = mysqli_query($db, $query);
//
//    $query = "INSERT INTO senate_list (student_id, senator_fname, senator_lname,senator_program, senator_position, senator_address, senator_contact, senator_gender, senator_regdate, senator_photo, password, type, date_of_birth)
//                          VALUES ('$tag', '$fname', '$lname', '$sprogram','$position', '$address', '$contact', '$gender', '$regdate', '$target_file', '$password','$type', '$date_of_birth')";
//    $resquery = mysqli_query($db, $query);
//  echo '<script>
//           setTimeout(function() {
//               Swal.fire({
//                   title: "Success !",
//                   text: "Registration successful",
//                   type: "success"
//                 }).then(function() {
//                     window.location = "index.php";
//                 });
//           }, 30);
//       </script>';
//
//}

////ADD SCHEDULE
//if(isset($_POST['add_sched']))
//{
//  $meeting_name=$_POST['meeting_name'];
//  $in = $_POST['sched_timein'];
//  $out = $_POST['sched_timeout'];
//
//  $in_24  = date("H:i", strtotime($in));
//  $out_24 = date("H:i", strtotime($out));
//
//  $chkquery = "SELECT * FROM senate_sched WHERE sched_in = '$in_24' AND sched_out = '$out_24'";
//  $chkresult = mysqli_query($db, $chkquery);
//
//  if(!$row = $chkresult->fetch_assoc()) {
//    $sql = "INSERT INTO senate_sched (meeting_name, sched_in, sched_out) VALUES ('$meeting_name','$in_24', '$out_24')";
//    $result = mysqli_query($db, $sql);
//
////    $_SESSION['success'] = "New Schedule has been added ! ";
////    $_SESSION['expire'] =  date("H:i:s", time() + 1);
//
//   echo '<script>
//            setTimeout(function() {
//                Swal.fire({
//                    title: "Success !",
//                    text: "Schedule has been updated !",
//                    type: "success"
//                  }).then(function() {
//                      window.location = "senate_sched.php";
//                  });
//            }, 30);
//        </script>';
//}
//
//  else {
////    $_SESSION['error'] = "Failed to add new schedule ! ";
////    $_SESSION['expire'] =  date("H:i:s", time() + 1);
//  }
//  header('location: senate_sched.php');
//
//}

if(isset($_POST["pos_id"]))
{
    $output = '';
    $sql = "SELECT * FROM senate_position WHERE pos_id = '".$_POST["pos_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["pos_id"];
          $title = $row['position_title'];
          $rate = $row['position_rate'];

         $output .= '
              <input type="text" name="update_id" class="form-control" value="'.$id.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Position Title</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_title" value="'.$title.'" placeholder="" required>
                </div>
              </div>
              
              ';
    }
    $output .= "</form>";
    echo $output;

}



// UPDATE POSITION
if(isset($_POST["pos_update"]))
 {
   $id = $_POST['update_id'];
   $title = $_POST['update_title'];
   $rate = $_POST['update_rate'];

   $sql = "UPDATE senate_position SET position_title = '".$title."', position_rate = '".$rate."' WHERE pos_id = '".$id."'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Position Information has been updated!",
                    type: "success"
                  }).then(function() {
                      window.location = "senate_positions.php";
                  });
            }, 30);
        </script>';
}


//=================CONFIRM APPROVAL=========================


if(isset($_POST["attendanace_id"]))
{
    $output = '';
//    $sql = "SELECT * FROM attendance WHERE pos_id = '".$_POST["pos_id"]."'";
    $sql="SELECT * FROM senate_attendance, senate_list, senate_sched 
         WHERE senate_attendance.senator_id = senate_list.student_id AND
                                                                 senate_attendance.schedule = senate_sched.sched_id AND attendance_id='".$_POST["attendanace_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
        $id = $row["attendance_id"];
        $title = $row['senator_id'];

        $output .= '
              <input type="text" name="update_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
                	<p>Confirm Attendance Request</p>
                	<h2>' . $row['senator_id'] . ' ' . ' ' . $row['attendance_id'] . '</h2>
	            </div>
              
              ';
    }
    $output .= "</form>";
    echo $output;

}

if(isset($_POST["pos_confirm"]))
{
    $id = $_POST['update_id'];
//    $title = $_POST['update_title'];
    $sql = "UPDATE senate_attendance SET approve_statuses = 1 WHERE attendance_id= '".$id."'";
    $result = mysqli_query($db, $sql);

    echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Confirmed Attendance!",
                    type: "success"
                  }).then(function() {
                      window.location = "request.php";
                  });
            }, 30);
        </script>';
}


//==================REJECT REQUEST==========================

if(isset($_POST["reject_id"]))
{
    $output = '';
//    $sql = "SELECT * FROM attendance WHERE pos_id = '".$_POST["pos_id"]."'";
    $sql="SELECT * FROM senate_attendance, senate_list, senate_sched 
         WHERE senate_attendance.senator_id = senate_list.student_id AND
                                                                 senate_attendance.schedule = senate_sched.sched_id AND attendance_id='".$_POST["reject_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
        $id = $row["attendance_id"];
        $title = $row['senator_id'];

        $output .= '
              <input type="text" name="reject_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
                	<p>Reject Attendance Request</p>
                	<h2>' . $row['senator_id'] . ' ' . ' ' . $row['attendance_id'] . '</h2>
	            </div>
              
              ';
    }
    $output .= "</form>";
    echo $output;

}

if(isset($_POST["reject_request"]))
{
    $id = $_POST['reject_id'];
//    $title = $_POST['update_title'];
    $sql = "UPDATE senate_attendance SET approve_statuses = 2 WHERE attendance_id= '".$id."'";
    $result = mysqli_query($db, $sql);
    echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Rejected Attendance!",
                    type: "success"
                  }).then(function() {
                      window.location = "request.php";
                  });
            }, 30);
        </script>';
}


//==============================================
if(isset($_POST["pos_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM senate_position WHERE pos_id = '".$_POST["pos_del_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["pos_id"];
          $title = $row['position_title'];
         $output .= '
              <input type="text" name="update_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
	                	<p>DELETE POSITION</p>
	                	<h2>'.$title.'</h2>
	            </div>
              ';
    } $output .= "</form>";
    echo $output;
}




//==============================DELETE MINUTES===============================
if(isset($_POST["min_del_id"]))
{
    $output = '';
//    $sql = "SELECT * FROM sched_minutes, senate_sched WHERE minutes_id = '".$_POST["min_del_id"]."'";

    $sql = "SELECT * FROM sched_minutes, senate_sched WHERE senate_sched.sched_id = sched_minutes.schedule_id AND sched_minutes.minutes_id='".$_POST["min_del_id"]."'";

    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {   $id = $row["minutes_id"];

        $title = $row['meeting_name'];
        $output .= '
              <input type="text" name="min_del" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
              <p>Delete attached minutes from:</p>
	                	<h2>'.$title.'</h2>
	     
	            </div>
              ';
    }
    $output .= "</form>";
    echo $output;
}
if(isset($_POST["delete_min"]))
{   $id = $_POST['min_del'];
    $sql = "DELETE FROM sched_minutes WHERE minutes_id = '$id'";
    $result = mysqli_query($db, $sql);
    echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Minutes has been Deleted!",
                    type: "success"
                  }).then(function() {
                      window.location = "senate_minutes.php";
                  });
            }, 30);
        </script>';
}




























//============================EDIT MINUTES=============================
//
//if(isset($_POST["min_edit_id"]))
//{
//    $output = '';
////    $sql = "SELECT * FROM sched_minutes, senate_sched WHERE minutes_id = '".$_POST["min_edit_id"]."'";
//
//
//    $sql="SELECT * FROM sched_minutes, senate_sched WHERE senate_sched.sched_id = sched_minutes.schedule_id
//                                            AND sched_minutes.minutes_id='".$_POST["min_edit_id"]."'";
//    $result = mysqli_query($db, $sql);
//    $output .= '
//    <form method="POST"  enctype="multipart/form-data">';
//    while($row = mysqli_fetch_array($result))
//    {   $id = $row["minutes_id"];
//        $description = $row['description'];
//        $meeting_name = $row['meeting_name'];
//        $filename = $row['file'];
//
//        $output .= '<div class="input-group mb-3">
//                                    <select name="meeting_name" class="form-control" required>
//                                        <option hidden> - Select meeting -</option>
//
//                                            <option  value="'.$id.'">
//                                            </option>
//                                    </select>
//                                    <div class="input-group-append">
//
//                                    </div>
//                                </div>
//                                <div class="input-group mb-3">
//                                    <input type="text" class="form-control"  value="'.$row['description'].'" name="description" id="description" required>
//                                    <div class="input-group-append">
//
//                                    </div>
//                                </div>
//                                <div class="input-group mb-3">
//                                    <input type="file" class="form-control"  value="" name="fileToUpload" id="fileToUpload" required>
//                                </div>
//                                <div align="right">
//                                    <button type="submit" class="btn btn-primary btn-flat" name="pdf_file"><i class="fas fa-sign-in-alt"></i> Upload</button>
//                                </div>
//              ';
//    }
//    $output .= "</form>";
//
//
//
//    echo $output;
//}
//if(isset($_POST["min_edit"]))
//{   $id = $_POST['min_edit_id'];
//    $description = $_POST['description'];
//    $file = $_POST['fileToUpload'];
//    $meeting_name = $_POST['meeting_name'];
//
////    $sql = "DELETE FROM sched_minutes WHERE minutes_id = '$id'";
//   $sql = "UPDATE sched_minutes SET description = '".$description."', file = '".$file."' WHERE minutes_id = '".$id."'";
//
//    $result = mysqli_query($db, $sql);
//    echo '<script>
//            setTimeout(function() {
//                Swal.fire({
//                    title: "Success !",
//                    text: "Minutes has been Deleted!",
//                    type: "success"
//                  }).then(function() {
//                      window.location = "senate_minutes.php";
//                  });
//            }, 30);
//        </script>';
//}
























//DELETE POSITION
if(isset($_POST["pos_delete"]))
 { $id = $_POST['update_id'];
   $sql = "DELETE FROM senate_position WHERE pos_id = '$id'";
   $result = mysqli_query($db, $sql);
   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Position has been Deleted !",
                    type: "success"
                  }).then(function() {
                      window.location = "senate_positions.php";
                  });
            }, 30);
        </script>';
}




//EDIT SENATOR INFORMATION
if(isset($_POST["emp_edit_id"]))
{
    $output = '';
    $sql = "SELECT * FROM senate_list WHERE senate_id = '".$_POST["emp_edit_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $card = $row["senate_id"];
          $emp = $row['student_id'];
          $fname = $row['senator_fname'];
          $lname = $row['senator_lname'];
          $address = $row['senator_address'];
          $contact = $row['senator_contact'];
          $gender = $row['senator_gender'];

         $output .= '
              <input type="text" name="id" class="form-control" value="'.$card.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Senator ID</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="emp_card" value="'.$emp.'" placeholder="" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Firstname</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_fname" value="'.$fname.'" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Lastname</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_lname" value="'.$lname.'" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Bank Details</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_address" value="'.$address.'" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Contact</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_contact" value="'.$contact.'" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-7">
                  <select name="update_gender" class="form-control" value="'.$gender.'">
                    <option hidden> - Select -</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer Not">Prefer Not to say</option>
                  </select>
                </div>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;

}


// UPDATE SENATOR INFORMATION
if(isset($_POST["emp_update"]))
 {
   $card = $_POST["id"];
   $fname = $_POST['update_fname'];
   $lname = $_POST['update_lname'];
   $address = $_POST['update_address'];
   $contact = $_POST['update_contact'];
   $gender = $_POST['update_gender'];

   $sql = "UPDATE senate_list SET senator_fname = '".$fname."', senator_lname = '".$lname."', senator_address = '".$address."', senator_contact = '".$contact."', senator_gender = '".$gender."'
   WHERE senate_id = '".$card."'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Senators Information has been updated !",
                    type: "success"
                  }).then(function() {
                      window.location = "senate_list.php";
                  });
            }, 30);
        </script>';
}






//GET SENATOR BY ID DELETE
if(isset($_POST["emp_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM senate_list WHERE senate_id = '".$_POST["emp_del_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["senate_id"];

         $output .= '
              <input type="text" name="del_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
	                	<p>DELETE SENATE MEMBER</p>
	                	<h2>'.$row['senator_fname'] .' ' . ' '. $row['senator_lname'].'</h2>
	            </div>
              ';
    }
    $output .= "</form>";
    echo $output;
}


//DELETE SENATOR
if(isset($_POST["emp_delete"]))
 {
   $id = $_POST['del_id'];
//   $sql = "DELETE FROM senate_list WHERE senate_id = '$id'";
//   new query to delte records from both tables
//    $db->query("SET SQL_SAFE_UPDATES = 0");
    $sql = "DELETE FROM senate_list WHERE senate_id = '$id'";
    $sql2 = "DELETE FROM senate_attendance WHERE senate_id = '$id'";






//    =================END NEW QUERY====================================
   $result = mysqli_query($db, $sql);
    $result = mysqli_query($db, $sql2);
    echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Senator has been Deleted !",
                    type: "success"
                  }).then(function() {
                      window.location = "senate_list.php";
                  });
            }, 30);
        </script>';
}





//==========================THIS IS WHAT IS SHOWING ANYTIME I SUBMIT ADD MINUTES=====================================================

if(isset($_POST["sched_edit_id"]))
{
    $output = '';
    $sql = "SELECT * FROM senate_sched WHERE sched_id = '".$_POST["sched_edit_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["sched_id"];
         $output .= '
              <input type="text" name="edit_id" class="form-control" value="'.$id.'" hidden>
               <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Meeting Name</label>
                            <div class="col-sm-7">
                                <div class="">
                                    <div class="input-group " data-target-input="nearest">
                                        <input type="text" value="'.$row['meeting_name'].'" name="sched_update_meeting_name"  class="form-control" required placeholder="Meeting name">
                                    </div>
                                </div>

                            </div>
                        </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Time in</label>
                <div class="col-sm-7">
                  <div class="bootstrap-timepicker">
                    <div class="input-group date" id="thirdpicker" data-target-input="nearest">
                      <input type="time" value="'.$row['sched_in'].'" name="sched_update_in" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" placeholder="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Time out</label>
                <div class="col-sm-7">
                  <div class="bootstrap-timepicker">
                    <div class="input-group date" id="fourthpicker" data-target-input="nearest">
                      <input type="time" value="'.$row['sched_out'].'" name="sched_update_out" class="form-control datetimepicker-input" data-target="#secondpicker" data-toggle="datetimepicker" placeholder="">
                    </div>
                  </div>
                </div>
              </div>

              ';
    }
    $output .= "</form>";
    echo $output;

}

//EDIT SCHEDULE

if(isset($_POST["update_sched"]))
 {
   $id = $_POST['edit_id'];
   $in = $_POST['sched_update_in'];
   $out = $_POST['sched_update_out'];
   $schedule_name = $_POST['sched_update_meeting_name'];



   $sql = "UPDATE senate_sched SET sched_in = '$in', sched_out = '$out', meeting_name = '$schedule_name' WHERE sched_id = '$id'";
   $result = mysqli_query($db, $sql);

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
//===================================================================================































//GET SCHEDULE ID TO DELETE
if(isset($_POST["delsched_id"]))
{
    $output = '';
    $sql = "SELECT * FROM senate_sched WHERE sched_id = '".$_POST["delsched_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["sched_id"];
         $output .= '
              <input type="text" name="del_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
	                	<p>DELETE SCHEDULE</p>
	                	<h2>'.$row['sched_in'] .' ' .'-'. ' '. $row['sched_out'].'</h2>
	            </div>
              ';
    }
    $output .= "</form>";
    echo $output;

}


// DELETE SCHEUDLE
if(isset($_POST["delete_sched"]))
 {
   $id = $_POST['del_id'];

   $sql = "DELETE FROM senate_sched WHERE sched_id = '$id'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Schedule has been Deleted !",
                    type: "success"
                  }).then(function() {
                      window.location = "senate_sched.php";
                  });
            }, 30);
        </script>';
}





//=====================================================================================================================================






































// UPDATE SCHUDLE INFORMATION
if(isset($_POST["change"]))
 {
   $id = $_POST['change_sched_id'];
   $new = $_POST['new_sched'];

   $sql = "UPDATE senate_list SET sched_id = '$new' WHERE senate_id = '$id'";
   $result = mysqli_query($db, $sql);
   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Schedule information has been updated !",
                    type: "success"
                  }).then(function() {
                      window.location = "print_sched.php";
                  });
            }, 30);
        </script>';
}


//==========================================ADD MINUTES==========================================================


if(isset($_POST["pdf_file"]) && isset($_FILES["fileToUpload"])){
    $allowed_file_type =['application/pdf'];

//    $file_name = $_FILES["fileToUpload"]["name"];
    $file_tmp = $_FILES["fileToUpload"]["tmp_name"];
    // Read file content
//    $pdf_content = file_get_contents($file_tmp);

//    $pdf_content = $file_tmp;

    // Insert into database
    $description = $_POST["description"];
    $sched_id = $_POST["sched_id"];
    $target_dir = "../admin/minutesFiles/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $filename = $_FILES['fileToUpload']['name'];
    $pdf_content=$filename;


    if(in_array($_FILES["fileToUpload"]["type"], $allowed_file_type)){
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
    } else{
        echo '<script>
           setTimeout(function() {
               Swal.fire({
                   title: "Failed!",
                   text: "Only pdf files can be uploaded",
                   type: "error"
                 }).then(function() {
                     window.location = "senate_minutes.php";
                 });
           }, 30);
       </script>';
    }



//    die[POST];
//    $stmt->close();
//    $db->close();
}
?>
