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
            <h1 class="m-0">Add Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">products</li>
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
                <h3 class="card-title">Products</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">

              <?php 
              include 'classes/products.php';
              $product = new Product;
              if (isset($_POST['submit'])) {
               echo $product->addNewProduct($_POST);
              }
               ?>

                  <div class="form-group">
                    <label for="product_cat">Product Category</label>
                    <select class="form-control" id="product_cat" name="product_cat">
                      <option>Select Option</option>
                      <option value="1">CPU</option>
                      <option value="2">Laptop</option>
                      <option value="3">Monitor</option>
                      <option value="4">Printer</option>
                      <option value="5">Mouse</option>
                      <option value="6">Keyboard</option>
                      <option value="7">UPS</option>
                      <option value="8">Cash Drawer</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter Brand">
                  </div>
                  <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" name="model" id="model" placeholder="Enter Model">
                  </div>
                  <div class="form-group">
                    <label for="sl_no">Serial Number</label>
                    <input type="text" class="form-control" name="sl_no" id="slNo" placeholder="Enter Serial Number">
                  </div>
                  <div class="form-group">
                    <label for="inv_id">Inventory Id</label>
                    <input type="text" class="form-control" name="inv_id" id="inv_id" placeholder="Enter Inventory Id">
                  </div>
                  <div class="form-group processor">
                    <label for="processor">Processor Type</label>
                      <select class="form-control" id="processor" name="processor">
                      <option value="0">Select Option</option>
                      <option value="Core i9">Core i9</option>
                      <option value="Core i7">Core i7</option>
                      <option value="Core i5">Core i5</option>
                      <option value="Core i3">Core i3</option>
                      <option value="Pentium">Pentium</option>
                      <option value="Dual Core">Dual Core</option>
                      <option value="Core 2 Duo">Core 2 Duo</option>
                      <option value="Celeron">Celeron</option>
                    </select>
                  </div>

                  <div class="form-group ram">
                    <label for="ram">RAM Size</label>
                      <select class="form-control" id="ram" name="ram">
                      <option>Select Option</option>
                      <option value="512">512 MB</option>
                      <option value="1">1 GB</option>
                      <option value="2">2 GB</option>
                      <option value="3">3 GB</option>
                      <option value="4">4 GB</option>
                      <option value="8">8 GB</option>
                      <option value="16">16 GB</option>
                      <option value="32">32 GB</option>
                    </select>
                  </div>

                  <div class="form-group hdd">
                    <label for="hdd">Storage Size (HDD/SSD)</label>
                      <input type="text" class="form-control" name="hdd" id="hdd" placeholder="Enter HDD/SSD Size">
                  </div> 

                  <div class="form-group mon_size">
                    <label for="mon_size">Monitor Size</label>
                      <input type="text" class="form-control" name="mon_size" id="mon_size" placeholder="Monitor Size in Inch">
                  </div>  
                  <div class="form-group toner">
                    <label for="toner">Toner Number</label>
                      <input type="text" class="form-control" name="toner" id="toner" placeholder="Input Printer Toner Number">
                  </div>  

                  <div class="form-group">
                    <label for="user">User Name</label>
                      <input type="text" class="form-control" name="user" id="user" placeholder="Enter Asset Users Name">
                  </div>


                  <div class="form-group">
                    <label for="dept_id">User Department</label>
                      <select class="form-control" id="dept_id" name="dept_id">
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
                    <label for="location">Current Location</label>
                      <input type="text" class="form-control" name="location" id="location" placeholder="Enter Current Location">
                  </div>


                  <div class="form-group">
                    <label for="status">Asset Status</label>
                      <select class="form-control" id="status" name="status">
                      <option>Select Option</option>
                      <option value="1">Useable</option>
                      <option value="2">Damaged</option>
                      <option value="3">Need to Repair</option>
                    </select>
                  </div>          

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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
<?php 
      include "includes/scripts.php";
    ?>
<!-- REQUIRED SCRIPTS -->



</body>
</html>
