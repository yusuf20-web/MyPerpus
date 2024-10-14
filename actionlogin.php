
<?php 
session_start();
include 'koneksi.php';
$email = $_POST['email'];
$password = sha1($_POST['password']);
//masukan email dan password yang sudah di buat di tabel phpmyadmin (jangan sampe salah)
//email : yusuf@gmail.com
//password: 12345678

$querylogin = mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'");

if (mysqli_num_rows($querylogin) > 0) {
    $rowUser = mysqli_fetch_assoc($querylogin);

if ($rowUser["password"] == $password) {
    $_SESSION["NAMA"] = $rowUser["nama"];
    $_SESSION["ID"] = $rowUser["id"];
    header("location:index.php?login=berhasil");
    }
    else 
    {header("location:login.php?error=login");}
}




?>
