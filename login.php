<?php
session_start();
$conn = new mysqli('localhost','root','','siamu');


if (isset($_POST['login'])) {
    $nim = $_POST['nim'];
    $password = md5($_POST['password']); // Menggunakan MD5 sesuai dummy data
    // Cek data mahasiswa
    $hasil = $conn->query("SELECT * FROM mahasiswa WHERE nim='$nim' AND password='$password'");

    if ($baris = $hasil->fetch_assoc()) {
        $_SESSION['nim'] = $row['nim'];
        $_SESSION['nama'] = $row['nama'];
        header("Location:registrasi.php"); // Redirect ke halaman utama
    } else {
        echo "<script>alert('NIM atau Password salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg" style="width: 450px;">
        <div class="card-header bg-primary">
            <h5 class="text-center text-white py-1">Login Sistem</h5>
        </div>
        <div class="card-body">
            <label for="nim">NIM</label>
            <input type="text" class="form-control mb-4" id="nim" placeholder="Masukkan NIM Anda..." />
            <label for="password">Password</label>
            <input type="password" class="form-control mb-4" id="password" placeholder="Masukkan Password Anda..." />
            <button class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-2">Belum punya akun? <a href="#">Registrasi</a></p>
        </div>
    </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>