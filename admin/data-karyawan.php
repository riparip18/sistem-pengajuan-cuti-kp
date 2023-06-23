<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Data Karyawan';
kicked("admin");

// Mengambil data karyawan dari database secara terurut berdasarkan NIK
$sql = mysqli_query($conn, "SELECT * FROM v_karyawan ORDER BY NIK ASC");
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
  <?php include $backurl . 'admin/config/header.php'; ?>
  <!-- END HEADER -->
  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
      <?php include $backurl . 'admin/config/sidebar.php'; ?>
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
                <h5 class="breadcrumbs-title">Data Karyawan</h5>
                <ol class="breadcrumbs">
                  <li><a href="<?= $df['host'] . 'admin/'; ?>">Dashboard</a></li>
                  <!-- <li><a href="#">Tables</a></li> -->
                  <li class="active">Data Karyawan</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <!--start container-->
        <div class="container">
          <!--Responsive Table-->
          <div class="divider"></div>
          <div id="responsive-table">
            <div class="row">
              <div class="col s12 mt-3">
                <!-- Modal Trigger -->
                <a class="waves-effect waves-light btn blue inline-flex" href="<?= $df['host'] . 'admin/form-karyawan.php'; ?>">Tambah
                  <i class="material-icons">add</i>
                </a>
              </div>
              <div class="col s12">
                <table class="responsive-table highlight centered">
                  <thead>
                    <tr>
                      <th data-field="nik" data-order-by="asc">NIK</th>
                      <th data-field="nama">Nama</th>
                      <th data-field="dept">Department</th>
                      <th data-field="jab">Jabatan</th>
                      <th data-field="stat_karyawan">Status Karyawan</th>
                      <!-- <th data-field="sisa_cuti">Sisa Cuti</th> -->
                      <th data-field="option">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    while ($Data = mysqli_fetch_array($sql)) { ?>
                      <tr>
                        <td><?= $Data['NIK']; ?></td>
                        <td><?= $Data['nm_karyawan']; ?></td>
                        <td><?= $Data['nm_jbt']; ?></td>
                        <td><?= $Data['nm_dpt']; ?></td>
                        <td><?= $Data['status_karyawan']; ?></td>
                        <!-- <td><?= $Data['nm_pk']; ?>8</td> -->
                        <td>
                          <a href="<?= $df['host'] . 'admin/form-karyawan.php?nik=' . $Data['NIK']; ?>" class="waves-effect waves-light btn green lighten-1">Edit</a>
                          <a href="<?= $df['host'] . 'admin/form-karyawan.php?dnik=' . $Data['NIK']; ?>" class="waves-effect waves-light btn amber darken-1">Hapus</a>
                        </td>
                      </tr>
                      <?php
                      $i++;
                    }
                    ?>
                  </tbody>
                </table>
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
