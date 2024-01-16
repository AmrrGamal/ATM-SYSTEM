<?php
require_once '../../Controllers/accountControllers.php';

if (!isset($_SESSION["userRole"])) {
    
	header("location:../Auth/pininput.php");
  } else {
	if (($_SESSION["userRole"]!='user')) {
		
	  header("location:../Auth/pininput.php ");
	}
	
  }





$AccountController = new AccountControllers;
if(isset($_POST['submit'])){
	if (!empty($_POST['depositAmount'])){
      if(is_numeric($_POST['depositAmount'])&&$_POST['depositAmount']>=1){
           $dataOfAccount= $AccountController->getBalance();
           $oldBalance=$dataOfAccount[0]["balance"];
	       $amountofdaposit=$_POST['depositAmount'];
	       $_SESSION['amonutOfDeposit'] = $amountofdaposit;
           header('location:depositConfirmation.php');
	    

	  }else{
		echo '<center><div  style="width:40%; background:#e69d5e; font:white ; font-size:90px" class="alert alert-danger" role="alert">
	<center> <h4 style="font-weight:bold;font-size:25px">Please enter valid Amount</h4></center> </center>
    </div>';
    header("refresh:3;");
	  }


	}else{

	echo '<center><div  style="width:40%; background:#e69d5e; font:white ; font-size:90px" class="alert alert-danger" role="alert">
	<center> <h4 style="font-weight:bold;font-size:25px">Please fill the field</h4></center> </center>
    </div>';
    header("refresh:3;");
   }	
	
	}



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styling.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/updateBalance.js"></script>
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

	
	<div class="row">
		<h2 style="text-align: center;font-size:50px">Enter The Amount below:</h2>
	</div>
	
	
	<form method="POST">	

<?php
    if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        };
    };
?>


	<p align="center"><input  name='depositAmount' id="tbInput" class="PINtext" readonly type="text" placeholder="Ex: 0000.00$" maxlength="7"/></p>
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
		value="."/>
		<input class="calcBtn" id="btnDel" type="button" style="color:red" value="Delete" onclick="del();" />
		<br>
		<input style="width: 350px;color:red" class="calcBtn" type="submit" name="submit" value="Enter" class="form-btn">
	</div>
	</form>
	<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"><a href="transactions.php" style="margin-right:200px" class="btn btn-danger btn-lg returnCardButton">Back</a></div>
    </div>
	<script>
	function input(e) {
		var tbInput = document.getElementById("tbInput");
		if (tbInput.value.length<10){
		tbInput.value=tbInput.value + e.value;
		}
	}
	
	function del() {
		var tbInput = document.getElementById("tbInput");
		tbInput.value = tbInput.value.substr(0, tbInput.value.length-1);
	}
	
	</script>
	</body>

</html>

