<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
}
include "../../Connection/connection.php";

if (isset($_GET['id_faktur'])) {
    $idAdminPusat="";

    $idFaktur = $_GET['id_faktur'];
    $idGudang = $_GET['id_gudang'];
    $username = $_SESSION['username'];
    date_default_timezone_set('Asia/Jakarta'); //MENGUBAH TIMEZONE
    $jamKonfirmasi = date('H:i:s');
    $qty =  $barangKeluar = $idBahanBaku = $sisaStok = 0;

    $selectAdminPusat = mysqli_query($mysqli, "SELECT ID_ADMIN_PUSAT FROM ADMIN_PUSAT WHERE USERNAME='$username'") or die("data salah qty: " . mysqli_error($mysqli));
    while ($show = mysqli_fetch_array($selectAdminPusat)) {
        $idAdminPusat = $show['ID_ADMIN_PUSAT'];
    }

    $selectQty = mysqli_query($mysqli, "SELECT QTY, ID_BAHAN_BAKU FROM FAKTUR WHERE ID_FAKTUR='$idFaktur'") or die("data salah qty: " . mysqli_error($mysqli));
    while ($show = mysqli_fetch_array($selectQty)) {
        $qty = $show['QTY'];
        $idBahanBaku = $show['ID_BAHAN_BAKU'];
    }

    $selectSisaStok = mysqli_query($mysqli, "SELECT SISA_STOK, BARANG_KELUAR FROM BAHAN_BAKU WHERE ID_BAHAN_BAKU='$idBahanBaku'") or die("data salah sisa stok: " . mysqli_error($mysqli));
    while ($show = mysqli_fetch_array($selectSisaStok)) {
        $sisaStok = $show['SISA_STOK'];
        $barangKeluar = $show['BARANG_KELUAR'];
    }

    $totalStok = $sisaStok - $qty;
    $totalBarangKeluar = $barangKeluar + $qty;

    $updateStok = mysqli_query($mysqli, "UPDATE BAHAN_BAKU SET SISA_STOK='$totalStok', BARANG_KELUAR='$totalBarangKeluar' WHERE id_bahan_baku='$idBahanBaku'") or die("data salah update stok: " . mysqli_error($mysqli));

    $confirm = mysqli_query($mysqli, "UPDATE FAKTUR SET STATUS='Diproses', ID_ADMIN_PUSAT='$idAdminPusat', JAM_KONFIRMASI='$jamKonfirmasi' WHERE ID_FAKTUR='$idFaktur'") or die("data salah confrim: " . mysqli_error($mysqli));
    
    if ($confirm) {
        header("Location: ../data-permintaan.php?id_gudang=$idGudang");
    }
}
