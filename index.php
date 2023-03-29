<?php
session_start();

if (!isset($_SESSION['jabatan'])) {
  header("Location: login.php");
}

include "./lib/functions.php";

$data_hari_ini = get_data_hari_ini();
$data_bulan_ini = get_bulan_hari_ini();
$data_tahun_ini = get_tahun_hari_ini();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - PT Apple Keroak</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="boker/home.php" class="logo d-flex align-items-center">
        <img src="https://cdn.discordapp.com/attachments/985820015523692544/1044812420574617652/apelbaru.png" alt="">
        <span style=" color:black; " class="d-none d-lg-block">PT Apple Keroak</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ucfirst($_SESSION['nama']); ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo ucfirst($_SESSION['nama']); ?></h6>
              <span><?= $_SESSION['jabatan']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>

            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <?php if ($_SESSION['jabatan'] == "admin") : ?>
        <li class="nav-item">
          <a class="nav-link " href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>

          <ul id="tables-nav"  class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="index.php?tampilan=produk-selesai">
                <i class="bi bi-circle"></i><span>Produk Selesai</span>
              </a>
            </li>
            <li>
              <a href="index.php?tampilan=produk-dikirim">
                <i class="bi bi-circle"></i><span>Produk Dikirim</span>
              </a>
            </li>
            <li>
              <a href="index.php?tampilan=akun">
                <i class="bi bi-circle"></i><span>Akun</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->
        </li><!-- End Dashboard Nav -->
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?tampilan=produk-selesai">
            <i class="bi bi-grid"></i>
            <span >Produk Selesai</span>
          </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
          <a class="nav-link" href="index.php?tampilan=produk-dikirim">
            <i class="bi bi-grid"></i>
            <span >Produk Dikirim</span>
          </a>
        </li><!-- End Dashboard Nav -->
      <?php endif; ?>

    </ul>
  </aside><!-- End Sidebar-->

  <?php if (isset($_GET['tampilan']) && $_GET['tampilan'] != "") : ?>
    <?php if ($_GET['tampilan'] == "produk-selesai") : ?>
      <?php include "tampilan/produk-selesai.php"; ?>
    <?php endif; ?>
    <?php if ($_GET['tampilan'] == "produk-dikirim") : ?>
      <?php include "tampilan/produk-dikirim.php"; ?>
    <?php endif; ?>
    <?php if ($_SESSION['jabatan'] == 'admin' && $_GET['tampilan'] == "akun") : ?>
      <?php include "./tampilan/akun.php"; ?>
    <?php endif; ?>
  <?php elseif ($_SESSION['jabatan'] == 'admin') : ?>
    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="boker/home.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section dashboard">
        <div class="container">

          <div class="row">

            <div class="row">
              <h2>Produk Selesai</h2>

              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Hari Ini</h4>
                    <?php if (isset($data_hari_ini[0]['jumlah'])) : ?>
                      <?= $data_hari_ini[0]['jumlah'] ?>
                    <?php else : ?>
                      Kosong
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bulan Ini</h4>
                    <?php if (isset($data_bulan_ini[0]['jumlah'])) : ?>
                      <?= $data_bulan_ini[0]['jumlah'] ?>
                    <?php else : ?>
                      Kosong
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tahun Ini</h4>
                    <?php if (isset($data_tahun_ini[0]['jumlah'])) : ?>
                      <?= $data_tahun_ini[0]['jumlah'] ?>
                    <?php else : ?>
                      Kosong
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

            <h2>Produk Dikirim</h2>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Hari Ini</h4>
                  <?php if (isset($data_hari_ini[1]['jumlah'])) : ?>
                    <?= $data_hari_ini[1]['jumlah'] ?>
                  <?php else : ?>
                    Kosong
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bulan Ini</h4>
                  <?php if (isset($data_bulan_ini[1]['jumlah'])) : ?>
                    <?= $data_bulan_ini[1]['jumlah'] ?>
                  <?php else : ?>
                    Kosong
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tahun Ini</h4>
                  <?php if (isset($data_tahun_ini[1]['jumlah'])) : ?>
                    <?= $data_tahun_ini[1]['jumlah'] ?>
                  <?php else : ?>
                    Kosong
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>


        </div>
      </section>
    </main><!-- End #main -->
  <?php else : include "./tampilan/produk-dikirim.php"; ?>
  <?php endif; ?>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><a href="https://github.com/yusrilarzaqi" target="_blank">Yusril Arzaqi</a></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Button trigger modal -->


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="akun/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
