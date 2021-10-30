<?php
session_start();
$name=$_SESSION['full_name'];

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
<?php include 'navbar.php';?>

    <div class="col-sm-9">
      
      <hr>
     <h3>Welcome <b><?php echo $name;?></b></h3>



     <hr>
<table>
    <tr><td> IF YOU THINK YOU ARE SUFFERING FROM DEPRESSION</td>
   <td> <button  class="btn btn-success"  onclick="window.location.href =('test.php?problem=1')">CLICK HERE</button></td></tr>

    <tr><td>
IF YOU THINK YOU ARE HAVING DIGESTION PROBLEM</td>
<td><button  class="btn btn-success"  onclick="window.location.href =('sign_up.php')">CLICK HERE</button></td></tr>


<tr><td>
IF YOU THINK YOU ARE HAVING  COUGH RELATED PROBLEM-</td>
<td><button  class="btn btn-success"  onclick="window.location.href =('sign_up.php')">CLICK HERE</button></td>
</tr></table>

<hr>



    
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
