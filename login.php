<?php
// menjalankan session
session_start();

// jika sudah login tidak bisa login lagi
if (isset($_SESSION['jabatan'])) {
  header("Location: index.php");
}

// include koneksi
include "database/koneksi.php";

// jika tombol login sudah ditekan
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = mysqli_query($koneksi, "SELECT * FROM akun WHERE
                    username='$username' AND
                    password='$password'");
  $cek = mysqli_num_rows($query);
  $data = mysqli_fetch_assoc($query);

  if (!$cek) {
    $err = "akun anda tidak valid";
  }

  header("Location: index.php");
  $_SESSION['id'] = $data['id_user'];
  $_SESSION['username'] = $username;
  $_SESSION['nama'] = $data['nama'];
  $_SESSION['jabatan'] = $data['jabatan'];
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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="boker/home.php" class="logo d-flex align-items-center w-auto">
                  <img src="https://cdn.discordapp.com/attachments/985820015523692544/1044812420574617652/apelbaru.png" alt="">
                  <span class="d-none d-lg-block">PT Apple Keroak</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="login.php" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" id="password" required>
                        <button type="button" id="eye" class="input-group-text"><i class="bi bi-eye-slash" id="eye-icon" aria-hidden="true"></i></button>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <?php if (isset($err)) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                          <?= $err; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login" value="Login">Login</button>
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
  <script>
    const eye = document.getElementById("eye");
    const eye_icon = document.getElementById("eye-icon");
    const password = document.getElementById("password");

    eye.addEventListener('click', () => {
      const check_type = password.getAttribute("type");
      if (check_type == "password") {
        password.setAttribute("type", "text");
        eye_icon.className = "bi bi-eye";
      } else {
        password.setAttribute("type", "password");
        eye_icon.className = "bi bi-eye-slash";
      }
    });
  </script>

</body>

</html>
