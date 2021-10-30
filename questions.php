<?php
include'dbconnect.php';
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {


//-----------------------------------------getting values from signup form------------------------------------------------------------//

$question_type = $_POST['type'];
$question = $_POST['question'];
$key = $_POST['key'];
$pow = $_POST['pow'];


    $INSERT = "INSERT INTO `questions`(`que_key`, `question`,`que_problem`,`que_points`) VALUES ('$question_type','$question','$key','$pow')";
    $result = mysqli_query($conn, $INSERT);
    if ($result)
    {
    $showAlert = true;
    }
     
else{
  $showError = "unable to process";
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
  <form action="questions.php" method="POST">

  <label for="country">QUESTION TYPE</label>
  <?php
  $question_type_get = " SELECT * from `problems`";
$result = mysqli_query($conn, $question_type_get);
$fetch_type=mysqli_fetch_array($result);
?>
<select  name="type">
<?php
do{
?>
 <option value="<?php echo $fetch_type['id'] ?>"><?php echo $fetch_type['problem_name'] ?>  </option>
<?php
}while($fetch_type=mysqli_fetch_array($result));






?>
    
     
     
    </select>

    <label for="fname">QUESTION</label>
    <textarea  name="question" placeholder="Write something.." style="height:200px"></textarea>

    <label for="lname">KEY</label>
    <input type="text"  name="key" placeholder="Your last name..">

    <label for="lname">Problem severity</label>
    <input type="number"  name="pow" placeholder="Your last name..">

   

   

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
