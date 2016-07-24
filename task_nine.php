<?php
session_start();
$data = [];
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (isset($_SESSION['fruits'][$id])) {
	$data =  $_SESSION['fruits'][$id];
}
$name = !empty($data['name']) ? $data['name'] : '';
$sort = !empty($data['sort']) ? $data['sort'] : '';
$qty_price = !empty($data['qty_price']) ? $data['qty_price'] : '';
$qty = !empty($data['qty']) ? $data['qty'] : '';
$price = !empty($data['price']) ? $data['price'] :'';

$errors = [];



if (!empty($_POST)) {
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$sort = isset($_POST['sort']) ? $_POST['sort'] : '';
	$qty_price = isset($_POST['qty_price']) ? $_POST['qty_price'] : '';
	$qty = isset($_POST['qty']) ? $_POST['qty'] : '';
	$price = isset($_POST['price']) ? $_POST['price'] : '';
	
	if (!$name) {
		$errors[] = 'Name is required';
	}
	if (!$sort) {
		$errors[] = 'Sort is required';
	}
	if (!preg_match('/^[0-9][0-9.]*$/', $qty_price)) {
		$errors[] = 'Qty price invalid format';
	}
	if (!is_numeric($qty)) {
		$errors[] = 'Qty must be a number';
	}
	if (!is_numeric($price)) {
		$errors[] = 'Price must be a number';
	}
	
	if (!$errors) {
		$result = [
			'name' => $name,
			'sort' => $sort,
			'qty_price' => $qty_price,
			'qty' => $qty,
			'price' => $price
		];
		
		if ($data) {
			$_SESSION['fruits'][$id] =$result; 
		} else {
			$_SESSION['fruits'][] =$result;
		}
		
		header('Location: task_nine_parametars.php');
		die;
	}
}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>POST Method</title>
		<style type="text/css">
			label {
				display: block;
				margin-top:0.5em;
			}
		</style>
	</head>
	<body>
		<?php foreach ($errors as $e):?>
		<p style="color:red;"><?= $e?></p>
		<?php endforeach;?>
		<form action="" method="post">
			<div>
				<label for="">Name</label>
				<input type="text" name="name" value="<?= $name?>"/>
			</div>
				<div>
				<label for="">Sort</label>
				<input type="text" name="sort" value="<?= $sort?>"/>
			</div>
			<div>
				<label for="">Qty price</label>
				<input type="text" name="qty_price" value="<?= $qty_price?>"/>
			</div>
			<div>
				<label for="">Qty</label>
				<input type="text" name="qty" value="<?= $qty?>"/>
			</div>
			<div>
				<label for="">Price</label>
				<input type="text" name="price" value="<?= $price?>"/>
			</div>
			<div>
				<button type="submit">Send Me</button>
			</div>
		</form>
	</body>
</html>
