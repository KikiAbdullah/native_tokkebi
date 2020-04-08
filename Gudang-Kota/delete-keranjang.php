<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_GET['id_mitra'])) {
    header("Location: ../login.php");
}
include "../Connection/connection.php";

if (isset($_GET['id_mitra'])) {

    $idKeranjang = $_GET['id_keranjang'];
    $idMitra = $_GET['id_mitra'];

    $delete = mysqli_query($mysqli, "DELETE FROM KERANJANG WHERE ID_KERANJANG='$idKeranjang'") or die("data salah: " . mysqli_error($mysqli));

    if ($delete) {
        header("Location: keranjang.php?id_mitra=$idMitra");
    }
}
