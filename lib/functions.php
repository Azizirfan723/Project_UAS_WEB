<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'uas_aple');

//cek koneksi
if (mysqli_connect_errno()) {
  echo 'Koneksi database gagal : ' . mysqli_connect_error();
  die();
}

function query($query)
{
  global $koneksi;
  return mysqli_query($koneksi, $query);
}

function getAll($query)
{
  $result = query($query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function produk_dikirim($id)
{
  global $koneksi;
  $data = getAll("SELECT * FROM produk_selesai WHERE id='$id'")[0];

  $kode = $data['kode_barang'];
  $nama = $data['nama_barang'];
  $tanggal = date('Y-m-d');
  $jumlah = $data['jumlah_barang'];
  $akun_id = $data['akun_id_user'];

  query("INSERT INTO produk_dikirim VALUES(NULL, '$kode', '$nama', '$tanggal', '$jumlah', '$akun_id')");

  if (mysqli_affected_rows($koneksi)) {
    query("DELETE FROM produk_selesai WHERE id='$id'");
  }
}

function get_data_hari_ini()
{
  $hari_ini = date('Y-m-d');

  $produk_selesai = getAll("
SELECT
  SUM(`jumlah_barang`) as jumlah
FROM
  produk_selesai
WHERE
  (`produk_selesai`.`tanggal_selesai` = '$hari_ini')
")[0];

  $produk_keluar = getAll("
SELECT
  SUM(`jumlah_barang`) as jumlah
FROM
  produk_dikirim
WHERE
  `tanggal_kirim` = '$hari_ini'
")[0];

  return [$produk_selesai, $produk_keluar];
}

function get_bulan_hari_ini()
{
  $first_month = date("Y-m-1");
  $last_month = date("Y-m-t", strtotime(date('Y-m-d')));

  $produk_selesai = getAll("
SELECT
  SUM(`produk_selesai`.`jumlah_barang`) as jumlah
FROM
  produk_selesai
WHERE
  `produk_selesai`.`tanggal_selesai` >= '$first_month' AND `produk_selesai`.`tanggal_selesai` < '$last_month'
")[0];

  $produk_kirim = getAll("
SELECT
  SUM(`produk_dikirim`.`jumlah_barang`) as jumlah
FROM
  produk_dikirim
WHERE
  `produk_dikirim`.`tanggal_kirim` >= '$first_month' AND `produk_dikirim`.`tanggal_kirim` < '$last_month'
")[0];


  return [$produk_selesai, $produk_kirim];
}

function get_tahun_hari_ini()
{
  $first_year = date("Y-1-1");
  $last_year = date("Y-31-t");
  $produk_selesai = getAll("
SELECT
  SUM(`produk_selesai`.`jumlah_barang`) as jumlah
FROM
  produk_selesai
WHERE
  `produk_selesai`.`tanggal_selesai` >= '$first_year' AND `produk_selesai`.`tanggal_selesai` < '$last_year'
")[0];

  $produk_kirim = getAll("
SELECT
  SUM(`produk_dikirim`.`jumlah_barang`) as jumlah
FROM
  produk_dikirim
WHERE
  `produk_dikirim`.`tanggal_kirim` >= '$first_year' AND `produk_dikirim`.`tanggal_kirim` < '$last_year'
")[0];


  return [$produk_selesai, $produk_kirim];
}
