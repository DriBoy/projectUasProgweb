<?php
require_once("koneksi.php");

// ambil id dari URL
$id_jadwal = $_GET['id_jadwal'];

// ambil data jadwal berdasarkan id
$sql = $conn->query("SELECT * FROM siamu_jadwal WHERE id_jadwal='$id_jadwal'");
$r = $sql->fetch_assoc();
extract($r); // membuat variabel otomatis: $hari, $waktu, $kode_mk, dll
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Edit Jadwal</title>
</head>
<body>

<form action="update_jadwal.php" method="post">
<table border="1">
<caption><b>FORM EDIT JADWAL KULIAH</b></caption>

<input type="hidden" name="id_jadwal" value="<?=$id_jadwal?>">
<!-- KODE MATA KULIAH (hidden) -->
<input type="hidden" name="kode_mk" value="<?= $kode_mk ?>">

<!-- NIK DOSEN (hidden) -->
<input type="hidden" name="nik" value="<?= $nik ?>">

<tr>
    <td>Hari</td>
    <td>
        <?php
        $hari_list = ['Senin','Selasa','Rabu','Kamis','Jumat'];
        foreach($hari_list as $h){
            $cek = ($hari == $h) ? "selected" : "";
            echo "<option $cek>$h</option>";
        }
        ?>
        <select name="hari">
            <?php
            foreach($hari_list as $h){
                $cek = ($hari == $h) ? "selected" : "";
                echo "<option $cek>$h</option>";
            }
            ?>
        </select>
    </td>
</tr>

<tr>
    <td>Waktu</td>
    <td>
        <select name="waktu">
        <?php
        $waktu_list = ['07.30-10.20','10.30-13.20','13.30-16.20','16.30-19.20'];
        foreach($waktu_list as $w){
            $cek = ($waktu == $w) ? "selected" : "";
            echo "<option $cek>$w</option>";
        }
        ?>
        </select>
    </td>
</tr>

<tr>
    <td>Mata Kuliah</td>
    <td>
        <select name="kode_mk">
        <?php
        $mk = $conn->query("SELECT * FROM siamu_mata_kuliah");
        while($m = $mk->fetch_assoc()){
            $cek = ($kode_mk == $m['kode_mk']) ? "selected" : "";
            echo "<option value='$m[kode_mk]' $cek>$m[nama_mk]</option>";
        }
        ?>
        </select>
    </td>
</tr>

<tr>
    <td>Dosen</td>
    <td>
        <select name="nik">
        <?php
        $dsn = $conn->query("SELECT * FROM dosen");
        while($d = $dsn->fetch_assoc()){
            $cek = ($nik == $d['nik']) ? "selected" : "";
            echo "<option value='$d[nik]' $cek>$d[nama]</option>";
        }
        ?>
        </select>
    </td>
</tr>

<tr>
    <td>Ruang</td>
    <td>
        <select name="kode_ruang">
        <?php
        $rg = $conn->query("SELECT * FROM siamu_ruang");
        while($r = $rg->fetch_assoc()){
            $cek = ($kode_ruang == $r['kode_ruang']) ? "selected" : "";
             }
            ?>
        </select>
    </td>
</tr>

<tr>
    <td colspan="2" align="center">
        <input type="submit" value="Simpan">
        <a href="jadwal.php">Kembali</a>
    </td>
</tr>
</table>
</form>

</body>
</html>
