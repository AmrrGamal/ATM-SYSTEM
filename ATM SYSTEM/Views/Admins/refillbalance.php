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
require_once '../../Models/atm.php';
$balance="ATM  Balance is :";
$AdminController = new AdminController;
$atm = $AdminController->getAtmData();
if(isset($_POST['submit'])){
 
   $oldBalance=$atm[0]["balance"] ;
   $atm=new ATM;
   $atm->setBalance($_POST["balance"]+ $oldBalance);
   $AdminController->refillBalance($atm);
   $atm = $AdminController->getAtmData();
   $balance="The New Balance is :";
   echo"<style>
   .sentance{
   color:green;
   }
   </style>";  

  
   }

 if (isset($_POST['start'])){
  
 

   echo '<center><div  style="width:40%; background:#e69d5e; " class="alert alert-danger" role="alert">
   <center> <h4 style="font-weight:bold;font-size:25px">ATM is Started</h4></center> </center>   </div>';
   header("refresh:3;");

 

 }  
 if (isset($_POST['end'])){
   echo '<center><div  style="width:40%; background:#e69d5e; " class="alert alert-danger" role="alert">
   <center> <h4 style="font-weight:bold;font-size:25px">ATM is Shutdown</h4></center> </center>   </div>';
   header("refresh:3;");

 
 }  
  
 




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refill Balance</title>

    <style> 
input
{
   width: 25%;
   padding:10px 15px;
   font-size: 30px;
  
   margin-top:90px;
   
   background: #eee;
   border-radius: 5px;
}


</style>
</head>
<body>
<?php

   ?>
<h1 style="text-align:center;font-size: 60px"> ATM Name is : <?php echo $atm[0]["name"] ?></h1>  
<h1 class="sentance" style="text-align:center;font-size: 60px"><?php  echo $balance.$atm[0]["balance"] ?></h1>  
<?php

?>




<form action="" method="post">
<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
     
      
      <span style="font-size:37px;font-weight:700;margin-left:680px;" > Balance : </span>
      <input  style="font-size:29px;font-weight:500;"  value ="100000" type="number" readonly name="balance" placeholder="enter the amount">

      <INPUT disbled id="enter" style="width: 130px;font-size:29px;font-weight:500;margin-top:100px;background-color:rgb(44, 62, 80);margin-right:300px;margin-left:990px;border:none" class="btn-success btn-lg; border:none"  readonly type="submit"  name="submit" VALUE="Enter"> 

      <br>
    </form>
   <div> <a href="admincontrol.php" style="font-size:29px;font-weight:500;margin-top:1800px;background-color:rgb(44, 62, 80);margin-left:900px ;margin-right:0px; margin-left:1700px;WIDTH:150px;text-decoration:none" class="btn-success btn-lg"  readonly> Back</a></div>



</body>
</html>