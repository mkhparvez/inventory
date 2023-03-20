  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BCDL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">  
          <a href="#" class="d-block"> <?php if (isset($_SESSION['mName'])) { echo $_SESSION['mName']; } ?></a>
          <a href="#" class="d-block"> Department : <?php if (isset($_SESSION['dept'])) { echo $_SESSION['dept']; } ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">Controls Area</li>

          <li class="nav-item">
            <a href="usercontrol.php" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Users List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Assets
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addproducts.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Asset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manageproduct.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Assets</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-shopping-cart"></i> -->
              <i class="nav-icon fas fa-random"></i>
              <p>
                Asset Transfer
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="asset_transfer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asset Transfer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="transfer_history.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asset Transfer History</p>
                </a>
              </li>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <!-- <i class="nav-icon fas fa-random"></i> -->
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="reports/inventory_report.php" target="_blank" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory Report</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="reports/asset_transfer.php" target="_blank" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transfer History Report</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="transfer_history.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asset Transfer History</p>
                </a>
              </li> -->
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Internet Connections
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addconnection.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Connection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="active_con.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Connections</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inactive_con.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Connections</p>
                </a>
              </li>
            </ul>
          </li>

 <!--          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sales.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="managepurchase.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Sales</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
 -->          
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>