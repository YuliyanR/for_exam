<!DOCTYPE HTML>  
<html>
<head>
	<meta charset="UTF-8">
	<title>Convert</title>
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
$valueErr = "";
$value = $f = $c = $namef = $namec = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["value"])) {
    $valueErr = "Insert a value";
  } else {
    $value = test_input($_POST["value"]);
    if (!is_numeric($value)) {
      $valueErr = "Invalid a value"; 
    }
    $namef = 'Fahrenheit:';
    $f = $value * 1.8 + 32;
  }
  
  if (isset($_POST['action'])) {
    if ($_POST['action']=='C->F') {
    $namef = 'Fahrenheit:';
  	$f = $value * 1.8 + 32;
  } else if ($_POST['action']=='F->C') {
  	$namef = '';
  	$f = '';
  	$namec = 'Celsius:';
  	$c = ($value-32)/1.8;
  }
}
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
	<h2>Convert temperature</h2>
		<p><span class="error">* required field.</span></p>
<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<div>
		<label for="">Value (default C->F)</label>
		<input type="text" name="value" value="<?= $value;?>">
		<span class="error">* <?= $valueErr;?></span>
	</div>
	<div>
		<select name="action" multiple="multiple" >
			<option value="C->F">C->F</option>
			<option value="F->C">F->C</option>
		</select>
	</div>
	<div>
		<button type="submit">Convert</button>  
	</div>
</form>
<?php
echo "<h2>Result convert:</h2>";
echo $namef.' '.$f.''.$namec.' '.$c;
?>
</body>
</html>