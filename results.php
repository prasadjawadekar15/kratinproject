
<?php
session_start();
//error_reporting(0);
include'dbconnect.php';
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
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  

 
th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
* {box-sizing: border-box}

.container {
  width: 100%;
  background-color: #ddd;
}

.skills {
  text-align: right;
  padding-top: 10px;
  padding-bottom: 10px;
  color: white;
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
    
<?php include 'navbar.php';?>

    <div class="col-sm-9">
      
      <hr>
     <h3>Welcome <b><?php echo $name;?></b></h3>

     <hr>
     <h5>
    <table>

    <tr>
    <th>PROBLEM</th>
    <th>HEALTH SCORE</th>
    <th>Symptoms</th>
    <th>Result</th>

</tr>
        
<?php
        $select = "SELECT points.patient_id,points.problem_id,points.patient_points,points.patient_problems,problems.problem_name FROM `points`  INNER JOIN `problems` on points.problem_id=problems.id WHERE points.patient_id=$pid" ;  
 $result = mysqli_query($conn, $select);
$rows_exist = mysqli_num_rows($result);
$row= mysqli_fetch_array($result);

do{
?>


<tr>
    <td><?php echo $row['problem_name'];?></td>

    <td> 



    <label for="file"><b><?php echo $row['patient_points'];?>%</label>
<progress id="file" value="<?php echo $row['patient_points'];?>" max="100"> 32% </progress>
</b>



</td>

    <td><b><?php echo $row['patient_problems'];?></b></td>

<td><?php if($row['patient_points']<=60){

echo "YOU SHOULD CHECK TO A DOCTOR IMMEDIATELY";

}
else if ($row['patient_points']>60 &&  $row['patient_points']<90 ){

echo "IT SEEMS THAT YOU HAVE SOME COMMON SYMPTOMS ,YOU SHOULD CHECK TO A DOCTOR";


}

else{


    echo "YOU SEEM TO BE FINE TAKE CARE!";
}


?>

<?php

}while($row= mysqli_fetch_array($result));


    

?>
    
    
    </h5>


     <hr>