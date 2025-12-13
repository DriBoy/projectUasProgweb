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
        $conn = new mysqli("localhost","root","","siamu");
    ?>
    <div class="d-flex justify-content-center align-items-center">
    <div class="card mb-4 p-4 bg-white shadow-sm" style="width: auto; border-radius: 15px;">
        <div class="card-header bg-white">
            <h3>Registrasi Semester Genap Tahun Ajaran 2025/2026</h3>
        </div>
        <div class="card-body bg-white">
            <table>
                <tr>
                    <th>NIM</th>
                    <td>: 72240673</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>: Stefanus Adrian Kurniawan</td>
                </tr>
                <tr>
                    <th>IPK</th>
                    <td>: 4.00</td>
                </tr>
            </table>
        </div>
    </div>
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
                $registrasi = $conn->query("SELECT * FROM view_registrasi_jadwal");
                while($brs = $registrasi->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$brs['hari']."</td>";
                    echo "<td>".$brs['waktu']."</td>";
                    echo "<td>".$brs['mata_kuliah']."</td>";
                    echo "<td>".$brs['sks']."</td>";
                    echo "<td>".$brs['ruang']."</td>";
                    echo "<td>".$brs['dosen']."</td>";
                    echo "<td><button class='btn btn-danger'>Hapus</button></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <div class="d-flex mt-2 justify-content-center align-items-center">
                <button class="btn btn-success">Tambah Jadwal</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        function goBack() {
            window.history.back('jadwal.php');
        }
    </script>
</body>
</html>