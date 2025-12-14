<?php
require_once("koneksi.php");

$id_jadwal  = $_POST['id_jadwal'];
$hari       = $_POST['hari'];
$waktu      = $_POST['waktu'];
$kode_ruang = $_POST['kode_ruang'];
$kode_mk    = $_POST['kode_mk']; 
$nik        = $_POST['nik'];     

$conn->query("UPDATE jadwal SET hari='$hari',waktu='$waktu',kode_ruang='$kode_ruang',kode_mk='$kode_mk',nik='$nik'WHERE id_jadwal='$id_jadwal'");
header("Location: jadwal.php");
?>

