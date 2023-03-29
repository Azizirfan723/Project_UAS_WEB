<?php
session_start();
include "../lib/functions.php";

$id = (int) $_GET['id'];

if (!isset($_SESSION['jabatan']) || !isset($id) || $id == 0) {
  header("Location: ../index.php?tampilan=akun");
}

$result = query("DELETE FROM akun WHERE id_user=$id");
$check = mysqli_affected_rows($koneksi);

if ($check) {
  echo "<script>alert('Data terlah terhapus')</script>";
  header("Location: ../index.php?tampilan=akun");
}

