<?php
include "../../Connection/connection.php";

if (isset($_GET['id_bahan_baku'])) {

    echo $idBahanBaku = $_GET['id_bahan_baku'];
    echo $idGudang = $_GET['id_gudang'];

    $delete = mysqli_query($mysqli, "DELETE FROM `bahan_baku` WHERE ID_BAHAN_BAKU=$idBahanBaku") or die("data salah: " . mysqli_error($mysqli));

    if ($delete) {
        header("Location: ../bahan-baku.php?id_gudang=$idGudang");
    }
}
