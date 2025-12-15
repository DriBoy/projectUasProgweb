<?php
session_start();
include_once("koneksi.php");
$id_krs = $_GET['id_krs'];
$SQL = "DELETE FROM krs WHERE id_krs='$id_krs'";
$result = mysqli_query($conn, $SQL);
// header("Location: registrasi.php");
// exit;
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
    <script>
        if(<?=$result?>) {
            Swal.fire({
            title: "Berhasil!",
            text: "Data KRS Berhasil Dihapus!",
            icon: "success",
            timer: 2000,
            }).then(() => {
                window.location.href = 'registrasi.php';
            });
        } else {
            Swal.fire({
            title: "Gagal!",
            text: "Data KRS Gagal Dihapus!",
            icon: "error",
            timer: 2000,
            }).then(() => {
                window.location.href = 'registrasi.php';
            });
        }
    </script>
</body>
</html>
