<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
			<?php
			foreach($data as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
				echo "<br>";
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?=$data['checkSum'];?>">
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>