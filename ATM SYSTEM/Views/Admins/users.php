
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
require_once '../../Models/person.php';
require_once '../../Models/user.php';

$AdminController = new AdminController;
$users = $AdminController->getAllUsers();
if (isset($_POST["delete"])) {
   if (!empty($_POST["userId"])) {
     if ($AdminController->deleteUser($_POST["userId"])) {
      $users = $AdminController->getAllUsers();
   }
   }
 }

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

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border: none;
   
}

*::-webkit-scrollbar{
   width: 10px;
   height: 5px;
}

*::-webkit-scrollbar-track{
   background-color: transparent;
}

*::-webkit-scrollbar-thumb{
   background-color: var(--blue);
}

.delete-btn{
   display: inline-block;
   padding:10px 30px;
   cursor: pointer;
   margin-right:40px;
   color:var(--white);
   border-radius: 5px;
   
   background-color:#0a4568 ;
   text-decoration: none;
   font-weight:500;
   font-size:17px;

}
.container .shopping-cart{
   padding:20px 0;
   
}

.container .shopping-cart table{
   width: 1100px;
   height:350px;
   text-align: center;
   border:var(--border);
   border-radius: 5px;
   box-shadow: var(--box-shadow);
   background-color: var(--white);
}

.container .shopping-cart table thead{
   background-color:#0a4568 ;
   
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
   padding:25px;
   color:var(--black);
}

.container .shopping-cart table tr td:nth-child(1){
   padding-left: 50px;
   
}
.container .shopping-cart table tr td:nth-child(3){
   padding-left: 50px;
   
}








</style>    
    

    <title>Users </title>
</head>
<body>
<div  class="container">  
    
    <div class="shopping-cart">
    
    <h1 style="text-align:center;font-size: 60px">All Users That Use ATM </h1>
    <br>
    <br>

    
       <table >
          <thead>
          <th>PIN Number</th>
             <th>User Name</th>
             <th>  </th>
             <th>User State</th>
             <th></th>
             <th>Delete User</th>
            
            
          </thead>
          <tbody>
             
          <?php

foreach ($users as $user) {
?>
  <tr>
                <td><?php echo $user["pin"] ?></td>
                <td> <?php echo $user["name"] ?></td>
                <td></td>
                <td><?php echo $user["userStatus"] ?></td>
                <td></td>
                <td>
                <form  method="POST">
                     <input type="hidden" name="userId" value="<?php echo $user["id"] ?>">
                     <button style="text-decoration:none" type="submit" name="delete"  class="delete-btn">
                     Delete
                     </button>
                     </form>
                     </td>
               </tr>
               <?php
               }
               ?>
       </tbody>

       </table>
    
    
    
    </div>
          
    </div>
    
    <div class="col-md-8"></div>
    <div class="col-md-8"></div>
    <div class="col-md-8"><a href="admincontrol.php" style="margin-top:120px ;border:none ;margin-right:290px;background-color:#0a4568" class="btn btn-danger btn-lg returnCardButton">Back</a></div>
    <div class="text-center">
      </div>


</body>
</html>