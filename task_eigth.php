<?php 
$input = "";
$input = isset($_POST['input'])?($_POST['input']+1):0;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Task eigth</title>
<style>
input {
	display:none;
}
</style>
</head>
<body>
	<input type="text" name="input" value="<?= $input;?>">
</body>
</html>