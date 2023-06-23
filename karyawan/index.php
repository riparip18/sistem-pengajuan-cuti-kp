<?php
require_once('../config/conn.php');
require_once('../config/function.php');
kicked("karyawan");

$stt_cuti_query = mysqli_query($conn, "SELECT COUNT(id_cuti) AS hasil FROM tbl_cuti WHERE NIK='$_SESSION[NIK]' AND stt_cuti='proses'");
$isi_stt_cuti = mysqli_fetch_array($stt_cuti_query)['hasil'];

$cuti_query = mysqli_query($conn, "SELECT COUNT(id_cuti) AS hasil FROM tbl_cuti WHERE NIK='$_SESSION[NIK]'");
$isi_cuti = mysqli_fetch_array($cuti_query)['hasil'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('../config/head.php'); ?>
</head>

<body>
  <!-- START HEADER -->
  <?php include('../karyawan/config/header.php'); ?>
  <!-- END HEADER -->

  <div id="main">
    <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
      <?php include('../karyawan/config/sidebar.php'); ?>
      <!-- END LEFT SIDEBAR NAV-->

      <section id="content">
        <div class="container">
          <div id="card-stats">
            <div class="row mt-1">
              <div class="col s12 m6">
                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">card_travel</i>
                      <p>Status Cuti</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0"><?= $isi_stt_cuti; ?></h5>
                      <p class="no-margin">Pengajuan</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col s12 m6">
                <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">people</i>
                      <p>Riwayat Cuti</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0"><?= $isi_cuti; ?></h5>
                      <p class="no-margin">Pengajuan</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <footer class="page-footer gradient-45deg-light-blue">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright ©
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> <a class="grey-text text-lighten-2" href="#" target="_blank">CV. Lima Utama</a> All rights reserved.</span>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script type="text/javascript" src="../assets/vendors/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
  <script type="text/javascript" src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script type="text/javascript" src="../assets/js/plugins.js"></script>
  <script type="text/javascript" src="../assets/js/custom-script.js"></script>
</body>

</html>
