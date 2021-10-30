<?php
$showAlert = false;
$showError = false;
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
include'dbconnect.php';
$exists=false;
//-----------------------------------------getting values from signup form------------------------------------------------------------//

$full_name = $_POST['full_name'];
echo $full_name;
$email = $_POST['email'];
$password = $_POST['password']; //--password hashing can be use to provide security--//
$mobile_number = $_POST['mobile_number'];

$field = $_POST['field'];
$hospital = $_POST['hospital'];



 $select = "SELECT * FROM `doctor` WHERE email ='$email' ";
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
    $INSERT = "INSERT INTO `doctor`(`name`, `email`,`password`,`number`,`field`,`hospital_name`) VALUES ('$full_name', '$email','$password','$mobile_number','$field','$hospital')";
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
<h3>Contact Form</h3>

<div class="container">
  <form action="doc_signup.php" method="POST">
    <label for="fname">Full Name</label>
    <input type="text" id="full_name" name="full_name" placeholder="Your name..">

    <label for="email">Email</label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw">Password</label>
      <input type="password" id="password" placeholder="Enter Password" name="password" required>
       
      <label for="email">Re-enter password</label>
   
     <input type="password" id="c_password" name="c_password" placeholder="Re-enter Password.." onkeyup="passcompare()">
     <p>   password is <b id="p1"> </b> </p>
     
</div>
<br>
<div class="container">


    <label for="lname">Mobile Number </label>
    <input type="number"  name="mobile_number" placeholder=" number..">
   
    <label for="lname">Field</label>
    <input type="text"  name="field" placeholder="Your last name..">

    <label for="lname">Hospital name</label>
    <input type="text"  name="hospital" placeholder="Your last name..">


    

    <input type="submit" value="Submit">
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