<?php
require_once '../../Controllers/accountControllers.php';
require_once '../../Controllers/transactionController.php';
require_once '../../Controllers/depositController.php';
require_once '../../Models/account.php';
require_once '../../Controllers/adminconrollers.php';


if (!isset($_SESSION["userRole"])) {
  header("location:../Auth/pininput.php");
} else {
  if ($_SESSION["userRole"]!="user") {
      
    header("location:../Auth/pininput.php ");
  }
}
$AdminController=NEW AdminController;
$AccountController = new AccountControllers;
$TransactionController=new TransactionControllers;
$DepositControllers=new DepositControllers;
$dataOfAccount= $AccountController->getBalance();
$oldBalance=$dataOfAccount[0]["balance"];
if(isset($_POST['yes'])){
  
  $newBalance=$_SESSION['amonutOfDeposit'] + $oldBalance;
  $account=new Account;
  $account->setBalance($newBalance);
  $AccountController->updateBalance($account);
  $TransactionController->addTransaction($_SESSION["accId"],'Deposit');
  $DepositControllers->addDeposit($_SESSION['amonutOfDeposit']);

  $atm = $AdminController->getAtmData();
  $ATMOldBalance=$atm[0]["balance"];
  $newATMBalance=$ATMOldBalance+$_SESSION['withdrawAmount'];
  $atm2 = $AdminController->updateATMBalance($newATMBalance);

  header('location:depositComplete.php');
  }
 

if(isset($_POST['no'])){
  
header('location:deposit.php');

}




?>
<!DOCTYPE html>
<html>
<style>
.okBtn {
	font-size: 40px;
	width: 70px;
}
</style>
<head>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/updateBalance.js"></script>
</head>
<body>
<div class="container-fluid">
<br>
<br>
  <h1 class="infoText" align="center">Are you sure you want to deposit the amount specified?<br> <br><?php

 echo  '$'.$_SESSION['amonutOfDeposit'];

?></h1>
  <br>
  <br>
  <div id="div1">

    <h2 class="infoText" align="center" id='result'></h2>

  </div>


 
  <form method="POST">
<div class="row">
    <div class="col-sm-6"><button type="submit" name="yes" style="float: right" class="btn btn-primary btn-lg btn-success confirmationBtn enterButton">YES</a></div>
    <div class="col-sm-6"><button type="submit" name="no" class="btn btn-primary btn-lg btn-danger confirmationBtn backButton">NO</a></div>
  </div>

</form>
</div>

</body>





</html>

