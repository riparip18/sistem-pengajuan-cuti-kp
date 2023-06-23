<?php
$backurl = '../';
require_once($backurl . 'config/conn.php');
require_once($backurl . 'config/function.php');
$jh = 'Home';
kicked("atasan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include $backurl . 'config/head.php'; ?>
</head>

<body>
  <?php include $backurl . 'atasan/config/header.php'; ?>
  <div id="main">
    <div class="wrapper">
      <?php include $backurl . 'atasan/config/sidebar.php'; ?>
      <section id="content">
        <div id="breadcrumbs-wrapper">
          <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Cari data karyawan">
          </div>
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">Data Karyawan</h5>
                <ol class="breadcrumbs">
                  <li><a href="<?= $df['host'] . 'atasan/'; ?>">Dashboard</a></li>
                  <li class="active">Data Karyawan</li>
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
                      <th data-field="nik" data-order-by="asc">NIK</th>
                      <th data-field="nama">Nama</th>
                      <th data-field="dept">Department</th>
                      <th data-field="jab">Jabatan</th>
                      <th data-field="stat_karyawan">Status Karyawan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM v_karyawan WHERE id_dept='$_SESSION[departemen]' ORDER BY NIK ASC");
                    for ($i = 1; $Data = mysqli_fetch_array($sql); $i++) { ?>
                      <tr>
                        <td><?= $Data['NIK']; ?></td>
                        <td><?= $Data['nm_karyawan']; ?></td>
                        <td><?= $Data['nm_dpt']; ?></td>
                        <td><?= $Data['nm_jbt']; ?></td>
                        <td><?= $Data['status_karyawan']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
