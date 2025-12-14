<?php
// Memuat file koneksi database
require_once("koneksi.php");

// Mengambil ID jadwal dari parameter URL GET
$id_jadwal = $_GET['id_jadwal'];

// Query untuk mengambil data jadwal berdasarkan ID
$sql = $con->query("SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'");
// Mengambil hasil query sebagai array asosiatif
$r = $sql->fetch_assoc();
// Mengekstrak array menjadi variabel otomatis (seperti $hari, $waktu, dll.)
extract($r);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Edit Jadwal</title>

    <!-- Bootstrap CSS untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <!-- Form untuk edit jadwal kuliah -->
        <form action="update_jadwal.php" method="post" class="bg-white p-4 rounded shadow">
            <h2 class="text-center mb-4">FORM EDIT JADWAL KULIAH</h2>

            <!-- Input hidden untuk ID jadwal -->
            <input type="hidden" name="id_jadwal" value="<?=$id_jadwal?>">
            <!-- Input hidden untuk kode mata kuliah (tidak ditampilkan, tapi dikirim) -->
            <input type="hidden" name="kode_mk" value="<?= $kode_mk ?>">
            <!-- Input hidden untuk NIK dosen -->
            <input type="hidden" name="nik" value="<?= $nik ?>">

            <!-- Field untuk memilih hari -->
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" id="hari" class="form-select">
                <?php
                // Array daftar hari
                $hari_list = ['Senin','Selasa','Rabu','Kamis','Jumat'];
                // Loop untuk membuat option, tandai yang selected
                foreach($hari_list as $h){
                    $cek = ($hari == $h) ? "selected" : "";
                    echo "<option $cek>$h</option>";
                }
                ?>
                </select>
            </div>

            <!-- Field untuk memilih waktu -->
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <select name="waktu" id="waktu" class="form-select">
                <?php
                // Array daftar waktu kuliah
                $waktu_list = ['07.30-10.20','10.30-13.20','13.30-16.20','16.30-19.20'];
                // Loop untuk membuat option
                foreach($waktu_list as $w){
                    $cek = ($waktu == $w) ? "selected" : "";
                    echo "<option $cek>$w</option>";
                }
                ?>
                </select>
            </div>

            <!-- Field untuk memilih mata kuliah -->
            <div class="mb-3">
                <label for="kode_mk_select" class="form-label">Mata Kuliah</label>
                <select name="kode_mk" id="kode_mk_select" class="form-select">
                <?php
                // Query untuk mengambil semua mata kuliah
                $mk = $con->query("SELECT * FROM mata_kuliah");
                // Loop untuk membuat option dari database
                while($m = $mk->fetch_assoc()){
                    $cek = ($kode_mk == $m['kode_mk']) ? "selected" : "";
                    echo "<option value='$m[kode_mk]' $cek>$m[nama_mk]</option>";
                }
                ?>
                </select>
            </div>

            <!-- Field untuk memilih dosen -->
            <div class="mb-3">
                <label for="nik_select" class="form-label">Dosen</label>
                <select name="nik" id="nik_select" class="form-select">
                <?php
                // Query untuk mengambil semua dosen
                $dsn = $con->query("SELECT * FROM dosen");
                // Loop untuk membuat option
                while($d = $dsn->fetch_assoc()){
                    $cek = ($nik == $d['nik']) ? "selected" : "";
                    echo "<option value='$d[nik]' $cek>$d[nama]</option>";
                }
                ?>
                </select>
            </div>

            <!-- Field untuk memilih ruang -->
            <div class="mb-3">
                <label for="kode_ruang_select" class="form-label">Ruang</label>
                <select name="kode_ruang" id="kode_ruang_select" class="form-select">
                <?php
                // Query untuk mengambil semua ruang
                $rg = $con->query("SELECT * FROM ruang");
                // Loop untuk membuat option
                while($r = $rg->fetch_assoc()){
                    $cek = ($kode_ruang == $r['kode_ruang']) ? "selected" : "";
                    echo "<option value='$r[kode_ruang]' $cek>$r[nama_ruang]</option>";
                }
                ?>
                </select>
            </div>

            <!-- Tombol submit dan kembali -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" onclick="simpanJadwal()">Simpan</button>
                <a href="jadwal.php" class="btn btn-secondary">Kembali</a>
            </div>
            <?php
            
            ?>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function simpanJadwal() {
            window.location.href = "update_jadwal.php";
        }
    </script>
</body>
</html>
