<?php
session_start();
error_reporting(0);
$name=$_SESSION['full_name'];
$pid=$_SESSION['p_id'];

$problem=$_GET['problem'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
include'dbconnect.php';
$exists=false;
//-----------------------------------------getting values from  form------------------------------------------------------------//
$que_points="";
$final_string="";
$temp=0;

    foreach($_POST['ans'] as $idd=>$pj)
    {
     
$comid = $_POST['comid'][$idd];
$que_points = $_POST['id'][$idd];
$id2=$_POST['ans'][$idd];
//echo $id2;
$total_id1=$comid+$total_id1;
$total_output=$id2+$total_output;
 
if($id2!='0'){

$final_string=$que_points.",". $final_string;

}
$temp++;
  



/*$select = "SELECT * FROM `login` WHERE email ='$email' ";
$result = mysqli_query($conn, $select);
$rows_exist = mysqli_num_rows($result);
*/

   //$INSERT = "INSERT INTO `login`(`full_name`, `email`,`password`,`mobile_number`,`gender`,`age`,`relatives_name`,`relatives_email`,`relatives_number`) VALUES ('$full_name', '$email','$password','$mobile_number','$gender','$age','$relatives_name','$relatives_email','$relatives_number')";
   //$result = mysqli_query($conn, $INSERT);
}
$total=number_format($total_id1);
$output=number_format($total_output);


$answer= (100- ((int)($output*100/$total)));


//echo "id-$problem";

$INSERT = "INSERT INTO `points`(`patient_id`,`problem_id`,`patient_points`,`patient_problems`) VALUES ('$pid','$problem','$answer','$final_string')";
$result = mysqli_query($conn, $INSERT);
?>

<?php

header("location:results.php");

}

?>


















<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
     
      color: white;
      padding: 15px;
    }

      
  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;

  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  

 
th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
    <form action ="test.php?problem=<?php echo $problem;?> " method="post">
<?php include 'navbar.php';?>

    <div class="col-sm-9">
      
      <hr>
     <h3>Welcome <b><?php echo $name;?></b></h3>

     <hr>
     <h5><b>PLEASE SELECT YES/NO</b> </h5>


     <hr>

   <?php  
   include'dbconnect.php';
   $problem=$_GET['problem'];
 $select = "SELECT * FROM `questions` WHERE que_key ='$problem' ";
 $result = mysqli_query($conn, $select);
$rows_exist = mysqli_num_rows($result);
$row= mysqli_fetch_array($result);
//echo $rows_exist;
$cnt = $row['id'];
$j=1;
for($i=0;$i<$rows_exist;$i++){
   
$select2 = "SELECT * FROM `questions` WHERE `que_key` ='$problem'AND `id`='$cnt' ";
 $result2 = mysqli_query($conn, $select2);
$rows_exist2 = mysqli_num_rows($result2);
$row2= mysqli_fetch_array($result2);

//echo $rows_exist2;

?>
<p>
<?php
echo "Q$j-";
$j++;
//echo $row2['id'];
echo $row2["question"];
$cnt++;





echo "<br>";
?></p>
<input type ="hidden" name="comid[<?php echo $row2['id'];?>]" value="<?php echo $row2['que_points'];?>">

<input type="hidden" name=" id[<?php echo $row2['id'];?>]" value="<?php echo $row2['que_problem'];?>">

Yes  <input type="radio" name=" ans[<?php echo $row2['id'];?>]" value="<?php echo $row2['que_points'];?>"><br>
No<input type="radio" name=" ans[<?php echo $row2['id'];?>]" value="0">

<hr>






<?php



}
?>

<input type ="submit" name="submit" value="submit" onclick="myFunction()">



</form>


<script>
function myFunction() {
  alert("CLICK OK TO SEE RESULTS");
}
</script>