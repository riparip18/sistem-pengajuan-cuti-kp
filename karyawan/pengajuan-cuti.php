<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Pengajuan Cuti';
kicked("karyawan");

if (isset($_GET['idjc'])) {
  $cekdata = mysqli_query($conn, "SELECT * FROM tbl_jc where id_jc = '$_GET[idjc]'");
  $ada = mysqli_fetch_array($cekdata);
  //cek kolom pada tabel lebih dari 0 atau tidak
  if (mysqli_num_rows($cekdata) > 0) {
    $isi_jns_cuti = $ada['nm_jc'];
    $isi_jml_cuti = $ada['jml_jc'];

    if (isset($_POST["Simpan"])) {
      $_POST = tambahSlashKiriman($_POST);
      $query = mysqli_query($conn, "UPDATE `tbl_jc` SET `nm_jc`='$_POST[jns_cuti]', `jml_jc`='$_POST[jml_cuti]' WHERE `id_jc` = '$_GET[idjc]'");
      if ($query) {
        header("location:" . $df['host'] . "karyawan/riwayat-cuti.php");
      }
    }
  }
} else if (isset($_GET['didjc'])) {
  $query = mysqli_query($conn, "DELETE FROM `tbl_jc` WHERE `id_jc` = '$_GET[didjc]'");
  if (!$query) {
    echo "gratis";
  } else {
    header("location:" . $df['host'] . "karyawan/riwayat-cuti.php");
    exit();
  }
} else {
  $isi_jc = '';
  $isi_tmc = '';
  $isi_tac = '';
  $isi_ket = '';
  $isi_tp = date('Y-m-d');

  if (isset($_POST["Simpan"])) {
    $_POST = tambahSlashKiriman($_POST);
    $today = date("Y-m-d");
    $tgl_mulai = $_POST['tmc'];

    if ($tgl_mulai < $today) {
        echo '<script>alert("Tidak dapat mengajukan cuti untuk tanggal yang sudah lewat.");</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO `tbl_cuti` (`id_cuti`, `NIK`, `id_jc`, `tgl_pengajuan`, `tgl_mulai`, `tgl_selesai`, `ket`, `stt_cuti`) VALUES (NULL, '$_SESSION[NIK]', '$_POST[jc]', '$isi_tp', '$_POST[tmc]', '$_POST[tac]', '$_POST[ket]', 'proses')");
        if (!$query) {
            echo '<script>alert("Gagal menambahkan data.");</script>';
        } else {
            header("location:" . $df['host'] . "karyawan/riwayat-cuti.php");
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include $backurl . 'config/head.php'; ?>
</head>

<body>
  <!-- Start Page Loading -->

  <!-- End Page Loading -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START HEADER -->
  <?php include $backurl . 'karyawan/config/header.php'; ?>
  <!-- END HEADER -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
      <?php include $backurl . 'karyawan/config/sidebar.php'; ?>
      <!-- END LEFT SIDEBAR NAV-->
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START CONTENT -->
      <section id="content">
        <!-- breadcrumbs start -->
        <div id="breadcrumbs-wrapper">
          <!-- Search for small screen -->
          <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
          </div>
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">Pengajuan cuti</h5>
                <ol class="breadcrumbs">
                  <li><a href="<?= $df['host'] . 'karyawan/'; ?>">Dashboard</a></li>
                  <li class="active">Pengajuan cuti</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <!--start container-->
        <div class="container">
          <div class="row">
            <!-- Form with validation -->
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2">Form pengajuan cuti</h4>
                <div class="row">
                  <form method="POST" class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">local_library</i>
                        <select name="jc">
                          <option value="" disabled selected>Pilih jenis cuti</option>
                          <?php
                          $sql = mysqli_query($conn, "SELECT * FROM tbl_jc");
                          while ($Data = mysqli_fetch_array($sql)) { ?>
                            <option value="<?= $Data['id_jc']; ?>" <?php if ($isi_jc == $Data['id_jc']) {
                                                                      echo "selected";
                                                                    } ?>><?= $Data['nm_jc']; ?></option>
                          <?php } ?>
                        </select>
                        <label>Pilih jenis cuti</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">today</i>
                        <input id="tgl_mulai_cuti" type="text" name="tmc" class="datepicker" value="<?= $isi_tmc; ?>" required>
                        <label for="tgl_mulai_cuti">Tanggal Mulai Cuti</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">today</i>
                        <input id="tgl_selesai_cuti" type="text" name="tac" class="datepicker" value="<?= $isi_tac; ?>" required>
                        <label for="tgl_selesai_cuti">Tanggal Akhir Cuti</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">message</i>
                        <textarea id="ket-cuti" name="ket" class="materialize-textarea"><?= $isi_ket; ?></textarea>
                        <label for="ket-cuti">Keterangan</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn blue waves-effect waves-light right" type="submit" name="Simpan">Ajukan cuti
                          <i class="material-icons right">send</i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Form end -->
          </div>
          <!-- //////////////////////////////////////////////////////////////////////////// -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->
  </div>
  <!-- END MAIN -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START FOOTER -->
  <?php include_once($backurl . 'config/footer.php'); ?>
  <!-- END FOOTER -->
  <!-- ================================================
    Scripts
    ================================================ -->
  <!-- jQuery Library -->
  <script type="text/javascript" src="../assets/vendors/jquery-3.2.1.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="../assets/js/plugins.js"></script>
  <!--custom-script.js - Add your own theme custom JS-->
  <script type="text/javascript" src="../assets/js/custom-script.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var today = new Date(); // Get current date
        var options = {
            minDate: today, // Prevent past date selection
            format: 'yyyy-mm-dd'
        };
        var instances = M.Datepicker.init(elems, options);
    });

    <?php
    if (isset($_POST["Simpan"]) && $tgl_mulai < $today) {
        echo 'M.toast({html: "Tidak dapat mengajukan cuti untuk tanggal yang sudah lewat.", classes: "red darken-1"})';
    }
    ?>
  </script>
</body>

</html>