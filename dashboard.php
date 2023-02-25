  <?php 
    include "includes/header.php";
  ?>

  <!-- Preloader -->
    <?php 
    include "includes/loader.php";
    ?>

  <!-- Navbar -->
    <?php 
    include "includes/navbar.php";
    ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
     <?php 
      include "includes/mainsidebar.php";
    ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
      include "includes/headercontent.php";
    ?> 
    <!-- /.content-header -->


    <?php 
                      include "classes/products.php";
                      $product = new Product;
                      $obj = $product->ProductCount();
                      if($obj->num_rows > 0){
                        while($row = $obj->fetch_assoc()){

                         
                          
                         ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-computer"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Computer</span>
                <span class="info-box-number">

                  <?php echo $row["cpu"]; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-laptop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Laptop</span>
                <span class="info-box-number"><?php echo $row["laptop"]; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-display"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Monitor</span>
                <span class="info-box-number"><?php echo $row["monitor"]; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-print"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Printer</span>
                <span class="info-box-number"><?php echo $row["printer"]; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>



        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-computer-mouse"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mouse</span>
                <span class="info-box-number">
                  <?php echo $row["mouse"]; ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-keyboard"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Keyboard</span>
                <span class="info-box-number"><?php echo $row["keyboard"]; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-plug-circle-bolt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">UPS</span>
                <span class="info-box-number"><?php echo $row["ups"]; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-cash-register"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cash Drawer</span>
                <span class="info-box-number"><?php echo $row["cash_drawer"]; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-tv"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">POS Terminal</span>
                <span class="info-box-number">
                  <?php echo $row["pos"]; ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fa-regular fa-square-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Workable</span>
                <span class="info-box-number">
                  <?php echo $row["useable"]; ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-circle-exclamation"></i></span>

              <div class="info-box-content">
                <a style="color:#fff" href="reports/damaged.php">
                <span class="info-box-text">Damaged</span>
                <span class="info-box-number">
                  <?php echo $row["damaged"]; ?>
                  <small></small>
                </span>
              </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-screwdriver-wrench"></i></span>

              <div class="info-box-content">
                <a style="color:#fff" href="reports/repairable.php">
                <span class="info-box-text">Need to Repair</span>
                <span class="info-box-number">
                  <?php echo $row["repair"]; ?>
                  <small></small>
                </span>
                </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          <!-- /.col -->
        </div>
        <!-- /.row -->

            <?php  }
                      }
                      else{ ?>
                        <tbody>
                          <tr>
                            <td colspan="8" class="text-center">Data Not Found</td>
                          </tr>
                        </tbody>
                      <?php }
                    ?>



        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <!-- /.row -->
            <!-- TABLE: LATEST ORDERS -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    <?php 
      include "includes/footer.php";
    ?>
</div>
<!-- ./wrapper -->
<?php 
      include "includes/scripts.php";
    ?>
<!-- REQUIRED SCRIPTS -->

</body>
</html>
