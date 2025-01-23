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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Device</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Ping Monitor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->





    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">

            <!-- my Content -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Device</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">

              <?php 
              include 'classes/ping.php';
              $ping = new Ping;
              if (isset($_POST['submit'])) {
               echo $ping->addNewDevice($_POST);
              }
               ?>

                 
                  <div class="form-group device_name">
                    <label for="device_name">Display Name</label>
                    <input type="text" class="form-control" name="device_name" id="device_name" placeholder="Enter Device Display Name">
                  </div>

                  <div class="form-group device_ip">
                    <label for="device_ip">Device IP Address</label>
                    <input type="text" class="form-control" name="device_ip" id="device_ip" placeholder="Enter Device IP Address">
                  </div>


                  <div class="form-group column_no">
                    <label for="column_no">Column Number</label>
                      <select class="form-control" id="column_no" name="column_no">
                      <option>Select Option</option>
                      <option value="1">Column 01</option>
                      <option value="2">Column 02</option>
                      <option value="3">Column 03</option>
                      <option value="4">Column 04</option>
                      <option value="5">Column 05</option>
                      <option value="6">Column 06</option>
                      <option value="7">Column 07</option>
                      <option value="8">Column 08</option>
                      <option value="9">Column 09</option>
                      <option value="10">Column 10</option>
                    </select>
                  </div> 

                  <div class="form-group p_remarks">
                    <label for="p_remarks">Remarks</label>
                      <textarea class="form-control" name="p_remarks" id="p_remarks" placeholder=""></textarea>
                  </div>         

                </div>
                <!-- /.card-body -->

                <div class="card-footer submit">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div>
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

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php 
      include "includes/scripts.php";
    ?>
<!-- REQUIRED SCRIPTS -->



</body>
</html>
