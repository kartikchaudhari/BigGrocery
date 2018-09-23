<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
<input type="text" name="uname"><br>
<input type="password" name="pass">
<br>
<button type="submit">Submit</button>
</form>
<hr>
<?php 
	if (isset($_POST)) {
		echo $_POST['uname']."<br>";
		echo $_POST['pass']."==>>".md5($_POST['pass']);
	}
?>
</body>
</html>