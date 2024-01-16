 <?php

require_once '../../Models/person.php';
require_once '../../Controllers/AuthController.php';


if(isset($_POST['submit'])){
  if(!empty($_POST['pin'])){
    if(is_numeric($_POST['pin'])){

    $person = new Person;
    $person->setPIN($_POST['pin']);

    $auth = new AuthController;
    if($auth->enter($person)){

       if($_SESSION["userStatus"]=='valid'){
      if($_SESSION["userRole"] == "admin" || $_SESSION["userRole"] == "user" || $_SESSION["userRole"] == "bankclerk"){
            
            header('location:Passwordinput.php');
      }
    }else{

      echo '<center><div  style="width:40%; background:#e69d5e; " class="alert alert-danger" role="alert">
      <center> <h4 style="font-weight:bold;font-size:25px">Your Account is Invalid</h4></center> </center>   </div>';
    header("refresh:3;");


    }



    }
    else{

      echo '<center><div  style="width:40%; background:#e69d5e; " class="alert alert-danger" role="alert">
    <center> <h4 style="font-weight:bold;font-size:25px">'.$errMsg = $_SESSION["errMsg"].'</h4></center> </center>   </div>';
  header("refresh:3;");

    }



  }else{
    
    echo '<center><div  style="width:40%; background:#e69d5e; " class="alert alert-danger" role="alert">
    <center> <h4 style="font-weight:bold;font-size:25px">'."Please Enter Valid PIN".'</h4></center> </center>   </div>';
    header("refresh:3;");

  }
  }
  else{
  echo '<center><div  style="width:40%; background:#e69d5e; " class="alert alert-danger" role="alert">
  <center> <h4 style="font-weight:bold;font-size:25px">'."Please Enter the PIN".'</h4></center> </center>   </div>';
  header("refresh:3;");

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
<link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>

<style>
.PINtext {
	font-size:40px;
	width: 500px;
	text-align: center;
}
.calcBtn {
	font-size: 30px;
	width: 100px;
  height: 100px;
  margin: 10px;
}
</style>

<body>

<h1 align="center">WELCOME TO BANK MASR</h1>

<div class="row">
	<h2 style="text-align: center;font-size:35px">Enter your 4 digits PIN number below:</h2>
</div>
 

<form method="post">


<p align="center"><input style="width:470px ;font-size:45px" name='pin' id="tbInput" readonly class="PINtext" type="password" placeholder="Enter PIN" maxlength="4"/></p>
<div id="VirtualKey" align="center">
    <input class="calcBtn" id="btn1" type="button" onclick="input(this);" value="1" />
    <input class="calcBtn" id="btn2" type="button" onclick="input(this);" value="2" />
    <input class="calcBtn" id="btn3" type="button" onclick="input(this);" 
    value="3"/>
    <br />
    <input class="calcBtn" id="btn4" type="button" onclick="input(this);" 
    value="4"/>
    <input class="calcBtn" id="btn5" type="button" onclick="input(this);" 
    value="5"/>
    <input class="calcBtn" id="btn6" type="button" onclick="input(this);" 
    value="6"/>
    <br />
    <input class="calcBtn" id="btn7" type="button" onclick="input(this);" 
    value="7"/>
    <input class="calcBtn" id="btn8" type="button" onclick="input(this);" 
    value="8"/>
    <input class="calcBtn" id="btn9" type="button" onclick="input(this);" 
    value="9"/>
    <br />    
    <input class="calcBtn" id="btn0" type="button" onclick="input(this)" 
    value="0"/>
    <input   class="calcBtn" id="btn0" type="button" onclick="input(this)" 
    value="#"/>
    <input class="calcBtn" id="btnDel" type="button" style="color:red" value="Delete" onclick="del();" />
    <br>
    <input style="width: 350px;color:red" class="calcBtn" type="submit" name="submit" value="Enter" class="form-btn">
</div>
</form>

<script>
function input(e) {
    var tbInput = document.getElementById("tbInput");
    if (tbInput.value.length<4){
    tbInput.value=tbInput.value + e.value;
	}
}

function del() {
	var tbInput = document.getElementById("tbInput");
	tbInput.value = tbInput.value.substr(0, tbInput.value.length-1);
}
function massege(){
swal({
  title: "Empty Field!",
  text: "please fill the field!",
  icon: "error",
  button: "OK",
});
}
</script>

</body>
</html>
