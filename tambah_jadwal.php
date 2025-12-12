<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $conn = new mysqli("localhost","root","","siamu");
    ?>
    <form action="insert_jadwal.php" method="post">
        <table>
            <tr><th colspan="2"> Form Tambah Jadwal</th></tr>
            <tr><td>Hari</td><td>
                <select name="hari">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>owowowo
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <h5></h5>
                    <h3></h3>
                </select>
            </td></tr>
            <tr><td>Waktu</td><td>
            <select name="waktu">
                <option value="07.30-10.20">07.30-10.20</option>
                <option value="10.30-13.20">10.30-13.20</option>
                <option value="13.20-16.20">13.20-16.20</option>
                <option value="16.30-19.20">16.30-19.20</option>
            </select>
            </td></tr>
            <tr><td>Mata Kuliah</td><td>
                <select name="mata_kuliah">
                    <?php
                        $mata_kuliah = $conn->query("SELECT * FROM mata_kuliah");
                        while($brs = $mata_kuliah->fetch_assoc()){
                            echo "<option value='".$brs['kode_mk']."'>".$brs['nama_mk']."</option>";
                        }
                    ?>
                </select>
            </td></tr>
            <tr><td>Dosen</td><td>
                <select name="dosen">
                    <?php
                        $dosen = $conn->query("SELECT * FROM dosen");
                        while($brs = $dosen->fetch_assoc()){
                            echo "<option value='".$brs['nik']."'>".$brs['nama']."</option>";
                        }
                    ?>
                </select>
            </td></tr>
            <tr><td>Ruang</td><td>
                <select name="ruang">
                    <?php
                        $ruang = $conn->query("SELECT * FROM ruang");
                        while($brs = $ruang->fetch_assoc()){
                            echo "<option value='".$brs['kode_ruang']."'>".$brs['nama_ruang']."</option>";
                        }
                    ?>
                </select>
            </td></tr>
           <tr><th colspan="2"><input type="submit"><input type="reset"></th></tr>
        </table>
    </form>
</body>
</html>