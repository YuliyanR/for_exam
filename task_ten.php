<!DOCTYPE HTML>  
<html>
<head>
<style>
label {
display:block;
}
div {
margin-bottom:0.8em;
}
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php
$letterErr = "";
$letter = $random = "";
$allword = ['korab','arhiv','upotreba','ikonomika','amonyak','teniska','gram','vaprosnik','kolie'];
$random = strtoupper($allword[array_rand($allword)]);

for ($i = 0; $i < strlen($random); $i++) {
	
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["letter"])) {
    $letterErr = "Insert a letter";
  } else {
    $letter = test_input($_POST["letter"]);
    $letter = strtoupper($letter);
    if (!preg_match("/^[a-zA-Z]*$/" ,$letter)) {
      $letterErr = "Invalid a letter"; 
    }
    if (strlen($letter) != 1){
      $letterErr = "Only one letter";
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
	<h2>Besenica</h2>
<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<div>
		<label for="">Letter</label>
		<input type="text" name="letter" value="<?= $letter;?>">
		<span class="error">* <?= $letterErr;?></span>
	</div>
	<div>
		<button type="submit">Submit</button>  
	</div>
	<div>
		<button type="reset">Reset</button>  
	</div>
</form>
<?php
echo "<h2>Mach:</h2>";
echo $random;
echo "<br>";
?>
</body>
</html>