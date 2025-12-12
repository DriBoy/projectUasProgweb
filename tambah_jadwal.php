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
    <?php
        $conn = new mysqli("localhost","root","","siamu");
    ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-5 shadow-lg" style="width: 450px;">
        <h5 class="bg-primary text-white text-center py-2 rounded">Tambah Jadwal Kuliah</h5>

    <div class="mb-3">
        <label class="form-label">Hari</label>
        <select name="hari" class="form-select">
            <option>Senin</option>
            <option>Selasa</option>
            <option>Rabu</option>
            <option>Kamis</option>
            <option>Jumat</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Waktu</label>
        <select name="waktu" class="form-select">
            <option>07.30-10.20</option>
            <option>10.30-13.20</option>
            <option>13.20-16.20</option>
            <option>16.30-19.20</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Mata Kuliah</label>
        <select name="mata_kuliah" class="form-select">
            <?php
                $result = $conn->query("SELECT * FROM mata_kuliah");
                while($r = $result->fetch_assoc()){
                    echo "<option value='{$r['kode_mk']}'>{$r['nama_mk']}</option>";
                }
            ?>
        </select>
    </div>

    <div class="d-flex gap-2 mt-4 justify-content-center align-items-center">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="#" class="btn btn-warning">Kembali</button>
    </div>
    </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>