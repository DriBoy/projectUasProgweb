<?php
include 'koneksi.php';

$id_jadwal = $_GET['id_jadwal'];

$query = "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'";
// if (mysqli_query($con, $query)) {
//     echo "Jadwal berhasil dihapus.";
//     header("Location: jadwal.php"); // Redirect kembali ke jadwal.php
// } else {
//     echo "Error: " . mysqli_error($con);
// }

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
    rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</body>
</html>
<script>
    Swal.fire({
    title: "Berhasil!",
    text: "Data Mahasiswa Berhasil Dihapus!",
    icon: "success",
    timer: 2000,
    }).then(() => {
        window.location.href = 'jadwal.php';
    });
</script>