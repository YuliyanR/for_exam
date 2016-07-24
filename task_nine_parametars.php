<?php
	session_start();
	$fruits = !empty($_SESSION['fruits']) ? $_SESSION['fruits'] : [];
	$sortField = isset($_GET['sort_field']) ? $_GET['sort_field'] : 'name';
	if (!in_array($sortField, ['price', 'name'])) {
		$sortField = 'name';
	}
	
	foreach ($fruits as $k => $v) {
		$fruits[$k]['key'] = $k;
	}
	
	usort($fruits, function($a, $b) use ($sortField) {
		if ($a[$sortField] > $b[$sortField]) {
			return 1;
		}
		
		if ($a[$sortField] < $b[$sortField]) {
			return -1;
		}
		
		return 0;
	});
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Answer post</title>
	</head>
	<body>
		<a href="task_nine.php">Add New Fruit</a>
		<table border="1" width="100%">
			<thead>
				<tr>
					<th>#</th>
					<th><a href="?sort_field=name">Name</a></th>
					<th>Sort</th>
					<th>Qty price</th>
					<th>Qty</th>
					<th><a href="?sort_field=price">Price</a></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($fruits as $key => $fruit):?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><a href="task_nine.php?id=<?= $fruit['key'] ?>"><?= $fruit['name'] ?></a></td>
					<td><a href="task_nine.php?id=<?= $fruit['key'] ?>"><?= $fruit['sort'] ?></a></td>
					<td align="right"><a href="task_nine.php?id=<?= $fruit['key'] ?>"><?= $fruit['qty_price'] ?></a></td>
					<td align="right"><a href="task.nine.php?id=<?= $fruit['key'] ?>"><?= $fruit['qty'] ?></a></td>
					<td align="right">$<?= sprintf('%05.2f',$fruit['price']) ?></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</body>
</html>