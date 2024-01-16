<?php

session_start();
if (!isset($_SESSION["userRole"])) {
  header("location:../Auth/pininput.php");
} else {
  if ($_SESSION["userRole"]!="user") {
      
    header("location:../Auth/pininput.php ");
  }
}




if(isset($_POST['submit']) && strlen($_POST['newPassword'])){
  if(!empty($_POST['newPassword'])){
    if($_POST['newPassword'] != $_SESSION['oldpassword']){
      $_SESSION['newPassword'] = $_POST['newPassword'];

      header('location:confirmChangePass2.php');

    }
    else{
      echo '<center><div  style="width:40%; background:#e69d5e; font:800px" class="alert alert-danger" role="alert">
    <center> <h4 style="font-weight:bold;font-size:25px">This the old one , please enter new Password number</h4></center> </center>
    </div>';

    header("refresh:2;");
    }

  }
  else{

    echo '<center><div  style="width:40%; background:#e69d5e; font:800px" class="alert alert-danger" role="alert">
    <center> <h4 style="font-weight:bold;font-size:25px">"Please Enter the New Password"</h4></center> </center>
  </div>';
    header("refresh:2;");

  }
}



?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
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
.backButton{
  position: absolute;
  right: 17%;
  top: 74%;
  height:80px;
  width:150px;
  border: 5px outset red;
  cursor:pointer;
  float: right;
  font-size: 32px;
  margin:10px;
}
.backButton:hover{
    background-color: red;
    color:white;
}
</style>

<body>
<div class="container">



  <div class="row">
    <h2 style="text-align: center;font-size:40px">Please enter your New Password: </h2>
  </div>
  <form method="post">
<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

  <p align="center"><input  id="newPIN" name="newPassword" class="PINtext" readonly type="text" placeholder="New Password" MINLENGTH="5"  /></p>

  <div id="keyboard" align="center">
      <input class="calcBtn" id="btn1" type="button" onclick="input(this);" value="1" />
      <input class="calcBtn" id="btn2" type="button" onclick="input(this);" value="2" />
      <input class="calcBtn" id="btn3" type="button" onclick="input(this);" value="3"/>
      <br />
      <input class="calcBtn" id="btn4" type="button" onclick="input(this);" value="4"/>
      <input class="calcBtn" id="btn5" type="button" onclick="input(this);" value="5"/>
      <input class="calcBtn" id="btn6" type="button" onclick="input(this);" value="6"/>
      <br />
      <input class="calcBtn" id="btn7" type="button" onclick="input(this);" value="7"/>
      <input class="calcBtn" id="btn8" type="button" onclick="input(this);" value="8"/>
      <input class="calcBtn" id="btn9" type="button" onclick="input(this);" value="9"/>
      <br />
      <input class="calcBtn" id="btnEnt" type="submit" name="submit"  style="color:green" value="Enter"/>
      <input class="calcBtn" id="btn0" type="button" onclick="input(this)" value="0"/>
      <input class="calcBtn" id="btnDel" type="button" style="color:red" value="Delete" onclick="del();" />
  </div>
    </form>


<a href="transactions.php"  class="btn btn-danger btn-lg returnCardButton">Back</a>


<script>
  function input(e) {
    var tbInput = document.getElementById("newPIN");
    if (tbInput.value.length<5){
    tbInput.value=tbInput.value + e.value;
	}
}

function del() {
	var newPIN = document.getElementById("newPIN");
	newPIN.value = newPIN.value.substr(0, newPIN.value.length-1);
}
</script>
</div>
</body>
</html>
