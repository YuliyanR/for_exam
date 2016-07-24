<?= "GET Method"?>
<?='<br>'?>
<?php 
$string  = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] );
var_dump($string);
?>
<!DOCTYPE HTML>  
<html>
<head>
	<meta charset="UTF-8">
	<title>GET_POST</title>
<style>
label {
	display:block;
}
div {
	margin-bottom:0.8em;
}
.error {	
color: #FF0000;
}
table {
	border:2px solid black;
	width:50%;
{
</style>
</head>
<body>  
<?php
$usernameErr = $passwordErr = $repasswordErr = "";
$username = $name = $password = $repassword = $passmd5 = $repassmd5 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Insert a username";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z][0-9_a-zA-Z]*$/" ,$username)) {
      $usernameErr = "Invalid a username"; 
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Insert a password";
  } else {
    $password = test_input($_POST["password"]);
    if (strlen($password)< 6) {
      $passwordErr = "Short a password"; 
    }
  }
  if (empty($_POST["repassword"])) {
  	$repasswordErr = "Insert a password";
  } else {
  	$repassword = test_input($_POST["repassword"]);
  	if (strlen($repassword)< 6) {
  		$repasswordErr = "Short a password";
  	}
}
if ($password == $repassword && !empty($username)) {
	$name = $username;
	$passmd5= md5($password);
	$repassmd5 = md5($repassword);
}
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
	<h2>Login</h2>
		<p><span class="error">* required field.</span></p>
<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<div>
		<label for="">Username</label>
		<input type="text" name="username" value="<?= $username;?>">
		<span class="error">* <?= $usernameErr;?></span>
	</div>
	<div>
		<label for="">Password</label>
		<input type="password" name="password" value="<?= $password;?>">
		<span class="error">* <?= $passwordErr;?></span>
	</div>
	<div>
		<label for="">Repassword</label>
		<input type="password" name="repassword" value="<?= $repassword;?>">
		<span class="error">* <?= $repasswordErr;?></span>
	</div>
	<div>
		<button type="submit">Login</button>  
	</div>
</form>
<h2>POST Method</h2>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Value</th>
			<th>Type</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($_POST as $key => $value):?> 
			<tr>
				<td><?= $key ?></td>
				<td><?= $value?></td>
			</tr>
<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>