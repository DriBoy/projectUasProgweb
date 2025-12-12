<?php
    $conn = new mysqli('localhost','root','','siamu');
    extract($_POST); //<-- $hari, $waktu, $matakuliah, $dosen dan $ruang
    $SQL = "INSERT INTO jadwal(hari, waktu, kode_mk, nik, kode_ruang) VALUES('$hari','$waktu','$mata_kuliah','$dosen','$ruang')";
    $conn->query($SQL);
    header("location:jadwal.php");
?>