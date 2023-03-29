<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'uas_aple');

//cek koneksi
if (mysqli_connect_errno()) {
    echo 'Koneksi database gagal : ' . mysqli_connect_error();
    die();
}
