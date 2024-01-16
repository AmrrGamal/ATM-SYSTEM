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
require_once '../../Models/person.php';
require_once '../../Models/admin.php';
$BankClerkController = new BankClerkController;
if(isset($_POST['submit'])){
   if (!empty($_POST['pin']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['phone'])&& !empty($_POST['ssn'])&& !empty($_POST['name']))
    {
      

      $Admin = new Admin;
      $Admin->setRole("admin");
      $Admin->setPassword( $_POST['password']);
      $Admin->setPIN( $_POST['pin']);
      $Admin->setAddress( $_POST['address']);
      $Admin->setSsn( $_POST['ssn']);
      $Admin->setPhone( $_POST['phone']);
      $Admin->setName($_POST['name']);

      if(count($BankClerkController->checkAdminExist($_POST['pin'],$_POST['ssn']))==0){
      $BankClerkController->addAdmin($Admin);
         $success[]='Admin Added successfully';
             header("refresh:3;");

      } else {
         $error[] = "Admin is Already Exists";
         header("refresh:3;");
         }
      
      

      } else {
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
   <title>Add Admin</title>

   <!-- custom css file link  
   <link rel="stylesheet" href="css/style.css"> -->
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
   margin-top:-130px;
}

.form-container form{
   height: 610px;
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.2);
   background:white;    /* form backgroung*/
   text-align: center;
  
   width: 650px;
   margin: 10px;
}

.form-container form h3{
   font-size: 30px;
   margin-bottom: 10px;
   color:#f3f3f3;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:12px 15px;
   font-size: 18px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
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
   background: #eee;
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
<h1 align="center">Add Admin</h1>
<div class="form-container">

   <form action="" method="POST">
      <h2 style="color:rgb(44, 62, 80);margin-top:50px" ></h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<div  style="font-size:20px" class="alert alert-danger" role="alert">'.$error.'</div>';
           
         };
         echo '<style>.form-container form{height: 680px;}</style>';
      };
      if(isset($success)){
        foreach($success as $success){
           echo '<div style="font-size:20px" class="alert alert-success" role="alert">'.$success.'</div>';
          
        };
        echo '<style>.form-container form{height: 680px;}</style>';
     };
      ?>
      <input id="pin" type="text" name="pin"  placeholder="Enter the PIN number  ex: 0000" maxlength="4">
      <input id="pass"  value ="" type="password" name="password" placeholder="Enter the password  ex:654321" maxlength="4" minlength="4">
      <input id="name"  name="name"  placeholder="Enter the name  ex:Ahmed Ali" maxlength="20">
      <input  id="address" value='' name="address"  placeholder="Enter the address  ex : Hawamdia" maxlength="20"  >
      <input id="ssn" name="ssn" placeholder="Enter the ssn  ex:12332344432" maxlength="11" minlength="11">
      <input id="phone" name="phone" placeholder="Enter the phone  ex : 01027309792" minlength="10" maxlength="11">

      <br>
      <br>
      <input type="submit" style="background-color:rgb(44, 62, 80)"name="submit" value="Add Admin" class="form-btn">
      
   </form>
     <script> 

   const pinInput = document.querySelector("#pin")
   pinInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
   })

   const nameInput = document.querySelector("#name")
   nameInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^A-Za-z]/g,'')
      
   })
   
   const passInput = document.querySelector("#pass")
   passInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
      
   })

   const addressInput = document.querySelector("#address")
   addressInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^A-Za-z]/g,'')
      
   })
   const ssnInput = document.querySelector("#ssn")
   ssnInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
   })

   const phoneInput = document.querySelector("#phone")
   phoneInput.addEventListener('input',(e)=>{
      e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
   })
   
   
   </script>
  <br>
  <br>
  
   <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"><a href="bankclerkcontrol.php" style="margin-top:800px;border:none;background-color:rgb(44, 62, 80);" class="btn btn-danger btn-lg returnCardButton">Back</a></div>
    </div>
   

</div>

</body>
</html>