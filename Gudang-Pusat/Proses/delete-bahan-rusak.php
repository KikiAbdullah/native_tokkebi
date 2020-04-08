<?php
include "../../Connection/connection.php";

if (isset($_GET['id_bahan_rusak'])) {

    echo $idBahanRusak = $_GET['id_bahan_rusak'];
    echo $idGudang = $_GET['id_gudang'];

    $delete = mysqli_query($mysqli, "DELETE FROM `bahan_rusak` WHERE ID_BAHAN_RUSAK=$idBahanRusak") or die("data salah: " . mysqli_error($mysqli));

    if ($delete) {
        header("Location: ../bahan-rusak.php?id_gudang=$idGudang");
    }
}
