<?php
session_start();
include_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Mata Kuliah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">
    <!-- LOGOUT -->
    <div class="container-fluid pt-3 px-4">
        <div class="d-flex justify-content-end">
            <a href="login.php" class="btn btn-danger">
                Logout
            </a>
        </div>
    </div>
    <!-- END LOGOUT -->

<div class="container mt-4">
<h3 class="text-center mb-4">Registrasi Semester Genap Tahun Ajaran 2025/2026</h3>
<?php
// Pastikan session_start() ada di paling atas file (baris 2)
$no_reg=$_SESSION['no_reg'];
$nim = $_SESSION['nim'];
$hasil = $conn->query(" SELECT m.nim, m.nama FROM registrasi r JOIN mahasiswa m ON r.nim = m.nim WHERE r.nim = '$nim'");
while($profil = $hasil->fetch_assoc()){
?>

<!-- CARD PROFIL -->
<div class="card shadow mb-4 mx-auto" style="max-width:500px;">
    <div class="card-header bg-primary text-white">Data Mahasiswa</div>
    <div class="card-body">
        <p><b>NIM</b> : <?= $profil['nim']; ?></p>
        <p><b>Nama</b> : <?= $profil['nama']; ?></p>
        <p><b>IPK</b> : 4.00</p>
    </div>
</div>

<?php } ?>

<!-- TABEL KRS -->
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <b>Daftar Mata Kuliah</b>
        <a href="tambah_krs.php" class="btn btn-success btn-sm">
            + Tambah Jadwal
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-primary">
                <tr>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Ruang</th>
                    <th>Dosen</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $data = $conn->query("SELECT j.hari,j.waktu,mk.nama_mk,mk.sks,rg.nama_ruang,d.nama,k.id_krs
                                  FROM registrasi reg
                                  JOIN krs k ON reg.no_reg = k.no_reg
                                  JOIN jadwal j ON k.id_jadwal = j.id_jadwal
                                  JOIN mata_kuliah mk ON j.kode_mk = mk.kode_mk
                                  JOIN dosen d ON j.nik = d.nik
                                  JOIN ruang rg ON j.kode_ruang = rg.kode_ruang
                                  WHERE reg.nim = '$nim'");
            while ($row = $data->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['hari']}</td>
                        <td>{$row['waktu']}</td>
                        <td>{$row['nama_mk']}</td>
                        <td>{$row['sks']}</td>
                        <td>{$row['nama_ruang']}</td>
                        <td>{$row['nama']}</td>
                        <td>
                          <button type='button' class='btn btn-danger' onclick=\"hapusKrs(event,'{$row['id_krs']}')\">Hapus</button>
                        </td>
                      </tr>";
            }
            ?>
            </tbody>
        </table>
        <script>
            function hapusKrs(event, id_krs) {
            event.preventDefault();
            Swal.fire({
                title: "Yakin ingin menghapus data ini?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "hapus_krs.php?id_krs=" + id_krs;
                }
            });
        }
        </script>
    </div>
</div>

</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
