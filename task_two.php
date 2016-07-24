<!DOCTYPE HTML>  
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
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
} else {
	echo "No mach password";
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
<?php
echo "<h2>Input:</h2>";
echo $name;
echo "<br>";
echo $passmd5;
echo "<br>";
echo $repassmd5;
?>
</body>
</html>