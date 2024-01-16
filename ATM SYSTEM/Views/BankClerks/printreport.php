<?php
session_start();
if (!isset($_SESSION["userRole"])) {
    
   header("location:../Auth/pininput.php");
 } else {
   if ($_SESSION["userRole"] != "bankclerk") {
       
     header("location:../Auth/pininput.php ");
   }
 }

 require_once '../../Controllers/bankclerkcontroller.php';
 require_once '../../Models/report.php';
 
 $BankClerkController = new BankClerkController;
 $reports = $BankClerkController->getReportsData($_SESSION['reportId']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
    
    
    <link rel="stylesheet" type="text/css" href="print.css" media="print">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
   --box-shadow:0 8px 10px rgba(11,11,11,.2);
   --border:2px solid var(--#f18f38);
}
.delete-btn{
   display: inline-block;
   padding:20px 40px;
   cursor: pointer;
   margin-right:40px;
   color:var(--white);
   border-radius: 5px;
   background-color: #aad6fc;
   text-decoration: none;
   font-weight:500;
   font-size:20px;

}

.delete-btn:hover{
   color:white;
}
td, th {
    border: 1px solid #fff;
    text-align: left;
    padding: 8px;
}table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width:700px;
    font-size:60px;
}
tr:nth-child(even) {
    background-color:#eee;
    color:black;
}
#p1{
 text-align: center;
}
.container .shopping-cart{
   padding:20px 0;
   
}

.container .shopping-cart table{
   margin-left:230px;
   color:black;
   text-align: center;
   border:var(--border);
   border-radius: 5px;
   box-shadow: var(--box-shadow);
   background-color:white;
}



.container .shopping-cart table thead th{
   padding: 23px;
   color:black;
   text-transform: capitalize;
   font-size:60px;
   color:black;
   
   
}



.container .shopping-cart table tr td{
   padding:30px;
   padding-left:20px;
   font-size:28px;
   color:black;
}

.container .shopping-cart table tr td:nth-child(1){
    padding-left:50px;
    color:rgb(44, 62, 80);
   
}
.container .shopping-cart table tr td:nth-child(2){
    color:rgb(44, 62, 80);
   
}
</style>    
    

    <title>Report Details </title>
</head>
<body>
<div  class="container">  
    
    <div  class="shopping-cart">
    
    <h1 style="text-align:center;font-size: 60px"> Report Details</h1>
    <br>
    <br>

    
       <table  >
         
          <tbody>
             <?php
          foreach ($reports as $report) {
          ?>
             <tr>
                <td>ATM Name :</td>
                <td> <?php echo $report["atmName"] ?></td>
              
             </tr>

             <tr>
                <td>Report Number :</td>
                <td> <?php echo $report["id"] ?></td>
              
             </tr>
             <tr>
                <td>Admin ID :</td>
                <td><?php echo $report["adminId"] ?></td>
              
             </tr>
             <tr>
                <td>Date of Report :</td>
                <td><?php echo $report["reportData"] ?></td>
              
             </tr>
             <tr>
                <td>Number of Withdraw :</td>
                <td><?php echo $report["numOfWithdraw"] ?></td>
              
             </tr>
             <tr>
                <td>Number of Deposit :</td>
                <td><?php echo $report["numOfTransfer"] ?></td>
              
             </tr>
             <tr>
                <td>Number of Transfer :</td>
                <td><?php echo $report["numOfDeposit"] ?></td>
              
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
    <div class="col-md-4"><a href="showreports.php" style="margin-top:70px ;margin-left:500px ;background-color:rgb(44, 62, 80);text-decoration:none" class="delete-btn">Back</a></div>
    <div class="text-center">
    <button style="background-color:rgb(44, 62, 80) ; color:white ;margin-top:0px" onclick="window.print();" class="btn btn-safe btn-lg " id="print-btn">Print</button>

      </div>

      


</body>
</html>