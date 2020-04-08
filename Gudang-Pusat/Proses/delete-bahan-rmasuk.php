<?php
include "../../Connection/connection.php";

if (isset($_GET['id_bahan_masuk'])) {

    echo $idBahanMasuk = $_GET['id_bahan_masuk'];
    echo $idGudang = $_GET['id_gudang'];

    $delete = mysqli_query($mysqli, "DELETE FROM `bahan_masuk` WHERE ID_BAHAN_MASUK=$idBahanMasuk") or die("data salah: " . mysqli_error($mysqli));

    if ($delete) {
        header("Location: ../bahan-masuk.php?id_gudang=$idGudang");
    }
}
