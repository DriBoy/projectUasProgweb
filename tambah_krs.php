<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
        $conn = new mysqli("localhost","root","","siamu");
    ?>
    <div class="d-flex justify-content-center align-items-center">
    <div class="card shadow-lg" style="width: auto; border-radius: 15px;">
        <div class="card-header p-0 bg-primary">
            <h5 class="text-white text-center py-2 rounded">Daftar Mata Kuliah Yang Sudah Diambil</h5>
        </div>
        <div class="card-body">
            <!-- ✅ FORM -->
            <form  id="formKRS" action="simpan_krs.php" method="post">
            <table border="1" cellpadding="4" style="width: 100%;" class="table table-striped">
                <tr>
                    <th>Pilih</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Ruang</th>
                    <th>Dosen</th>
                </tr>
                <?php
                $registrasi = $conn->query("SELECT * FROM view_jadwal");
                while($brs = $registrasi->fetch_assoc()){
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="jadwal[]" value="'.$brs['id_jadwal'].'"></td>';
                    echo "<td>".$brs['hari']."</td>";
                    echo "<td>".$brs['waktu']."</td>";
                    echo "<td>".$brs['nama_mk']."</td>";
                    echo "<td>".$brs['sks']."</td>";
                    echo "<td>".$brs['nama_ruang']."</td>";
                    echo "<td>".$brs['nama']."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <div class="text-center pt-4">
                <button type="button" class="btn btn-success" onclick="konfirmasiSimpan()">Simpan KRS</button>
            </div>
            </form>    
            </div>
        </div>
    </div>
    </div>
   <script>
function konfirmasiSimpan() {
    Swal.fire({
        title: "Yakin ingin menyimpan KRS?",
        text: "Mata kuliah yang dipilih akan disimpan",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Ya, simpan!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
             document.getElementById("formKRS").submit();
        }
    });
}
</script>
</body>
</html>
