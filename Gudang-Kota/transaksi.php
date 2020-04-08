<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_GET['id_mitra'])) {
    header("Location: ../login.php");
}
include "../Connection/connection.php";
$idMitra = $_GET['id_mitra'];
$tanggal = $time = $status = null;

$username = $_SESSION['username'];
$queryAdmin = mysqli_query($mysqli, "SELECT * FROM ADMIN_MITRA where username='$username'") or die("data salah: " . mysqli_error($mysqli));


$queryTransaksi =  mysqli_query($mysqli, "SELECT DISTINCT TANGGAL as tgl, fk.ID_MITRA, fk.ID_FAKTUR, fk.JAM_PESAN, fk.STATUS FROM FAKTUR AS fk INNER JOIN BAHAN_BAKU AS bb ON fk.ID_BAHAN_BAKU = bb.ID_BAHAN_BAKU WHERE fk.ID_MITRA='$idMitra' AND fk.STATUS='Pembayaran' ORDER BY tgl DESC") or die("data salah: " . mysqli_error($mysqli));
//QUERY NAMA MITRA
$queryNamaMitra =  mysqli_query($mysqli, "SELECT * FROM MITRA where ID_MITRA='$idMitra'");
while ($show = mysqli_fetch_array($queryNamaMitra)) {
    $namaMitra = $show['NAMA_MITRA'];
}

//COUNTDOWN
date_default_timezone_set('Asia/Jakarta'); //MENGUBAH TIMEZONE

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Transaksi | Tokkebi</title>
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
    <link rel="stylesheet" href="../css/morrisjs/morris.css">
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
                <a href="pemesanan.php?id_mitra=<?php echo $idMitra; ?>"><img class="main-logo" src="../img/logo/logo.png" alt="" /></a>
                <strong><a href="pemesanan.php?id_mitra=<?php echo $idMitra; ?>"><img src="../img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <!-- Sidebar -->
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a class="" href="pemesanan.php?id_mitra=<?php echo $idMitra; ?>" aria-expanded="false"><span class="glyphicon glyphicon-th-list icon-wrap"></span> <span class="mini-click-non">Pemesanan</span></a>
                            <a class="" href="keranjang.php?id_mitra=<?php echo $idMitra; ?>" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart icon-wrap"></span> <span class="mini-click-non">Keranjang</span></a>
                            <a class="" href="riwayat-pemesanan.php?id_mitra=<?php echo $idMitra; ?>" aria-expanded="false"><span class="glyphicon glyphicon-time icon-wrap"></span> <span class="mini-click-non">Riwayat Pemesanan</span></a>
                            <a class="" href="transaksi.php?id_mitra=<?php echo $idMitra; ?>" aria-expanded="false"><span class="glyphicon glyphicon-time icon-wrap"></span> <span class="mini-click-non">Transaksi</span></a>
                        </li>
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
                                                            <span class="admin-name"><?php echo $show['NAMA_ADMIN_MITRA'] ?></span>
                                                        <?php } ?>

                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="profil-admin-mitra.php?id_mitra=<?php echo $idMitra; ?>"><span class="edu-icon edu-user-rounded author-log-ic"></span>My
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
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#"><?php echo $namaMitra; ?> <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="pemesanan.php?<?php echo "id_mitra=" . $idMitra; ?>">Pemesanan</a></li>
                                                <li><a href="keranjang.php?<?php echo "id_mitra=" . $idMitra; ?>">Keranjang</a></li>
                                                <li><a href="riwayat-pemesanan.php?<?php echo "id_mitra=" . $idMitra; ?>">Riwayat Pemesanan</a></li>
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
                                            <li><?php echo $namaMitra; ?> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Riwayat Pemesanan</span>
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
                                    <h1><span class="table-project-n">Transaksi</h1>

                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-search="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">No</th>
                                                <th data-field="tanggal">Tanggal</th>
                                                <th data-field="namaBahan">Nama Bahan</th>
                                                <th data-field="qty">Qty</th>
                                                <th data-field="satuan">Satuan</th>
                                                <th data-field="harga">Harga</th>
                                                <th data-field="jumlah">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 0;
                                            while ($show = mysqli_fetch_array($queryTransaksi)) {
                                                $tanggal = $show['tgl'];
                                                $idFaktur = $show['ID_FAKTUR'];
                                                $idMitra = $show['ID_MITRA'];
                                                $jamPesan = $show['JAM_PESAN'];
                                                //COUNTDOWN
                                                $timestamp = strtotime($jamPesan) + 60 * 60;
                                                $time = date('H:i', $timestamp);

                                                $query2 = mysqli_query($mysqli, "SELECT * FROM FAKTUR AS fk INNER JOIN BAHAN_BAKU AS bb ON fk.ID_BAHAN_BAKU = bb.ID_BAHAN_BAKU WHERE fk.ID_MITRA='$idMitra' AND fk.TANGGAL='$tanggal'") or die("data salah: " . mysqli_error($mysqli));
                                                $index++; ?>
                                                <tr>
                                                    <td><?php echo $index; ?></td>
                                                    <td><?php echo $tanggal; ?></td>
                                                    <?php while ($show = mysqli_fetch_array($query2)) {
                                                        $status = $show['STATUS'];
                                                    ?>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td><?php echo $show['NAMA_BAHAN']; ?></td>
                                                    <td><?php echo $show['QTY']; ?></td>
                                                    <td><?php echo $show['SATUAN']; ?></td>
                                                    <td>Rp. <?php echo $show['HARGA_JUAL']; ?></td>
                                                    <td>Rp. <?php echo $show['TOTAL_HARGA']; ?></td>
                                                </tr>

                                                <tr>
                                                <?php } ?>
                                                <tr>
                                                    <td></td>
                                                    <?php
                                                    if ($status == "Pembayaran") {
                                                    ?>
                                                        <td>
                                                            <form action="../upload.php" method="POST" enctype="multipart/form-data">
                                                                <?php if ($time != null) {
                                                                    // echo 'Batas Pembayaran:<p id="countdown"></p></span>';
                                                                } ?>
                                                                <p>Bukti Pembayaran : <input type="file" name="bukti_pembayaran" /></p>
                                                                <input type="hidden" name="id_mitra" value="<?php echo $idMitra; ?>" />
                                                                <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>" />
                                                                <br>
                                                                <input class="btn btn-primary" type="submit" />
                                                            </form>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td><a class="btn btn-primary" onclick="window.open('../print.php?<?php echo 'tgl=' . $tanggal . '&id_mitra=' . $idMitra . '&id_gudang=' . $idGudang; ?>')" href="#">Cetak Faktur</a></td>
                                                    <?php }

                                                    ?>

                                                </tr>
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

    <!-- <script>
        // Set the date we're counting down to
        var countDownDate = new Date("<?php //echo $tanggal . ' ' . $time; ?>").getTime();

        // 15:37:25
        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                window.location.replace("delete-faktur.php?id_mitra=<?php echo $idMitra; ?>&status=Pembayaran");
            }
        }, 1000);
    </script> -->

</body>

</html>