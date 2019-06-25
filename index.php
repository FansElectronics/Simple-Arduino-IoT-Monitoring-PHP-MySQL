<?php
include 'config.php';
$mon = $conn->query("SELECT * FROM monitoring")->fetch_assoc();
$relay = $conn->query("SELECT * FROM relay WHERE id_relay = 1")->fetch_assoc();
if ($relay['value'] == 1) {
	$relay_status = 'ON';
} else {
	$relay_status = 'OFF';
}
$url = $_SERVER['REQUEST_URI'];
header("Refresh: 10; URL=$url");
?>

<!DOCTYPE html>
<html>

<head>
	<title>Simple Monitoring IoT</title>
</head>

<body>
	<center>
		<h1>Simple Monitoring IoT</h1>
		<br>
		<h3><?= $mon['device_name']; ?></h3>
		<h1><?= $mon['value']; ?></h1>
		<br>

		<form action="update.php" method="GET">

			<button type="submit" name="to" value="relay" style="width:100px">RELAY <?= $relay_status; ?></button>
		</form>
		<p>Created by <a href="http://www.fanselectronics.com" target="_blank" rel="dofollow">Fans Electronics</a></p>
	</center>

</body>

</html>