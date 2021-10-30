<?php
$showAlert = false;
$showError = false;
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
include'dbconnect.php';
$exists=false;
//-----------------------------------------getting values from signup form------------------------------------------------------------//

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password']; //--password hashing can be use to provide security--//
$mobile_number = $_POST['mobile_number'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$relatives_name = $_POST['relatives_name'];
$relatives_email = $_POST['relatives_email'];
$relatives_number = $_POST['relatives_number'];

 $select = "SELECT * FROM `login` WHERE email ='$email' ";
 $result = mysqli_query($conn, $select);
$rows_exist = mysqli_num_rows($result);
if($rows_exist>0) 
{
 $showError = "this username is already exist" ;
}
else
{
  if($exists==false)
  {  
    $INSERT = "INSERT INTO `login`(`full_name`, `email`,`password`,`mobile_number`,`gender`,`age`,`relatives_name`,`relatives_email`,`relatives_number`) VALUES ('$full_name', '$email','$password','$mobile_number','$gender','$age','$relatives_name','$relatives_email','$relatives_number')";
    $result = mysqli_query($conn, $INSERT);
    if ($result)
    {
    $showAlert = true;
    }
  }   
else{
  $showError = "unable to process";
    }
}
}
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="sign_up.css" /> 
</head>
<body>

<h2>SIGN UP</h2>
<p> Please fill the form carefully!</p>

<div class="container">
  <form action="sign_up.php" method="post">
  <!------------------------------------------SIGN UP INPUTS--------------------------------------->
   <div class="row">
      <div class="col-25">
        <label for="fname">Full Name</label>
      </div>
      <div class="col-75">
        <input type="text"  name="full_name" placeholder="Your name..">
      </div>
    </div>

    
    <div class="row">
      <div class="col-25">
        <label for="lname">Mobile Number </label>
      </div>
      <div class="col-75">
        <input type="number"  name="mobile_number" placeholder=" number..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <input type="text"  name="email" placeholder="Email..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="password">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="password" name="password" placeholder="Password..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="email">Re-enter password</label>
      </div>
      <div class="col-75">
        <input type="password" id="c_password" name="c_password" placeholder="Re-enter Password.." onkeyup="passcompare()">
      
      </div>
    
      <p>   password is <b id="p1"> </b> </p>
    </div>

   
</div>
<br>
<div class="container">
    <div class="row">
      <div class="col-25">
        <label for="gender">Gender</label>
      </div>
      <div class="col-75">
        <select id="gender" name="gender">
          <option value="M">Male</option>
          <option value="F">Female</option>
          <option value="O">Other</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Age</label>
      </div>
      <div class="col-75">
        <input type="number"  name="age" placeholder="age..">
      </div>
    </div>

      <div class="row">
      <div class="col-25">
        <label for="lname">Relatives Name(son,daughter,friend,siblings)</label>
      </div>
      <div class="col-75">
        <input type="text"  name="relatives_name" placeholder="enter relatives name..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Relatives Email </label>
      </div>
      <div class="col-75">
        <input type="text"  name="relatives_email" placeholder="enter relatives email..">
      </div>
    </div>
     
    <div class="row">
      <div class="col-25">
        <label for="lname">Relatives number </label>
      </div>
      <div class="col-75">
        <input type="number"  name="relatives_number" placeholder="enter relatives number..">
      </div>
    </div>


    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>

<script>
  function passcompare()
{
	var password = document.getElementById("password").value;
	var cpassword = document.getElementById("c_password").value;
  document.getElementById("p1").innerHTML = "<b style='color:red;'>incorrect</b>";
  if(password==cpassword){


document.getElementById("p1").innerHTML = "<b style='color:green;'>correct</b>";

  }

}
</script>