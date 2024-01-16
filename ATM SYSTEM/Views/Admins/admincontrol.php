<?php
session_start();
if (!isset($_SESSION["userRole"])) {
    
    header("location:../Auth/pininput.php");
  } else {
    if ($_SESSION["userRole"] != "admin") {
        
      header("location:../Auth/pininput.php ");
    }
  }

  
  if(isset($_POST['back'])){
  session_destroy();
  header("location:../Auth/pininput.php");
  }


?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
</head>
<style>


</style>
<body>
<div class="container">
<h1 align="center">WELCOME TO BANK MASR</h1>
<div class="row">
    <div class="col-sm-4"><a href="refillbalance.php" style="" class="btn btn-primary btn-lg largeMenuButton">Refill Balance</a></div>
    <div class="col-sm-4"><a href="senddailyreport.php" style="" class="btn btn-primary btn-lg largeMenuButton">Send Report</a></div>

    <div class="col-sm-4"><a href="users.php" style="" class="btn btn-primary btn-lg largeMenuButton">View Users</a></div>
</div>

<form method="POST">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><button name="back" type="submit" class="btn btn-danger btn-lg returnCardButton">Back</a></div>
    </div>
</form>

</div>

</body>
</html>