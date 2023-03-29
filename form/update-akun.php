<?php
session_start();
include "../koneksi.php";
include "../lib/functions.php";

if ($_SESSION['jabatan'] != 'admin') {
  header("Location:../index.php?tampilan=akun");
}

if (isset($_POST['ubah'])) {
  $id = (int) $_POST['id_user'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = "UPDATE akun
  SET nama='$nama',
  username='$username',
  password='$password'
  WHERE id_user=$id";
  /* var_dump($query);die; */

  $result = query($query);
  if (mysqli_affected_rows($koneksi)) {
    header("Location:../index.php?tampilan=produk-selesai");
  } else {
    header("Location: ./update-produk-selesai.php?id=$id");
  }
}

$id = (int) $_GET['id'];

if (!isset($id) || $id == 0) {
  header("Location:../index.php?tampilan=akun");
}

$result = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_user=$id");
$data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Update</title>
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
                    <h5 class="card-title text-center pb-0 fs-4">Update an Account</h5>
                    <p class="text-center small">Enter your personal details to update account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="update-akun.php" method="POST">
                    <input type="hidden" name='id_user' value="<?= $data['id_user']; ?>" />
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="nama" class="form-control" id="yourName" required value="<?= $data['nama'] ?>">
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required value="<?= $data['username'] ?>">
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" required value="<?= $data['password'] ?>">
                        <button type="button" id="eye" class="input-group-text"><i class="bi bi-eye-slash" id="eye-icon" aria-hidden="true"></i></button>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>

                    <div class="col-12 text-center">
                      <button class="btn btn-primary" type="submit" name="ubah">Update Account</button>
                      <a href="../index.php?tampilan=akun" class="btn btn-warning" type="submit" name="ubah">Kembali</a>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="../login.php">Login</a></p>
                    </div>
                  </form>

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
