<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan mysqli_query untuk mengecek login
    $query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($query);
        header("location:index.php");
        exit(); // Tambahkan exit setelah header
    } else {
        echo "<script>alert('Username atau Password Salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - UKK 2022</title>
    <style>
        body { font-family: 'Trebuchet MS'; background: #f3f4f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 300px; border-top: 5px solid #FA8072; }
        h2 { color: #FA8072; text-align: center; margin-bottom: 20px; }
        input { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #FA8072; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>LOGIN UKK 22</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">MASUK</button>
        </form>
    </div>
</body>
</html>