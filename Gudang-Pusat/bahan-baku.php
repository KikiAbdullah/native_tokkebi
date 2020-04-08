<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
}
include "../Connection/connection.php";

$username = $_SESSION['username'];
$queryAdmin = mysqli_query($mysqli, "SELECT * FROM ADMIN_PUSAT where username='$username'") or die("data salah: " . mysqli_error($mysqli));


$idGudang = $_GET['id_gudang'];
//mengambil data gudang
$queryGudang = mysqli_query($mysqli, "SELECT * FROM GUDANG");

$query = mysqli_query($mysqli, "SELECT * FROM BAHAN_BAKU where ID_GUDANG=$idGudang");

$queryNamaKota =  mysqli_query($mysqli, "SELECT * FROM GUDANG where ID_GUDANG=$idGudang");
while ($show = mysqli_fetch_array($queryNamaKota)) {
    $namaKota = $show['NAMA_GUDANG'];
}


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bahan Baku| Tokkebi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="../css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="../css/morris../js/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="../css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="../css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../css/calendar/fullcalendar.print.min.css">
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="../css/editor/select2.css">
    <link rel="stylesheet" href="../css/editor/datetimepicker.css">
    <link rel="stylesheet" href="../css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="../css/editor/x-editor-style.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../css/data-table/bootstrap-editable.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="../css/modals.css">
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="../img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="../img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <!-- Sidebar -->
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <?php while ($show = mysqli_fetch_array($queryGudang)) { ?>
                            <li>
                                <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="glyphicon glyphicon-book  icon-wrap"></span> <span class="mini-click-non"><?php echo $show['NAMA_GUDANG']; ?></span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="Bahan Masuk" href="bahan-masuk.php?id_gudang=<?php echo $show['ID_GUDANG']; ?>"><span class="mini-sub-pro">Bahan Masuk</span></a></li>
                                    <li><a title="Bahan Rusak" href="bahan-rusak.php?id_gudang=<?php echo $show['ID_GUDANG']; ?>"><span class="mini-sub-pro">Bahan Rusak</span></a></li>
                                    <li><a title="Bahan Baku" href="bahan-baku.php?id_gudang=<?php echo $show['ID_GUDANG']; ?>"><span class="mini-sub-pro">Bahan Baku</span></a></li>
                                    <li><a title="Data Permintaan" href="data-permintaan.php?id_gudang=<?php echo $show['ID_GUDANG']; ?>"><span class="mini-sub-pro">Data Permintaan</span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Sidebar -->
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">

                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="../img/product/pro4.jpg" alt="" />
                                                        <?php while ($show = mysqli_fetch_array($queryAdmin)) { ?>
                                                            <span class="admin-name"><?php echo $show['NAMA_ADMIN_PUSAT'] ?></span>
                                                        <?php } ?>

                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="profil-admin-pusat.php"><span class="edu-icon edu-user-rounded author-log-ic"></span>My
                                                                Profile</a>
                                                        </li>
                                                        <li><a href="../logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Log
                                                                Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Bahan <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="bahan-masuk.html">Bahan Masuk</a>
                                                </li>
                                                <li><a href="bahan-baku.html">Bahan Baku</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Bahan</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Bahan Baku</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Bahan <span class="table-project-n">Baku</span></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <a class="btn btn-sm btn-primary" href="add-bahan-baku.php?id_gudang=<?php echo $idGudang; ?>">Tambah Barang</a>
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">No</th>
                                                <th data-field="namaBahan">Nama Bahan</th>
                                                <th data-field="satuan">Satuan</th>
                                                <th data-field="harga">Harga</th>
                                                <th data-field="biayaTambahan">Biaya Tambahan</th>
                                                <th data-field="Margin">Margin</th>
                                                <th data-field="hargaJual">Harga Jual</th>
                                                <th data-field="stokAwal">Stok Awal</th>
                                                <th data-field="barangMasuk">Barang Masuk</th>
                                                <th data-field="barangRusak">Barang Rusak</th>
                                                <th data-field="barangKeluar">Barang Keluar</th>
                                                <th data-field="sisaStok">Sisa Stok</th>
                                                <th data-field="nilai">Nilai</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 0;
                                            while ($show = mysqli_fetch_array($query)) {
                                                $namaBahan = $show['NAMA_BAHAN'];
                                                $idBahanBaku = $show['ID_BAHAN_BAKU'];
                                                $index++; ?>
                                                <tr>
                                                    <td><?php echo $index; ?></td>
                                                    <td><?php echo $show['NAMA_BAHAN']; ?></td>
                                                    <td><?php echo $show['SATUAN']; ?></td>
                                                    <td><?php echo $show['HARGA']; ?></td>
                                                    <td><?php echo $show['BIAYA_TAMBAHAN']; ?></td>
                                                    <td><?php echo $show['MARGIN']; ?></td>
                                                    <td>Rp. <?php echo $show['HARGA_JUAL']; ?></td>
                                                    <td><?php echo $show['STOK_AWAL']; ?></td>
                                                    <td><?php echo $show['BARANG_MASUK']; ?></td>
                                                    <td><?php echo $show['BARANG_RUSAK']; ?></td>
                                                    <td><?php echo $show['BARANG_KELUAR']; ?></td>
                                                    <td><?php echo $show['SISA_STOK']; ?></td>
                                                    <td>Rp. <?php echo $show['NILAI']; ?></td>
                                                    <td><a class="btn btn-sm btn-primary" href="edit-bahan-baku.php?id_bahan_baku=<?php echo $idBahanBaku; ?>&id_gudang=<?php echo $show['ID_GUDANG']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a class="btn btn-sm btn-danger" href="Proses/delete-bahan-baku.php?id_bahan_baku=<?php echo $idBahanBaku; ?>&id_gudang=<?php echo $idGudang; ?>" onclick="return confirm(' Yakin Hapus <?php echo $namaBahan; ?>?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                <?php } ?>
                                                </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p><a href="https://colorlib.com/wp/templates/">Tokkebi</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="../js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="../js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="../js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="../js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="../js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="../js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="../js/metisMenu/metisMenu.min.js"></script>
    <script src="../js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="../js/data-table/bootstrap-table.js"></script>
    <script src="../js/data-table/tableExport.js"></script>
    <script src="../js/data-table/data-table-active.js"></script>
    <script src="../js/data-table/bootstrap-table-editable.js"></script>
    <script src="../js/data-table/bootstrap-editable.js"></script>
    <script src="../js/data-table/bootstrap-table-resizable.js"></script>
    <script src="../js/data-table/colResizable-1.5.source.js"></script>
    <script src="../js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="../js/editable/jquery.mockjax.js"></script>
    <script src="../js/editable/mock-active.js"></script>
    <script src="../js/editable/select2.js"></script>
    <script src="../js/editable/moment.min.js"></script>
    <script src="../js/editable/bootstrap-datetimepicker.js"></script>
    <script src="../js/editable/bootstrap-editable.js"></script>
    <script src="../js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="../js/chart/jquery.peity.min.js"></script>
    <script src="../js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="../js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="../js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="../js/main.js"></script>
</body>

</html>