<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php    
session_start();
$conn = new mysqli('localhost','root','','siamu');

// Ambil data mahasiswa
$mhs = $conn->query("SELECT * FROM mahasiswa WHERE nim='$nim'");

// Ambil daftar matkul yang sudah diambil
$data = $conn->query("SELECT * FROM krs WHERE nim='$nim'");
?>
<h3 align="center">Registrasi Semester Genap Tahun Ajaran 2025/2026</h3>

<!-- Kartu informasi mahasiswa -->
<div style="width:40%; margin:auto; margin-bottom:20px; border:1px solid #000; padding:10px;">
    <p><strong>NIM</strong> : <?= $mhs['nim'] ?></p>
    <p><strong>Nama</strong> : <?= $mhs['nama'] ?></p>
    <p><strong>IPK</strong> : <?= $mhs['ipk'] ?></p>
</div>

    <div class="d-flex justify-content-center align-items-center">
    <div class="card shadow-lg" style="width: auto; border-radius: 15px;">
        <div class="card-header p-0 bg-primary">
            <h5 class="text-white text-center py-2 rounded">Daftar Mata Kuliah Yang Sudah Diambil</h5>
        </div>
        <div class="card-body">
            <table border="1" cellpadding="4" style="width: 100%;" class="table table-striped">
                <tr>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Ruang</th>
                    <th>Dosen</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $registrasi = $conn->query("SELECT * FROM view_jadwal");
                while($brs = $registrasi->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$brs['hari']."</td>";
                    echo "<td>".$brs['waktu']."</td>";
                    echo "<td>".$brs['nama_mk']."</td>";
                    echo "<td>".$brs['sks']."</td>";
                    echo "<td>".$brs['nama_ruang']."</td>";
                    echo "<td>".$brs['nama']."</td>";
                    echo "<td><button class='btn btn-danger'>Hapus</button></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <div class="d-flex mt-2 justify-content-center align-items-center">
                <button class="btn btn-success" onclick="tambahJadwal()">Tambah Jadwal</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        function tambahJadwal() {
            window.location.href = "tambah_krs.php";
        }
    </script>
</body>
</html>