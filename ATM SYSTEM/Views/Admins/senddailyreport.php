<?php
session_start();
if (!isset($_SESSION["userRole"])) {
    
   header("location:../Auth/pininput.php");
 } else {
   if ($_SESSION["userRole"] != "admin") {
       
     header("location:../Auth/pininput.php ");
   }
 }




require_once '../../Controllers/adminconrollers.php';
require_once '../../Controllers/transactionController.php';
require_once '../../Models/report.php';

$AdminController = new AdminController;
$TransactionController=new TransactionControllers;
if(isset($_POST['submit'])){
   if (!empty($_POST['deposit']) && !empty($_POST['atmName']) && !empty($_POST['reportDate']) && !empty($_POST['withdraw'])&& !empty($_POST['transfer'])&& !empty($_POST['adminId']))
    {
      
      $Report = new Report;
      $Report->setAdminId($_POST['adminId']);
      $Report->setNumOfWithdraw( $_POST['withdraw']);
      $Report->setNumOfTransfer( $_POST['transfer']);
      $Report->setNumOfDeposit( $_POST['deposit']);
      $Report->setReportDate( $_POST['reportDate']);
      $Report->setAtmName( $_POST['atmName']);
      $date = date('Y-m-d');
      if(count($AdminController->checkReportExist($date,$_SESSION["userId"]))==0){
         $AdminController->addReport($Report);
            $success[]='Report Added successfully';
                header("refresh:3;");
         

      }else {
         $error[] = " Report is Aready Exists";
         header("refresh:3;");
         }


      }else {
        $error[]= "Please fill all fields";
        header("refresh:3;");
      }

      }




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <title>Add Report</title>
   <style>


@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}
  

h3{

   color:#fff
}



.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   margin-left:300px;
   margin-top:-280px;
   
}

.form-container form{
   height: 700px;
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.2);
   background:white;    /* form backgroung*/
   text-align: center;
   width: 750px;
   margin-top: 170px;
   
   margin-left: 60px;
}

.form-container form h3{
   font-size: 30px;
   margin-bottom: 10px;
   color:#f3f3f3;
}

.form-container form input,
.form-container form select{
   width: 60%;
   padding:10px 15px;
   font-size: 17px;
   margin-right:40px;
   margin-top:22px;
   
   background: #eee;
   border-radius: 5px;
}
span{
margin-left:0px;
margin-right:10px;

}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #f38619;
   color:#fafafa;
   text-transform: capitalize;
   font-size: 22px;
   font-weight:bold;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: white;
   color:white;
   transform: 4s;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:crimson;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}

   </style>

</head>
<body>
<h1 style="text-align:center;font-size: 50px;">Daily Report for ATM </h1>
<h1 style="text-align:center;font-size: 50px;">Date : <?php echo date('d/m/Y');   ?></h1>
<br>
<br>
<h4 style="text-align:left;font-size: 50px;margin-left:50px">Number of Withdraws Today : <?php $data=$TransactionController->numberOfEachTransaction("Withdraw");
echo $data [0]["count(transactions.transactiontType)"];

?> </h4>
<br>
<br>
<h4 style="text-align:left;font-size: 50px;margin-left:50px">Number of Deposits Today : <?php $data= $TransactionController->numberOfEachTransaction("Deposit");
echo $data [0]["count(transactions.transactiontType)"];
?> </h4>
<br>
<br>
<h4 style="text-align:left;font-size: 50px;margin-left:50px">Number of Transfers Today : <?php $data= $TransactionController->numberOfEachTransaction("Transfer");
echo $data [0]["count(transactions.transactiontType)"];
?> </h4>


   
<div class="form-container">






   <form action="" method="post">
      <h2 style="color:rgb(44, 62, 80); font-size: 40px;" > ATM Report</h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<div  style="font-size:20px" class="alert alert-danger" role="alert">'.$error.'</div>';
           
         };
         echo '<style>.form-container form{height: 720px;}</style>';
      };
      if(isset($success)){
        foreach($success as $success){
           echo '<div style="font-size:20px" class="alert alert-success" role="alert">'.$success.'</div>';
          
        };
        echo '<style>.form-container form{height: 720px;}</style>';
     };
      
      ?>
      <span style="font-size:20px;font-weight:500; margin-right:60px" > The ATM Name : </span>
      <input id="name" maxlength="10"  value ="Giza ATM" type="text" name="atmName" readonly>
      <br>
      <span style="font-size:20px;font-weight:500; margin-right:75px" > The Admin ID : </span>
      <input id="id" value =<?php echo $_SESSION["userId"]; ?> type="text" name="adminId" readonly  >
      <br>
      <span style="font-size:20px;font-weight:500 ;margin-right:60px" > The Date Today : </span>

      <input id="date" value =<?php $date = date('Y-m-d'); echo $date;  ?>   name="reportDate" readonly>
      <br>

      <span style="font-size:20px;font-weight:500; " >Number of Withdraws :</span>
      <input    id="withdraw" maxlength="5"   type="text" name="withdraw"  placeholder="ex : 000 ">
      <br>
      <span style="font-size:20px;font-weight:500 ;margin-right:20px" >Number of  Transfers : </span>
      <input  id="transfer" maxlength="5"  type="text" name="transfer"  placeholder="ex :000">
      <br>
      <span style="font-size:20px;font-weight:500 ;margin-right:30px" >Number of  Deposits : </span>
      <input  id="deposit" maxlength="5"  value='' type="text" name="deposit"  placeholder="ex :000">
      <br>
      
      <br>
      <br>
      <br>
      
      <input  style="MARGIN-LEFT:85px;background-color:rgb(44, 62, 80) "type="submit" name="submit" value="Send Report" class="form-btn">
      
   </form>
   <script> 

   const depositInput = document.querySelector("#deposit")
   depositInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
   })

   const nameInput = document.querySelector("#name")
   nameInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^A-Za-z]/g,'')
      
   })
   
   const withdrawInput = document.querySelector("#withdraw")
   withdrawInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
      
   })

   const transferInput = document.querySelector("#transfer")
   transferInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
      
   })
   

   
   
   
   </script>
<br>
<br>
   <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"><a href="admincontrol.php" style="margin-top:1000px;border:none; background-color:rgb(44, 62, 80);" class="btn btn-danger btn-lg returnCardButton">Back</a></div>
    </div>
  
   

</div>

</body>
</html>