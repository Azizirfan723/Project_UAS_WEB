<?php
include "../lib/functions.php";

$id = $_GET['id'];

if (!isset($id) || $id == "") {
  header("Location: ../index.php?tampilan=produk-selesai");
}


produk_dikirim($id);
header("Location: ../index.php?tampilan=produk-dikirim");
