<?php
session_start();
include_once("koneksi.php");
$id_krs = $_GET['id_krs'];
$conn->query("DELETE FROM krs WHERE id_krs='$id_krs'");
header("Location: registrasi.php");
exit;
?>

