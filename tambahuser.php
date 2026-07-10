<?php

session_start();

require_once "koneksi.php";

if(!isset($_SESSION['login']))
{
    header("Location: login.php");
    exit;
}

$nama = $_POST['nama_lengkap'];

$username = $_POST['username'];

$password = $_POST['password'];

$status = $_POST['status'];

$query = mysqli_query($koneksi,

"INSERT INTO user
(nama_lengkap,username,password,status)

VALUES

('$nama','$username','$password','$status')

");

if($query)
{
    header("Location: user.php");
    exit;
}
else
{
    echo "Data gagal ditambah!";
}

?>