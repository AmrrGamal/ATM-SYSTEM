<?php
require_once '../../Controllers/transactionController.php';
require_once '../../Controllers/withdrawController.php';
require_once '../../Models/account.php';
require_once '../../Controllers/accountControllers.php';
require_once '../../Controllers/adminconrollers.php';
$AccountController = new AccountControllers;
$AdminController=NEW AdminController;
$TransactionController=new TransactionControllers;
$WithdrawControllers=new WithdrawControllers; 
$dataOfAccount= $AccountController->getBalance();
$oldBalance=$dataOfAccount[0]["balance"];
if(isset($_POST['yes'])){
  $newBalance= $oldBalance - $_SESSION['withdrawAmount'] ;
  $account=new Account;
  $account->setBalance($newBalance); 
  $AccountController->updateBalance($account);
  $TransactionController->addTransaction($_SESSION["accId"],'Withdraw');
  $WithdrawControllers->addWithdraw($_SESSION['withdrawAmount']);
  $atm = $AdminController->getAtmData();
  $ATMOldBalance=$atm[0]["balance"];
  $newATMBalance=$ATMOldBalance-$_SESSION['withdrawAmount'];
  $atm2 = $AdminController->updateATMBalance($newATMBalance);

  header('location:moneyPrinted.php');
  }
 

if(isset($_POST['no'])){
  
 header('location:withdraw.php');

}



?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
    <script src="https://use.fontawesome.com/70aff799b3.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/updateBalance.js"></script>
</head>

<style>

#result{
  font-size: 60px;
}
.Button{
    position: absolute;
    
  background-color: white;
  cursor:pointer;
  font-size: 32px;
  margin:30px;
  height:200px;
  width:200px;
}

.Button:hover{
    color:white;
}

#yes{
      border: 5px outset green;
      top: 40%;
    left:30%;

}
#yes:hover{
    background-color: green;

}

#no{
      border: 5px outset red;
      top: 40%;
    right:30%;
}

#no:hover{
    background-color: red;
}
</style>

<body>
<div class="container">

<h1 style="text-align:center;font-size: 50px">Are you sure you want to withdraw the amount specified?<br> <br>
<?php

  echo '$'.$_SESSION['withdrawAmount']; ?>
</h1> 
<br>
<br>
<p id="result" align="center"></p>

<form method="POST">
<div class="row">
    <div class="col-sm-6"><button type="submit" name="yes" style="float: right" class="btn btn-primary btn-lg btn-success confirmationBtn enterButton">YES</a></div>
    <div class="col-sm-6"><button type="submit" name="no" class="btn btn-primary btn-lg btn-danger confirmationBtn backButton">NO</a></div>
  </div>

</form>




</div>
</body>
</html>