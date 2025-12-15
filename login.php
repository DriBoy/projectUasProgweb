<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card shadow" style="width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h4>Login Sistem</h4>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                <div class="text-center mt-3">
                    <small>Belum punya akun? <a href="#">Registrasi</a></small>
                </div>
            </form>
        </div>
    </div>
<?php
session_start();
include_once("koneksi.php");

if (isset($_POST['login'])) {
    $nim = $_POST['nim'];
    $password = md5($_POST['password']); 
    $hasil = $conn->query("SELECT m.nim, m.nama, r.no_reg FROM mahasiswa m 
                           JOIN registrasi r ON m.nim = r.nim
                           WHERE m.nim='$nim' AND m.password='$password'");
    if ($baris = $hasil->fetch_assoc()) {
        // SET SEMUA SESSION YANG DIPERLUKAN
        $_SESSION['nim']    = $baris['nim'];
        $_SESSION['nama']   = $baris['nama'];
        $_SESSION['no_reg'] = $baris['no_reg']; 
        header("Location: registrasi.php");
        exit;

    } else {
        echo "<script>alert('NIM atau Password salah!');</script>";
    }
}
?>


</body>
</html>