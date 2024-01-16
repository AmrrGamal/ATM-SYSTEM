<?php

require_once '../../Controllers/userController.php';
session_start();

if (!isset($_SESSION["userRole"])) {
   header("location:../Auth/pininput.php");
 } else {
   if ($_SESSION["userRole"]!="user") {
       
     header("location:../Auth/pininput.php ");
   }
 }

if(isset($_POST['submit'])){
   if (!empty($_POST['password']) && !empty($_POST['phone'])&& !empty($_POST['ssn'])){
       if(is_numeric($_POST['password'])&&is_numeric($_POST['phone'])&&is_numeric($_POST['ssn']))
    {   
        
         if ($_POST['password']== $_SESSION["userpassword"]&&$_POST['phone']==$_SESSION["userPhone"]&&$_POST['ssn']== $_SESSION["userSsn"] ){

            header("location:confirmWithdrawal.php");
         }else{
              
           
            $user=new UserController;
              if($user->updateUser())
              session_destroy(); 
              header("location:../Auth/pininput.php");
         }
         
        }else{

            $error[]= "Please enter numeric values";
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
   <title>Security Page</title>

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
   height: 460px;
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.2);
   background:white;    /* form backgroung*/
   text-align: center;
  
   width: 600px;
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
   padding:10px 15px;
   font-size: 17px;
   margin:10px 0;
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
   color:#f38619;
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
<h1 align="center">Securiy Page</h1>
<br>
<h2 align="center">This Page Appear because you behaviour in withdraw changed</h2>

<div class="form-container">

   <form style="margin-top:100px;margin-right:300px" action="" method="POST">
      <h3 style="color:#f38619" >Please Provide us with this Infomation </h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<div  style="font-size:20px" class="alert alert-danger" role="alert">'.$error.'</div>';
           
         };
         echo '<style>.form-container form{height: 500px;}</style>';
      };
      if(isset($success)){
        foreach($success as $success){
           echo '<div style="font-size:20px" class="alert alert-success" role="alert">'.$success.'</div>';
          
        };
        echo '<style>.form-container form{height: 500px;}</style>';
     };
      ?>
      <input id="ssn" type="text" name="ssn" placeholder="enter your ssn  ex: 654321"    maxlength="9">
      <input id="pass"  value ="" type="password" name="password" placeholder="enter your password ex: 543221" maxlength="4">
      <input id="phone" name="phone" type="phone" placeholder="enter your phone ex: 01027309792" maxlength="10">
      
      <br>
      <br>
      <br>
      <br>
      <input type="submit" name="submit" value="Enter" class="form-btn">
      
   </form>
   <script> 

const pinInput = document.querySelector("#ssn")
pinInput.addEventListener('input',(e)=>{
   e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
})

const phoneInput = document.querySelector("#phone")
phoneInput.addEventListener('input',(e)=>{
   e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
   
})

const passInput = document.querySelector("#pass")
passInput.addEventListener('input',(e)=>{
   e.target.value = e.target.value.replaceAll(/[^0-9]/g,'')
   
})
</script>

  <br>
  <br>
  
   
   

</div>

</body>
</html>