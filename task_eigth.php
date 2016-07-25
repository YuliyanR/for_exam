if($_GET){
    $_SESSION["submit"] = 0;
}
if($_POST){
    $_SESSION["submit"] ++;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Regster</title>
<style>
label {
	display:block;
}
div {
	margin-bottom: 0.5em;
}
</style>
</head>
<body>
    <form class="form" method="post" action="">
        <div>
            <label for="">Submit</label>
            <input  name="submit" value=" <?=$_SESSION["submit"]?> times">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
