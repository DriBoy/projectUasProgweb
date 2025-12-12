<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.bootstrap5.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.bootstrap5.js"></script>

</head>
<body class="bg-light">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
        $conn = new mysqli("localhost","root","","siamu");
    ?>
    <h3 align="center" class="pt-4">Jadwal Kuliah Semester Gasal 2025/2026</h3>
    <div class="container pt-4 bg-white">
        <table border="1" align="center" style="border-collapse: collapse;" id="example" class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th></th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nama Ruang</th>
                    <th>Nama Dosen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        $jadwal = $conn->query("SELECT * FROM view_jadwal");
                        while($brs = $jadwal->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$brs['hari']."</td>";
                            echo "<td>".$brs['waktu']."</td>";
                            echo "<td>".$brs['nama_mk']."</td>";
                            echo "<td>".$brs['sks']."</td>";
                            echo "<td>".$brs['nama_ruang']."</td>";
                            echo "<td>".$brs['nama']."</td>";
                            echo "<td><a href='edit_jadwal.php?id_jadwal=".$brs['id_jadwal']."'>Edit</a> | <a href='hapus_jadwal.php?id_jadwal=".$brs['id_jadwal']."'>Hapus</a></td>";
                            echo "</tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>
    <div class="text-center pt-4">
        <button class="btn btn-primary" onclick="tambahJadwal()">Tambahkan Jadwal Kuliah</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
    <script>
        function tambahJadwal() {
            window.location.href = "tambah_jadwal.php";
        }
        new DataTable('#example');
    </script>
</body>
</html>