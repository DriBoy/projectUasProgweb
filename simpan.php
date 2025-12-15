<?php
session_start();
include_once("koneksi.php");

// 🔑 AMBIL no_reg DARI SESSION
if (!isset($_SESSION['no_reg'])) {
    die("Session no_reg tidak ditemukan. Silakan login ulang.");
}

$no_reg = $_SESSION['no_reg'];

if (!isset($_POST['jadwal'])) {
    header("Location: registrasi.php");
    exit;
}

$jadwal = $_POST['jadwal']; // array id_jadwal

foreach ($jadwal as $id_jadwal) {

    // Cegah data dobel
    $cek = $conn->query("
        SELECT 1 FROM krs 
        WHERE no_reg='$no_reg' AND id_jadwal='$id_jadwal'
    ");

    if ($cek->num_rows == 0) {
        $conn->query("
            INSERT INTO krs (no_reg, id_jadwal)
            VALUES ('$no_reg', '$id_jadwal')
        ");
    }
}

// 🔁 kembali ke halaman registrasi
header("Location: registrasi.php");
exit;
