<!DOCTYPE HTML>  
<html>
<head>
	<meta charset="UTF-8">
	<title>Six</title>
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
$nameErr = $familyErr = $birth_dateErr = "";
$name = $family = $birth_date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Insert a name";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z]*$/", $name)) {
      $aErr = "Incorect a name"; 
    }
  }
  
  if (empty($_POST["family"])) {
    $familyErr = "Insert a family name";
  } else {
    $family = test_input($_POST["family"]);
    if (!preg_match("/^[a-zA-Z]*$/", $family)) {
      $familyErr = "Incorect a family name"; 
    }
  }
  if (empty($_POST["birth_date"])) {
  	$birth_dateErr = "Not selected a date";
  } else {
  	$birth_date = test_input($_POST["birth_date"]);
  }
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
	<h2>Personal information</h2>
		<p><span class="error">* required field.</span></p>
<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<div>
		<label for="">Name</label>
		<input type="text" name="name" value="<?= $name;?>">
		<span class="error">* <?= $nameErr;?></span>
	</div>
	<div>
		<label for="">Family</label>
		<input type="text" name="family" value="<?= $family;?>">
		<span class="error">* <?= $familyErr;?></span>
	</div>
	<div>
		<label for="">Birth Date</label>
		<input type="date" name="birth_date" value="<?= $birth_dateErr;?>">
		<span class="error">* <?= $birth_dateErr;?></span>
	</div>
	<div>
		<button type="submit">Submit</button>  
	</div>
</form>
</body>
</html>