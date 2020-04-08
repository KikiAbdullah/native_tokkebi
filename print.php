<?php
include "Connection/connection.php";

$tanggal = $_GET['tgl'];
$idMitra = $_GET['id_mitra'];
$idGudang = $_GET['id_gudang'];
$namaGudang = $namaMitra = null;
$query = mysqli_query($mysqli, "SELECT * FROM FAKTUR AS fk INNER JOIN MITRA AS m ON fk.ID_MITRA = m.ID_MITRA INNER JOIN GUDANG AS gd ON m.ID_GUDANG = gd.ID_GUDANG WHERE fk.ID_MITRA='$idMitra' AND fk.TANGGAL='$tanggal'") or die("data salah: 1" . mysqli_error($mysqli));
while ($show = mysqli_fetch_array($query)) {
  $namaMitra = $show['NAMA_MITRA'];
  $namaGudang = $show['NAMA_GUDANG'];
}
$data = mysqli_query($mysqli, "SELECT * FROM FAKTUR AS fk INNER JOIN BAHAN_BAKU AS bb ON fK.ID_BAHAN_BAKU = bb.ID_BAHAN_BAKU INNER JOIN MITRA AS m ON fk.ID_MITRA = m.ID_MITRA WHERE fk.ID_MITRA='$idMitra' AND fk.TANGGAL='$tanggal'") or die("data salah: 2" . mysqli_error($mysqli));

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>FAKTUR</title>
  <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>
  <div class="container-fluid" style="border: ridge">
    <div class="row">
      <div class="col-md-12">
        <p style="text-align: center"><b>FAKTUR</b></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <p><b>Tanggal : <?php echo $tanggal; ?></b></p>
      </div>
      <div class="col-md-4">
        <p><b><?php echo $namaGudang; ?> / <?php echo $namaMitra; ?> </b></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <br><br>
        <p>Perum. Griya Shanta Blok K No. 204 <br>
          Kec. Lowokwaru, Kota Malang <br>
          Telp : 085246359510 / 082232929202</p>
      </div>
      <div class="col-md-4">
        <img src="img/logo/logo.png" width="150px">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table" border="1">
          <thead>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Jumlah</th>
          </thead>
          <tbody>
            <?php
            $index = $totalHarga = 0;
            while ($show = mysqli_fetch_array($data)) {
              $index++;
              $total = $show['TOTAL_HARGA'];
              $totalHarga = $totalHarga + $total; ?>
              <tr>
                <td><?php echo $index; ?></td>
                <td><?php echo $show['NAMA_BAHAN']; ?></td>
                <td><?php echo $show['QTY']; ?> <?php echo $show['SATUAN']; ?></td>
                <td>Rp. <?php echo $show['HARGA_JUAL']; ?></td>
                <td>Rp. <?php echo $total; ?></td>
              </tr>
            <?php } ?>
            <tr>
              <td colspan="4"> <b>Total Harga</b></td>
              <td>Rp. <?php echo $totalHarga; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <p>Pembarayan dilakukan melalui: <br>
          BCA : 3151126420 a/n Kurnia Yuliastri <br>
          BRI : 624101008303533 a/n Kurnia Yuliastri <br>
          MANDIRI : 1440018078961 a/n Kurnia Yuliastri <br>
          BNI : 0192318217 a/n Yasir Sani</p>
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>

  <script>
    window.print();
  </script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>