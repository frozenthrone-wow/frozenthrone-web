<?php
session_start();
include("../config/dbconf1.php");

$time = time();

$stmt = $conn->prepare("INSERT INTO shoutchat (ip, message, timestamp_unix) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $_SERVER['REMOTE_ADDR'], $_POST['chatmsg'], $time);
$stmt->execute();
echo $_POST['chatmsg'];
?>
