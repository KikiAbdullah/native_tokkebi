<?php
include "../../Connection/connection.php";

if (isset($_POST['submit'])) {
    echo $idGudang = $_GET['id_gudang'];    
    echo $tanggal = $_POST['tanggal'];
    echo $idBahan = $_POST['id_bahan'];
    echo $jumlah = $_POST['jumlah'];    

    $queryInsert = mysqli_query($mysqli, "INSERT INTO `bahan_rusak`(`ID_BAHAN_BAKU`, `ID_GUDANG`, `TANGGAL`, `JUMLAH`) VALUES ('$idBahan','$idGudang','$tanggal','$jumlah')") or die("data salah: " . mysqli_error($mysqli));

    if ($queryInsert) {
        header("Location: ../bahan-rusak.php?id_gudang=$idGudang");
    }
}
