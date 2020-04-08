<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_GET['id_mitra'])) {
    header("Location: login.php");
}
include "Connection/connection.php";

if (isset($_FILES['bukti_pembayaran'])) {
   $errors = array();
   $idMitra = $_POST['id_mitra'];
   $tanggal = $_POST['tanggal'];
   $file_name = $_FILES['bukti_pembayaran']['name'];
   $file_size = $_FILES['bukti_pembayaran']['size'];
   $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];
   $file_type = $_FILES['bukti_pembayaran']['type'];
   $file_ext = strtolower(end(explode('.', $_FILES['bukti_pembayaran']['name'])));

   $extensions = array("jpeg", "jpg", "png");

   if (in_array($file_ext, $extensions) === false) {
      $errors[] = "ekstensi tidak diperbolehkan, silahkan gunakan ekstensi JPEG atau PNG.";
   }

   if ($file_size > 2097152) {
      $errors[] = 'Ukuran maksimal foto adalah 2 MB';
   }

   if (empty($errors) == true) {
      move_uploaded_file($file_tmp, "img/Uploads/" . $file_name);
      //JAM_UPLAOD
      date_default_timezone_set('Asia/Jakarta'); //MENGUBAH TIMEZONE
      $time = date("H:i:s");
      $queryInsert = mysqli_query($mysqli, "UPDATE `faktur` SET `BUKTI_PEMBAYARAN`='$file_name',`JAM_UPLOAD`='$time',`STATUS`='Terkirim' WHERE `TANGGAL`='$tanggal'");



      header("Location: Gudang-Kota/riwayat-pemesanan.php?id_mitra=$idMitra");
   } else {
      print_r($errors);
   }
}
