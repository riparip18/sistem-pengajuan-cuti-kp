<header id="header" class="page-topbar">
  <!-- start header nav-->
  <div class="navbar-fixed">
    <nav class="navbar-color gradient-45deg-light-white-indigo">
      <div class="nav-wrapper">
        <ul class="left">
          <li>
            <h1 class="logo-wrapper">
              <a href="<?= $df['host'] . 'karyawan/'; ?>" class="brand-logo darken-1">
                <img src="<?= $df['host'] . 'assets/images/logo/logo-panjang.png'; ?>" alt="materialize logo">
              </a>
            </h1>
          </li>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li>
            <a class="waves-effect waves-light profile-button dropdown-trigger" href="#" data-target="logout-dropdown">
              <span class="avatar-status avatar-online">
                <img src="../assets/images/avatar/avatar-7.png" alt="avatar">
                <i></i>
              </span>
            </a>
            <!-- Dropdown Structure -->
            <ul id="logout-dropdown" class="dropdown-content">
              <li><a href="<?= $df['host'] . 'logout.php'; ?>">Logout</a></li>
            </ul>
          </li>
          <li>
            <a href="<?= $df['host'] . 'logout.php'; ?>" class="waves-effect waves-light btn logout-button">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- end header nav-->
</header>
