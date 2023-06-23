<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Home';
kicked("atasan");

$ada = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id_cuti) AS hasil FROM cuti WHERE id_dept='$_SESSION[departemen]'"));
$isi_cuti = $ada['hasil'];

$ada = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(NIK) AS hasil FROM v_karyawan WHERE id_dept='$_SESSION[departemen]'"));
$isi_departemen = $ada['hasil'];

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
  <?php include $backurl . 'atasan/config/header.php'; ?>
  <!-- END HEADER -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
      <?php include $backurl . 'atasan/config/sidebar.php'; ?>
      <!-- END LEFT SIDEBAR NAV-->
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START CONTENT -->
      <section id="content">
        <!--start container-->
        <div class="container">
          <!--card stats start-->
          <div id="card-stats">
            <div class="row mt-1">
              <div class="col s12 m6">
                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">card_travel</i>
                      <p>Cuti</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0"><?= $isi_cuti; ?></h5>
                      <p class="no-margin">Pengajuan</p>
                      <!-- <p>1,12,900</p> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col s12 m6">
                <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                  <div class="padding-4">
                    <div class="col s7 m7">
                      <i class="material-icons background-round mt-5">domain</i>
                      <p>Department</p>
                    </div>
                    <div class="col s5 m5 right-align">
                      <h5 class="mb-0"><?= $isi_departemen; ?></h5>
                      <p class="no-margin">Karyawan</p>
                      <!-- <p>3,42,230</p> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- //////////////////////////////////////////////////////////////////////////// -->
        </div>
        <!--end container-->
      </section>
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
</body>

</html>