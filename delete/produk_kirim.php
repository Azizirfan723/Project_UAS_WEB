<?php
session_start();
include "../lib/functions.php";

$id = (int) $_GET['id'];

if (!isset($_SESSION['jabatan']) || !isset($id) || $id == 0) {
  header("Location: ../index.php?tampilan=produk-dikirim");
}

$result = query("DELETE FROM produk_dikirim WHERE id=$id");
$check = mysqli_affected_rows($koneksi);

if ($check) {
  header("Location: ../index.php?tampilan=produk-dikirim");
}

