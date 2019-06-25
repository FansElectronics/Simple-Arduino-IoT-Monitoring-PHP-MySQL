<?php
include 'config.php';
$update = $_GET['to'];
$val = 0;

if ($update == 'monitoring') {
    $value = $_GET['value'];
    $conn->query("UPDATE `monitoring` SET `value` = $value WHERE `id_device` = 1");
    $relay = $conn->query("SELECT * FROM relay WHERE id_relay = 1")->fetch_assoc();
    echo $relay['value'];
}
if ($update == 'relay') {
    $relay = $conn->query("SELECT * FROM relay WHERE id_relay = 1")->fetch_assoc();
    if ($relay['value'] == 0) {
        $val = 1;
    } else {
        $val = 0;
    }
    $conn->query("UPDATE `relay` SET `value` = $val WHERE `id_relay` = 1");
    header('Location: index.php');
}
