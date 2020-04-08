<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_GET['id_mitra'])) {
    header("Location: ../login.php");
}
include "../Connection/connection.php";

if (isset($_GET['id_mitra'])) {

    $idMitra = $_GET['id_mitra'];
    $status = $_GET['status'];

    $delete = mysqli_query($mysqli, "DELETE FROM FAKTUR WHERE ID_MITRA='$idMitra' AND STATUS = '$status'") or die("data salah: " . mysqli_error($mysqli));

    if ($delete) {
        header("Location: transaksi.php?id_mitra=$idMitra");
    }
}

