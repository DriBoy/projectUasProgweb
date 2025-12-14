<?php
include 'koneksi.php';

$id_jadwal = $_GET['id_jadwal'];

$query = "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'";
if (mysqli_query($con, $query)) {
    echo "Jadwal berhasil dihapus.";
    header("Location: jadwal.php"); // Redirect kembali ke jadwal.php
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>