<?php

session_start();

require_once "koneksi.php";

if(!isset($_SESSION['login']))
{
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi,
"DELETE FROM user WHERE id='$id'");

if($query)
{
    header("Location: user.php");
    exit;
}
else
{
    echo "Data gagal dihapus!";
}

?>