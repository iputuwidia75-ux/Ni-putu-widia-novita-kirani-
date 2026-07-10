<?php
session_start();
require_once "koneksi.php";

if(!isset($_SESSION['login']))
{
    header("Location: login.php");
    exit;
}

$id = $_POST['id'];
$nama = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];

$query = mysqli_query($koneksi,
"UPDATE user SET
nama_lengkap='$nama',
username='$username',
password='$password',
status='$status'
WHERE id='$id'
");

if($query)
{
    header("Location: user.php");
    exit;
}
else
{
    echo "Update gagal!";
}
?>