<?php
require_once '../../Controllers/accountControllers.php';
require_once '../../Models/account.php';

if (!isset($_SESSION["userRole"])) {
   header("location:../Auth/pininput.php");
 } else {
   if ($_SESSION["userRole"]!="user") {
       
     header("location:../Auth/pininput.php ");
   }
 }

$AccountController = new AccountControllers;
$accountInfo = $AccountController->getAccountInfo();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="print.css" media="print">
     <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --blue:#3498db;
   --red:#e74c3c;
   --orange:#f39c12;
   --black:#333;
   --white:#fff;
   --light-bg:#eee;
   --box-shadow:0 8px 10px rgba(0,0,0,.2);
   --border:2px solid var(--#f18f38);
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   text-decoration: none;
}

*::-webkit-scrollbar{
   width: 10px;
   height: 5px;
}

*::-webkit-scrollbar-track{
   background-color: transparent;
}

.delete-btn{
   display: inline-block;
   padding:25px 50px;
   cursor: pointer;
   margin-right:40px;
   color:var(--white);
   border-radius: 5px;
   
   background-color: rgb(44, 62, 80);
   font-weight:500;
   font-size:20px;

}
*::-webkit-scrollbar-thumb{
   background-color: var(--blue);
}

.container .shopping-cart{
   padding:20px 0;
}

.container .shopping-cart table{
   width: 100%;
   height:350px;
   text-align: center;
   border:var(--border);
   border-radius: 5px;
   box-shadow: var(--box-shadow);
   background-color: var(--white);
}

.container .shopping-cart table thead{
   background-color:rgb(44, 62, 80);
}

.container .shopping-cart table thead th{
   padding: 23px;
   color:var(--white);
   text-transform: capitalize;
   font-size: 20px;
   
}

.container .shopping-cart table .table-bottom{
   background-color: var(--light-bg);
}

.container .shopping-cart table tr td{
   padding-left:32px;
   font-size: 19px;
   color:var(--black);
}

.container .shopping-cart table tr td:nth-child(1){
   padding-left: 100px;
}
.container .shopping-cart table tr td:nth-child(2){
   padding-left: 60px;
}
.container .shopping-cart table tr td:nth-child(3){
   padding-left: 60px;
}
.container .shopping-cart table tr td:nth-child(4){
   padding-left: 60px;
}
</style>    
    

    <title>account information </title>
</head>
<body>
<div  class="container">  
    
    <div class="shopping-cart">
    
    <h1 style="text-align:center;font-size: 60px">The Last five Transactions</h1>
    <h1 style="text-align:center;font-size: 50px"><?php echo $_SESSION["accType"].'  :  '.$_SESSION["accId"];?></h1>

    <h1 style="text-align:center;font-size: 40px">Your Balance is :<?php
           $dataOfAccount= $AccountController->getBalance();
           $Balance=$dataOfAccount[0]["balance"];
           echo $Balance;

           if($_SESSION["accType"]=="Gold Account"){
          $dailyIntrest=$dataOfAccount[0]["dailyIntrest"];
          ?><h1 style="text-align:center;font-size: 40px">Your DailyIntrest is :<?php echo $dailyIntrest;} 
          if($_SESSION["accType"]=="Saving Account"){
            $dailyIntrest=$dataOfAccount[0]["annuaIntrest"];
            ?><h1 style="text-align:center;font-size: 40px">Your Annual Intrest is :<?php echo $dailyIntrest;} 
          
          ?>
          
            </h1>
            <br>


    
       <table >
          <thead>
             <th>Transaction Number</th>
             <th>Transaction Id</th>
             <th> Transaction Type </th>
             <th>Amount</th>
             <th></th>
             <th>Data of Transaction</th>
          </thead>
          <tbody>
             <?php
             $i=1;
          
            for($j = 0; $j < 5 ; $j++){
?>
  <tr>
                <td><?php  echo $i++; ?></td>
                <td><?php echo $accountInfo [$j]["transactionId"] ?> </td>
                <td><?php echo $accountInfo [$j]["transactiontType"] ?></td>
                <?php  
                       $data=$AccountController->getAmountOfTransaction($accountInfo[$j]["transactionId"],$accountInfo[$j]["transactiontType"]);
                       $amount=$data[0]["amount"];                                                           
                       ?>

                

                <td> <?php echo $amount ?></td>
                <td> </td>
                <td><?php echo $accountInfo [$j]["transactionData"] ?>   </td>
   
             </tr>
<?php

          }
?>
          
          
         

       </tbody>

       </table>
    
    
    
    </div>
          
    </div>
    
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    <div class="col-md-4"><a href="transactions.php" style="background-color:rgb(44, 62, 80) ;color:white; width: 110px;height: 60px;margin-left:470px;margin-top:70px "class="btn btn-safe btn-lg" >Back</a></div>
    <div class="text-center">
    <button style="background-color:rgb(44, 62, 80) ; color:white" onclick="window.print();" class="btn btn-safe btn-lg " id="print-btn">Print</button>
      </div>


</body>
</html>