<?php
	include("header.inc.php");
	include_once("do_register.inc.php");
	if(isset($_POST['op']) && $_POST['op'] == true){
		//print_r($_POST);
		try{
			if(register($_POST)){
				header("Location:nice.php");
			}
		}	
		catch (Exception $e) {
			// unsuccessful login
			echo "<a>".$e->getMessage()."</a>";
			
		}
	}
	/*
	`uid` integer unsigned not null auto_increment,
	`username` varchar(45) not null unique default '',
	`password` varchar (45)  not null default '',
	`gender` char(1) not null default '0',
	`e-mail` varchar(255) ,
	`photo_id` integer unsigned not null default 0,
	`birth` date,
	`reg_time` date,
	`auth` char(1) not null default '0',
	`signature` text,
	*/
?>
<script type="text/javascript" src="md5.js" ></script>
<script type="text/javascript" >
	function check_email(email_adr){
		var email = email_adr;
		var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		if(pattern.test(email))
			return true;
		else
			return false;
	}
	function check_msg(){
		if(document.getElementById('firstpwd').value != document.getElementById('secondpwd').value){
			alert("The password you second input is different with the first one");
		}
		else if(document.getElementById('email').value == "")
			alert("Please input your email address");
		else if(!check_email(document.getElementById('email').value))
			alert("Please input correct email address");			
		else{
			document.getElementById('firstpwd').value = hex_md5(document.getElementById('firstpwd').value);
			document.getElementById('registerForm').submit();
		}

	}
	function createBirthForm(){
		var birthForm = '<select name="cars"><option value="volvo">Volvo</option><option value="saab">Saab</option><option value="fiat">Fiat</option><option value="audi">Audi</option></select>';
		document.getElementById("birthForm").innerHTML = birthForm;
	}
</script>	
	
<body onload = "createBirthForm()"></body>
<form name="register" action="register.php" method="post" id="registerForm" > <!---onsubmit="return check_msg();"-->
<table>
<tr>
	<td>Username: </td> 
	<td><input type="text" name="username" /></td>
</tr>
<tr>
	<td>Password: </td>
	<td><input id = "firstpwd" type="password" name="password" /></td>
</tr>
<tr>
	<td>Password again: </td>
	<td><input id = "secondpwd" type="password" /></td>
</tr>
<tr>
	<td>Gender: </td>
	<td><input type="radio" name="sex" value="1" /> Male<input type="radio" name="sex" value="2" /> Female</td>
</tr>
<tr>
	<td>Email: </td>
	<td><input type="text" name="email" id = "email" /></td>
</tr>
<tr>
	<td>Birth: </td>
	<td id = "birthForm" >dsfsd</td>
</tr>
<tr>
	<td>Signature: </td>
	<td><textarea rows="3" cols="30" />Please input your signature.</textarea></td>
</tr>
<tr>
	<td><input type="button" value = "Submit" onclick = "check_msg()"/></td>
</tr>
<input type="hidden" name="op" value="true">
<br />
</table>
</form>