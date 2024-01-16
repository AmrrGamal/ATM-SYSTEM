
<?php
require_once '../../Controllers/accountControllers.php';
if(isset($_POST['back'])){
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



$account = new AccountControllers;
$result = $account->selectAllAccounts();

if(isset($_POST["selectAccount"])){
   $id=$_POST["accId"];
   $type=$_POST["accType"];
   $_SESSION["accId"]=$id;
   $_SESSION["accType"]=$type;
   header('location:transactions.php');
   
}
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
</head>

<body>

<div class="container">
<h2 style="text-align:center;font-size: 90px">Welcome <span style="color:#be4e0d"> <?php 

echo $_SESSION["userName"]; ?></span></h2>
    <div class="row">
        <h1 style="text-align: center">Select Account</h1>
    </div>

<?php
if($result){

foreach($result as $res){
?>

<div class="row">
    <form  method="POST">

        <input type="hidden" name="accId" value="<?php echo $res["accountId"];?>">
        <input type="hidden" name="accType" value="<?php echo $res["accountType"];?>">

        <div class="col-md-2"></div>
        <div class="col-md-8"> <button type="submit" name="selectAccount" class="btn btn-primary btn-lg accountButton">
        <?php echo $res["accountType"] .' : '. $res["accountId"]; ?> 
        </button> </div>
        <div class="col-md-2"></div>

    </form>
</div>  
    
<?php
}}
?>

    
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