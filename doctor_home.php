<?php
session_start();
include'dbconnect.php';
//error_reporting(0);
$name=$_SESSION['full_name'];
$pid=$_SESSION['p_id'];
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

  .ar{

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


    
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
  
</head>
<body>
    <form action ="test.php?problem=<?php echo $problem;?> " method="post">
<?php include 'docsnav.php';?>


<div class="col-sm-9">
      
      <hr>
     <h3>Welcome <b>DR.<?php echo $name;?></b></h3>

     <hr>

     <table>
  <tr>
      <th> Sr no</th>
    <th> Name</th>
    <th> Age</th>
    <th>Case of</th>
  </tr>

<?php
  $select = "SELECT `full_name`,`age`,`id` FROM `login` ";
$result = mysqli_query($conn, $select);
$rows_exist = mysqli_num_rows($result);

$row= mysqli_fetch_array($result);
$i=1;
do{
?>


  <tr>
      <td> <?php echo $i;
      $i++;      ?>
      </td>
    <td><?php echo $row['full_name'];?>   </td>
    <td> <?php echo $row['age'];?>  </td>
    <td> <a  class="ar" href="patient_table.php?pid=<?php echo $row['id'];?>" > Click here </a></td>
  </tr>
  <tr>
<?php

}while($row= mysqli_fetch_array($result));?>