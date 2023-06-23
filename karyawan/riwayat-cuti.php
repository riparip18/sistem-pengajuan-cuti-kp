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
                  <h5 class="breadcrumbs-title">Riwayat Cuti</h5>
                  <ol class="breadcrumbs">
                    <li><a href="<?= $df['host'] . 'karyawan/'; ?>">Dashboard</a></li>
                    <li class="active">Riwayat Cuti</li>
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
                        <th data-field="nik">NIK</th>
                        <th data-field="nama">Nama lengkap</th>
                        <th data-field="tgl-pengajuan">Tanggal Pengajuan</th>
                        <th data-field="tgl-cuti">Mulai cuti</th>
                        <th data-field="Lama-cuti">Lama cuti</th>
                        <th data-field="jenis-cuti">Jenis cuti</th>
                        <th data-field="ket-cuti">Keterangan cuti</th>
                        <th data-field="Stat-cuti">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = mysqli_query($conn, "SELECT * FROM cuti WHERE NIK='$_SESSION[NIK]'");
                      while ($Data = mysqli_fetch_array($sql)) {
                        $status = '';
                        if ($Data['stt_cuti'] == 'terima') {
                          $status = 'green lighten-1';
                        } elseif ($Data['stt_cuti'] == 'tolak') {
                          $status = 'red darken-1';
                        } else {
                          $status = 'amber lighten-1';
                        }
                        ?>
                        <tr>
                          <td><?= $Data['NIK']; ?></td>
                          <td><?= $Data['nm_karyawan']; ?></td>
                          <td><?= $Data['tgl_pengajuan']; ?></td>
                          <td><?= $Data['tgl_mulai']; ?></td>
                          <td><?= $Data['lama_cuti']; ?></td>
                          <td><?= $Data['nm_jc']; ?></td>
                          <td><?= $Data['ket']; ?></td>
                          <td>
                            <a class="waves-effect waves-light btn <?= $status; ?>">
                              <?php
                              if ($Data['stt_cuti'] == 'terima') {
                                echo 'Terima';
                              } elseif ($Data['stt_cuti'] == 'tolak') {
                                echo 'Tolak';
                              } else {
                                echo 'Proses';
                              }
                              ?>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
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
