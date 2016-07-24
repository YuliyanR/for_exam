<!DOCTYPE HTML>  
<html>
<head>
	<meta charset="UTF-8">
	<title>Calculate</title>
<style>
label {
	display:block;
}
div {
	margin-bottom:0.8em;
}
h3 {
	color:green;
}
.error {	
	color: #FF0000;
}
</style>
</head>
<body>  
<?php
$aErr = $bErr = "";
$a = $b = $result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["a"])) {
    $aErr = "Insert a";
  } else {
    $a = test_input($_POST["a"]);
    if (!is_numeric($a)) {
      $aErr = "a must be a number"; 
    }
  }
  
  if (empty($_POST["b"])) {
    $bErr = "Insert b";
  } else {
    $b = test_input($_POST["b"]);
    if (!is_numeric($b)) {
      $bErr = "b must be a number"; 
    }
  }
}

if (!empty($a) && !empty($b) && is_numeric($a) && is_numeric($b) && isset($_POST['action'])) {
	if($_POST['action']=='*') {
	$result = $a * $b;
} else if($_POST['action']=='/') {
	$result = $a / $b;
} else if($_POST['action']=='+') {
	$result = $a + $b;
} else if($_POST['action']=='-') {
	$result = $a - $b;
} 
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
	<h2>Calculate</h2>
		<p><span class="error">* required field.</span></p>
<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<div>
		<label for="">a</label>
		<input type="text" name="a" value="<?= $a;?>">
		<span class="error">* <?= $aErr;?></span>
	</div>
	<div>
		<select name="action" multiple="multiple" >
			<option value="*">*</option>
			<option value="/">/</option>
			<option value="+">+</option>
			<option value="-">-</option>
		</select>
	</div>
	<div>
		<label for="">b</label>
		<input type="text" name="b" value="<?= $b;?>">
		<span class="error">* <?= $bErr;?></span>
	</div>
	<div>
		<button type="submit">Result</button>  
	</div>
</form>
<?php
echo "<h2>Input:</h2>";
echo $a;
echo "<br>";
echo $b;
echo "<br>";
echo "<h3>Result: $result</h3>";
echo "<br>";
?>
</body>
</html>