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
            <h1 class="m-0">Asset Transfer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Asset_Transef</li>
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
          <div class="col-md-12">
            <div class="row">
              <!-- my Content -->
            <div class="card card-primary col-md-4">
              <div class="card-header">
                <h3 class="card-title">Transfer From</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">

              
              <?php 
              include 'classes/products.php';
              $product = new Product;
              if (isset($_POST['transfer'])) {
               echo $product->transfer($_POST);
              }
               ?>

                  <div class="form-group">
                    <label for="inv_id">Inventory Id</label>
                    <input type="text" class="form-control" name="inv_id" id="inv_id" placeholder="Enter Inventory Id">
                  </div>


                  <div class="form-group">
                    <label for="sl_no">Serial Number</label>
                    <input type="text" readonly class="form-control" name="sl_no" id="sl_no" placeholder="Enter Serial Number">
                  </div>
 

                  <div class="form-group">
                    <label for="user">Present User</label>
                      <input type="text" readonly class="form-control" name="user" id="user" placeholder="Enter Asset Users Name">
                  </div>


                  <div class="form-group">
                    <label for="dept">Department</label>
                      <input type="text" readonly class="form-control" name="dept" id="dept" placeholder="Enter Asset Users Name">
                  </div>

                  <div class="form-group">
                    <label for="location">Present Location</label>
                      <input type="text" readonly class="form-control" name="location" id="location" placeholder="Enter Current Location">
                  </div>       

                </div>
                <!-- /.card-body -->
            </div>




            <div class="card card-primary col-md-4">
              <div class="card-body">
                <table class="w-100 h-100">
                  <tbody>
                    <tr>
                      <td class="align-middle">
                        <button type="submit" name="transfer" class="align-middle btn-lg btn btn-info w-100 h-50">
                          <i class="display-1 fas fa-angle-double-right"></i>
                          <p>Transfer Asset</p>
                      </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
            </div>


            <!-- my Content -->
            <div class="card card-primary col-md-4">
              <div class="card-header">
                <h3 class="card-title">Transfer To</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">

                  <div class="form-group search-box">
                    <label for="new_user">New User</label>
                      <input type="text" class="form-control" name="new_user" id="new_user" placeholder="Enter Asset Users Name">
                      <div id="result">
                      </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="new_dept">User Department</label>
                      <select class="form-control" id="new_dept" name="new_dept">
                      <option>Select Option</option>
                      <option value="1">Admin</option>
                      <option value="2">Accounts</option>
                      <option value="3">Care & Clean</option>
                      <option value="4">Carparking</option>
                      <option value="5">Civil</option>
                      <option value="6">Electrical</option>
                      <option value="7">Fire</option>
                      <option value="8">IT</option>
                      <option value="9">Mechanical</option>
                      <option value="10">SCD</option>
                      <option value="11">Security</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="new_location">New Location</label>
                      <input type="text" class="form-control" name="new_location" id="new_location" placeholder="Enter Current Location">
                  </div>


                  <div class="form-group">
                    <label for="status">Asset Status</label>
                      <select class="form-control" id="status" name="status">
                      <option>Select Option</option>
                      <option value="1">Workable</option>
                      <option value="2">Damaged</option>
                      <option value="3">Need to Repair</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="remarks">Remarks</label>
                      <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks">
                  </div>          

                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div> -->
              </form>
            </div>
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
<?php 
      include "includes/scripts.php";
    ?>
<!-- REQUIRED SCRIPTS -->



</body>
</html>
