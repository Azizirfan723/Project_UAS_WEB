<?php
session_start();

include "../koneksi.php";
include "../lib/functions.php";

if ($_SESSION['jabatan'] != "admin") {
  header("Location: ../index.php?tampilan=produk-dikirim");
}

if (isset($_POST['ubah'])) {
  $id = $_POST['id'];
  $kode_barang = $_POST['kode'];
  $nama_barang = $_POST['nama'];
  $tanggal_selesai = $_POST['tanggal'];
  $id_akun = $_POST['id_akun'];
  $jumlah = $_POST['jumlah_barang'];

  $query = "UPDATE produk_dikirim
  SET kode_barang='$kode_barang',
  nama_barang='$nama_barang',
  tanggal_kirim='$tanggal_selesai',
  jumlah_barang=$jumlah,
  akun_id_user=$id_akun
  WHERE id=$id";
  
  $result = query($query);
  if (mysqli_affected_rows($koneksi)) {
    header("Location:../index.php?tampilan=produk-dikirim");
  } else {
    header("Location: ./update-produk-dikirim.php?id=$id");
  }
}


$id = (int) $_GET['id'];

if (!isset($id) || $id == 0) {
  header("Location: ../index.php?tampilan=produk-dikirim");
}

$query = "SELECT * FROM produk_dikirim WHERE id=$id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

$id_karyawan = (int) $data['akun_id_user'];

$query_akun = "SELECT id_user, nama FROM akun WHERE NOT jabatan='admin' AND NOT id_user=$id_karyawan";
$data_akun = getAll($query_akun);

$nama_karyawan = getAll("SELECT nama FROM akun WHERE id_user=$id_karyawan")[0]['nama'];

if (isset($_POST['ubah'])) {
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">PT Apple Keroak</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Update Produk Dikirim</h5>
                    <p class="text-center small">Masukkan Data</p>
                  </div>

                  <!-- Vertical Form -->
                  <form class="row g-3" method="POST" action="">
                    <input type="hidden" name='id' value="<?= $data['id']; ?>" />
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="examplekode" name="kode" placeholder="Kode Barang" value="<?= $data['kode_barang'] ?>">
                    </div>
                    <div class="col-12">
                      <label for="inputEmail4" class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="example" name="nama" placeholder="Nama Barang" value="<?= $data['nama_barang'] ?>">
                    </div>
                    <div class="col-12">
                      <label for="inputPassword4" class="form-label">Tanggal Dikirim</label>
                      <input type="date" class="form-control" id="inputTanggal" name="tanggal" placeholder="Tanggal Dikirim" value="<?= $data['tanggal_kirim']; ?>">
                    </div>
                    <div class="col-12">
                      <label for="inputEmail4" class="form-label">Jumlah Barang</label>
                      <input type="text" class="form-control" id="example" name="jumlah_barang" placeholder="Jumlah Barang" value="<?= $data['jumlah_barang']; ?>" />
                    </div>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Akun</label>
                      <select class="form-select form-select mb-3" aria-label=".form-select-lg example" name="id_akun">
                        <option>Pilih Karyawan</option>
                        <option value="<?= $data['akun_id_user'] ?>" selected><?= $nama_karyawan ?></option>
                        <?php foreach ($data_akun as $akun) : ?>
                          <option value="<?= $akun['id_user']; ?>"><?= $akun['nama'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="ubah" >Submit</button>
                      <a href="../index.php?tampilan=produk-dikirim" class="btn btn-warning">Kembali</a>
                    </div>
                  </form><!-- Vertical Form -->

                </div>
              </div>

              <div class="credits">
                Supported by <a href="https://github.com/yusrilarzaqi">Yusril Arzaqi</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/js/main.js"></script>

</body>

</html>
