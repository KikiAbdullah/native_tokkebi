<?php
$loginError = false;
if (isset($_GET['username'])) {
  include 'Connection/connection.php';
  session_start();

  $username = $_GET['username'];
  $password = $_GET['password'];
  $admin = $_GET['admin'];

  if ($admin == "pusat") {
    $data = mysqli_query($mysqli, "SELECT * FROM ADMIN_PUSAT WHERE USERNAME='$username' AND PASSWORD='$password'");

    if (mysqli_num_rows($data) > 0) {
      $_SESSION['username'] = $username;
      header("Location: Gudang-Pusat/bahan-baku.php?id_gudang=1");
    } else {
      $loginError = true;
    }
  }

  if ($admin == "mitra") {
    $data = mysqli_query($mysqli, "SELECT * FROM ADMIN_MITRA WHERE USERNAME='$username' AND PASSWORD='$password'");

    if (mysqli_num_rows($data) > 0) {
      $_SESSION['username'] = $username;
      while ($show = mysqli_fetch_array($data)) {
        $idMitra = $show['ID_MITRA'];
        header("Location: Gudang-Kota/pemesanan.php?id_mitra=$idMitra");
      }
    } else {
      $loginError = true;
    }
  }
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login | Tokkebi</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="css/main.css">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="css/morrisjs/morris.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
  <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
  <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="css/form/all-type-forms.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center m-b-md custom-login">

      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <center><img class="main-logo" src="img/logo/logo.png" alt="" /></center>
            <form action="#" id="loginForm">
              <div class="form-group">
                <?php
                if ($loginError == true) {
                ?>
                  <div class="alert alert-warning" role="alert">
                    <strong>Warning!</strong> Mohon periksa ulang username dan password.
                  </div>
                <?php
                }
                ?>
                <label class="control-label" for="username">Username</label>
                <input type="text" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                <span class="help-block small">Masukan Username</span>
              </div>
              <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                <span class="help-block small">Masukan password</span>
              </div>
              <div class="form-group">
                <label class="control-label" for="Admin">Admin</label>
                <select class="form-control custom-select-value" name="admin" id="admin">
                  <option value="">Pilih Admin</option>
                  <option value="mitra">Mitra</option>
                  <option value="pusat">Pusat</option>
                </select>
                <span class="help-block small">Masukan password</span>
              </div>

              <button class="btn btn-success btn-block loginbtn">Login</button>
              <a class="btn btn-default btn-block" href="#">Register</a>
            </form>
          </div>
        </div>
      </div>
      <div class="text-center login-footer">
        <p><a href="https://colorlib.com/wp/templates/">Tokkebi</a></p>
      </div>
    </div>
  </div>
  <!-- jquery
		============================================ -->
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- wow JS
		============================================ -->
  <script src="js/wow.min.js"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="js/jquery-price-slider.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="js/jquery.meanmenu.js"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- sticky JS
		============================================ -->
  <script src="js/jquery.sticky.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="js/jquery.scrollUp.min.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
  <!-- metisMenu JS
		============================================ -->
  <script src="js/metisMenu/metisMenu.min.js"></script>
  <script src="js/metisMenu/metisMenu-active.js"></script>
  <!-- tab JS
		============================================ -->
  <script src="js/tab.js"></script>
  <!-- icheck JS
		============================================ -->
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/icheck/icheck-active.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="js/plugins.js"></script>
  <!-- main JS
		============================================ -->
  <script src="js/main.js"></script>
  <!-- tawk chat JS
		============================================ -->
  <script src="js/tawk-chat.js"></script>
</body>

</html>