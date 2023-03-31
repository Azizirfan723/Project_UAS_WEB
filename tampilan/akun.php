<?php
include_once "lib/functions.php";
$result = mysqli_query($koneksi, "SELECT * FROM akun WHERE NOT jabatan='admin'");


$search = $_POST['search'];
if (isset($search)) {
  $result = mysqli_query($koneksi, "SELECT * FROM akun WHERE (username LIKE '%$search%' OR nama LIKE '%$search%') AND NOT jabatan='admin'");
}
?>
<style>
  .search-bar {
    min-width: 360px;
  }

  .search-form {
    width: 100%;
  }

  .search-form input {
    border: 0;
    font-size: 14px;
    color: #012970;
    border: 1px solid rgba(1, 41, 112, 0.2);
    padding: 7px 38px 7px 8px;
    border-radius: 3px;
    transition: 0.3s;
    width: 100%;
  }

  .search-form input:focus,
  .search-form input:hover {
    outline: none;
    box-shadow: 0 0 10px 0 rgba(1, 41, 112, 0.15);
    border: 1px solid rgba(1, 41, 112, 0.3);
  }

  .search-form button {
    border: 0;
    padding: 0;
    margin-left: -30px;
    background: none;
    color: #012970;
  }
</style>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Akun Karyawan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Produk Selesai</li>
      </ol>
    </nav>
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="index.php?tampilan=akun">
        <input type="text" name="search" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="card">
      <div class="card-body">
        <div class="card-header py-3" style="padding-left: 0;">
          <a href="./akun/register.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bx ri-download-fill"></i> Tambah Akun</a>
        </div>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php $index = 1; ?>
            <?php while ($data = mysqli_fetch_array($result)) : ?>
              <tr>
                <td><?= $data['id_user'] ?> </td>
                <td style="width: 50%"><?= $data['nama'] ?> </td>
                <td><?= $data['username'] ?> </td>
                <td><?= $data['jabatan'] ?> </td>
                <td>
                  <a href="form/update-akun.php?id=<?= $data['id_user'] ?>" class='d-none d-sm-inline-block btn btn-sm btn-success shadow-sm'>
                    Update
                  </a>
                  <a href="./delete/akun.php?id=<?= $data['id_user'] ?>" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm' onclick="return confirm('apakah data mau dihapus ?')">
                    Delete
                  </a>
                </td>
              </tr>
            <?php endwhile; ?>

          </tbody>
        </table>
        <!-- End Bordered Table -->
      </div>
    </div>
  </section>
</main><!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="modalDikirim" tabindex="-1" role="dialog" aria-labelledby="modalDikirimLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah mau Dikirim ?</h5>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
