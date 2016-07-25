<!DOCTYPE HTML>  
<html>
<head>
	<meta charset="UTF-8">
	<title>Array</title>
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
$arrayErr = "";
$string = "";
$new_array = [];
$explode = "";
$max = $min = $count = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["value"])) {
    $arrayErr = "Insert corect a values";
  } else {
    $string = test_input($_POST["value"]);  
    $explode = count(explode(',', $string));
    $count = count($explode);
    if ($explode != 10) {
    	$arrayErr = "Invalid input";
    } 
    for($j = 0; $j < strlen($string)-1; $j++) {
    	if ($string[$j] == ',' && $string[$j+1] == ',') {
    		$arrayErr = "Invalid input";
    	}
    }
    if (!preg_match("/^[0-9][0-9,]*$/" ,$string)) {
    $arrayErr = "Invalid a values"; 
   	 } 	 
  }
}
$new_array = split("\,", $string);
$new_array[] = asort($new_array);
$max = max($new_array);
$min = min($new_array);

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
	<h2>Actions with array</h2>
		<p><span class="error">* required field.</span></p>
<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<div>
		<label for="">Value (Insert 10 numbers this format (2,4,5...))</label>
		<input type="text" name="value" value="<?php for ($i = 0; $i < strlen($string); $i++) {
			echo $string[$i];}?>">
		<span class="error">* <?= $arrayErr;?></span>
	</div>
	<div>
		<button type="submit">Submit</button>  
	</div>
</form>
<?php
echo "<h2>Result:</h2>";
foreach ($new_array as $a) {
echo $a.'   ';
}
echo '<br>';
echo "Min = $min";
echo '<br>';
echo "Max = $max";
?>
</body>
</html>
