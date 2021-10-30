
<!--- 

ADULT'S FRIEND
PROJECT BY:PRASAD UDAY JAWADEKAR
FRONTEND OF LOGIN FORM(POP UP,BUTTONS,ICONS) GOT FROM W3SCHOOL.COM(COPYRIGHT FREE)-->


<?php
error_reporting(0);
$loginadmin="";

if($_SERVER["REQUEST_METHOD"] == "POST")
 {
include'dbconnect.php';

//-----------------------------------------getting values from login form------------------------------------------------------------//

$email = $_POST['email'];
$loginadmin = $_POST['login'];
$password = $_POST['password']; //--password hashing can be use to provide security--//


if($loginadmin=='P'){
$check_email = " SELECT * from `login`  WHERE  email='$email' AND password='$password'";
$result = mysqli_query($conn, $check_email);
$fetch_name=mysqli_fetch_array($result);
$num = mysqli_num_rows($result);
if (($num == 1)){
  session_start();
  header("location: dashboard.php");
     $login = true;
  $full_name=$fetch_name['full_name'];
  $pid=$fetch_name['id'];
  $_SESSION['full_name'] = $full_name;
  $_SESSION['p_id'] = $pid;
   

} 
else{
    $showError = "Invalid Credentials";
}


 }
 

 else if($loginadmin =="D"){
  
  $check_email = " SELECT * from `doctor`  WHERE  email='$email' AND password='$password'";
  $result = mysqli_query($conn, $check_email);
  $fetch_name=mysqli_fetch_array($result);
  $num = mysqli_num_rows($result);
  if (($num == 1)){
    session_start();
    header("location: doctor_home.php");
       $login = true;
    $full_name=$fetch_name['name'];
    $did=$fetch_name['id'];
      $_SESSION['full_name'] = $full_name;
      $_SESSION['doc_id'] = $did;
     
  
  } 
  else{
      $showError = "Invalid Credentials";
  }
  
  
   }

else if($loginadmin=="MS"){

  $check_email = " SELECT * from `medical_store`  WHERE  `email` ='$email' AND  `password`='$password'";
  $result = mysqli_query($conn, $check_email);
  $fetch_name=mysqli_fetch_array($result);
  $num = mysqli_num_rows($result);
  if (($num == 1)){
    session_start();
    header("location: ms.php");
       $login = true;
    $full_name=$fetch_name['full_name'];
    $msid=$fetch_name['id'];
    $_SESSION['full_name'] = $full_name;
    $_SESSION['ms_id'] = $msid;
     
  
  } 
  else{
      $showError = "Invalid Credentials";
  }
  
  








   




 }

 else{
  //header("location: index.php");


 }

 }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="login.css" /> 
<style>
<style>
/*the container must be positioned relative:*/

</style>

</style>
</head>
<body>
  <?php
  if($showError){
    ?>
<div class="alert">
<span class="close" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>INVALID CREDENTIALS!</strong>&nbsp; TRY AGAIN.
</div>
<?php
}?>
<div class="bg-image"></div>

<div class="bg-text">

<h1 style="font-size:50px">GRANDMAA'S FRIEND</h1>
<h1 style="font-size:20px">By-PRASAD UDAY JAWADEKAR</h1>
<p>SHRI SANT GAJANAN MAHARAJ COLLEGE OF ENGINEERING SHEGAON</p>



<button onclick="document.getElementById('login').style.display='block'" class="button_login" style="width:auto;">Login</button>
<button onclick="window.location.href =('signup_home.php')" class="button_login" style="width:auto;">Sign Up</button>


</div>

<div id="login" class="modal">
<span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
<form class="modal-content" action="index.php" method="post">
<div class="container">
      <h1>LOGIN</h1>
      <p>Please enter your username and password</p>
      <h1>
      <!--<a href="https://wa.me/+919766824978?text=hello">SEND msggggg</a></h1>-->
      <hr>
     
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <div class="container">
    <div class="row">
      <div class="col-25">
        <label for="gender">Select Login</label>
      </div>
      <div class="col-75">
    
        <select id="login"  name="login">
          <option value="D">DOCTOR</option>
          <option value="MS">MEDICAL STORE</option>
          <option value="P">PATIENT</option>
        </select>
</div>
      </div>
    </div>

      <br><br>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
        
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('login');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>





</body>
</html>
