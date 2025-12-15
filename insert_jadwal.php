<?php
    $conn = new mysqli('localhost','root','','siamu');
    extract($_POST); //<-- $hari, $waktu, $matakuliah, $dosen dan $ruang
    $SQL = "INSERT INTO jadwal(hari, waktu, kode_mk, nik, kode_ruang) VALUES('$hari','$waktu','$mata_kuliah','$dosen','$ruang')";
    $result = mysqli_query($conn, $SQL);
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
            text: "Data Jadwal Berhasil Ditambahkan!",
            icon: "success",
            timer: 2000,
            }).then(() => {
                window.location.href = 'jadwal.php';
            });
        } else {
            Swal.fire({
            title: "Gagal!",
            text: "Data Jadwal Gagal Ditambahkan!",
            icon: "error",
            timer: 2000,
            }).then(() => {
                window.location.href = 'jadwal.php';
            });
        }
    </script>
</body>
</html>