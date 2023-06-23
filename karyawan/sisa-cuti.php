<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
kicked("karyawan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include $backurl . 'config/head.php'; ?>
</head>

<body>
  <?php include $backurl . 'karyawan/config/header.php'; ?>

  <div id="main">
    <div class="wrapper">
      <?php include $backurl . 'karyawan/config/sidebar.php'; ?>

      <section id="content">
        <div class="container">
          <div id="breadcrumbs-wrapper">
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Sisa Cuti</h5>
                  <ol class="breadcrumbs">
                    <li><a href="<?= $df['host'] . 'karyawan/'; ?>">Dashboard</a></li>
                    <li class="active">Sisa Cuti</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="divider"></div>
            <div id="responsive-table">
              <div class="row">
                <div class="col s12">
                  <table class="responsive-table highlight centered">
                    <thead>
                      <tr>
                        <th data-field="no">No</th>
                        <th data-field="nama">Nama lengkap</th>
                        <th data-field="jenis-cuti">Jenis cuti</th>
                        <th data-field="tgl-pengajuan">Cuti Diambil</th>
                        <th data-field="tgl-pengajuan">Sisa cuti</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = mysqli_query($conn, "SELECT * FROM sisa_cuti  WHERE NIK='$_SESSION[NIK]'");
                      $i = 1;
                      while ($Data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $Data['nm_karyawan']; ?></td>
                          <td><?= $Data['nm_jc']; ?></td>
                          <td><?= $Data['lama_cuti']; ?></td>
                          <td><?= $Data['sisa_cuti']; ?></td>
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
          </div>
        </div>
      </section>
    </div>
  </div>

  <?php include_once($backurl . 'config/footer.php'); ?>

  <script type="text/javascript" src="../assets/vendors/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
  <script type="text/javascript" src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script type="text/javascript" src="../assets/js/plugins.js"></script>
  <script type="text/javascript" src="../assets/js/custom-script.js"></script>
</body>
</html>
