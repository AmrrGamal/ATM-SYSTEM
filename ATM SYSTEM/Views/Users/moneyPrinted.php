<?php 
session_start();
if (isset($_POST["return"])){
session_destroy();
header("location:../Auth/pininput.php");  


}
if (!isset($_SESSION["userRole"])) {
  header("location:../Auth/pininput.php");
} else {
  if ($_SESSION["userRole"]!="user") {
      
    header("location:../Auth/pininput.php ");
  }
}




?>



<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
</head>

<style>
img {
  position: relative;
  top: 34%;
  left: 37%;
  height: 400px;
  width: 400px;
  margin-top:75px;
}
.center{
    text-align:center;
}
.center div {
    display:inline-block;
    margin-left:50px;
    margin-right:50px;
    margin-top:75px;
}
</style>


<body>

  <h2 align="center">Money has been printed.</h2>

  <div class="row">
    <img src="../../assets/images/money.png">
  </div>

  <form method="POST">
  <div class="center">
      <div><a href="transactions.php" style="" class="btn btn-primary btn-lg">Perform Another Transaction</a></div>
      <div><button type="submit" name="return" style="" class="btn btn-danger btn-lg">Return Card</button></div>
  </div>
</form>


</body>
</html>
