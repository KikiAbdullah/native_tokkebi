<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_GET['id_mitra'])) {
    header("Location: ../login.php");
}
include "../Connection/connection.php";

if (isset($_GET['id_mitra'])) {

    $idMitra = $_GET['id_mitra'];

    $queryKeranjang = mysqli_query($mysqli, "SELECT kr.*, bb.* FROM KERANJANG AS kr INNER JOIN BAHAN_BAKU AS bb ON kr.ID_BAHAN_BAKU = bb.ID_BAHAN_BAKU WHERE kr.ID_MITRA=$idMitra") or die("data salah: " . mysqli_error($mysqli));
    while ($show = mysqli_fetch_array($queryKeranjang)) {
        $idBahanBaku = $show['ID_BAHAN_BAKU'];
        $tanggal = $show['TANGGAL'];
        $harga = $show['HARGA_JUAL'];
        $qty = $show['QTY'];
        $total = $harga * $qty;
        //JAM_PESAN
        date_default_timezone_set('Asia/Jakarta'); //MENGUBAH TIMEZONE
        $time = date("H:i:s");

        $queryInsert = mysqli_query($mysqli, "INSERT INTO `faktur`(`ID_MITRA`, `ID_BAHAN_BAKU`, `QTY`, `TOTAL_HARGA`, `TANGGAL`, `JAM_PESAN`) VALUES ('$idMitra','$idBahanBaku','$qty','$total','$tanggal', '$time')")or die("data salah disini: " . mysqli_error($mysqli));
    }

    if ($queryInsert) {
        $delete = mysqli_query($mysqli, "DELETE FROM KERANJANG WHERE ID_MITRA='$idMitra'") or die("data salah: " . mysqli_error($mysqli));

        if ($delete) {
            header("Location: keranjang.php?id_mitra=$idMitra");
        }
    }
}
