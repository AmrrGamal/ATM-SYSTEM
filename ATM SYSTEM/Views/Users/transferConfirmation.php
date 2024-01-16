<?php
require_once '../../Controllers/accountControllers.php';
require_once '../../Controllers/transactionController.php';
require_once '../../Controllers/depositController.php';
require_once '../../Models/account.php';
require_once '../../Controllers/transferController.php';
if (!isset($_SESSION["userRole"])) {
  header("location:../Auth/pininput.php");
} else {
  if ($_SESSION["userRole"]!="user") {
      
    header("location:../Auth/pininput.php ");
  }
}


$AccountController = new AccountControllers;
$TransactionController=new TransactionControllers;
$TransferControllers=new TransferControllers;
$dataOfAccount= $AccountController->getBalance();
$oldSenderBalance=$dataOfAccount[0]["balance"];

if(isset($_POST['yes'])){

  // changes in sender account
  $newSenderBalance=$oldSenderBalance - $_SESSION['transferamount'];
  $account=new Account;
  $account->setBalance($newSenderBalance);
  $AccountController->updateBalance($account);
  $TransactionController->addTransaction($_SESSION["accId"],'Transfer');
  $TransferControllers->addTransfer($_SESSION['transferamount'] , $_SESSION["receiverpin"]);


  // changes in receiver account
  $receiverData= $TransferControllers->getReceiverBalance();
  $oldReceiverBalance=$receiverData[0]["balance"];
  $newReceiverBalance=$oldReceiverBalance + $_SESSION['transferamount'];
  $account->setBalance($newReceiverBalance);
  $TransferControllers->updateReceiverBalance($account);
  header('location:transferProcessed.php');

  }
  

if(isset($_POST['no'])){
  
header('location:transfer.php');

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
<div class="container-fluid"> <br> <br>
  <h1 class="infoText" align="center">Are you sure you want to Transfer the amount specified to :
  <span style="color:#be4e0d"> <?php  echo $_SESSION["receiverName"];echo ' ?'; ?></span></h1>
  <br>
  <h1 align="center"><?php

 echo  '$'.$_SESSION['transferamount'];?></h1>
<br>
<br>
<br> 
<form method="POST">
<div class="row">
    <div class="col-sm-6"><button type="submit" name="yes" style="float: right" class="btn btn-primary btn-lg btn-success confirmationBtn enterButton">YES</a></div>
    <div class="col-sm-6"><button type="submit" name="no" class="btn btn-primary btn-lg btn-danger confirmationBtn backButton">NO</a></div>
  </div>

</form>
</div>
</body>


</html>
