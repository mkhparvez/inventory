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
              $inv_id = $_GET['id'];
              if (isset($_POST['update'])) {
               echo $product->updateProduct($_POST,$inv_id);
              }
              $obj = $product->findProduct($inv_id);
              $row = $obj;


                         if ($row['product_cat'] == 1) {
                            $product_cat = 'CPU';
                          }
                          elseif ($row['product_cat'] == 2) {
                            $product_cat = 'Laptop';
                          }
                          elseif ($row['product_cat'] == 3) {
                            $product_cat = 'Monitor';
                          }
                          elseif ($row['product_cat'] == 4) {
                            $product_cat = 'Printer';
                          }
                          elseif ($row['product_cat'] == 5) {
                            $product_cat = 'Mouse';
                          }
                          elseif ($row['product_cat'] == 6) {
                            $product_cat = 'Keyboard';
                          }
                          elseif ($row['product_cat'] == 7) {
                            $product_cat = 'UPS';
                          }
                          elseif ($row['product_cat'] == 8) {
                            $product_cat = 'Cash Drawer';
                          }
                          elseif ($row['product_cat'] == 9) {
                            $product_cat = 'POS Terminal';
                          }

               ?>
 
                 


                  <div class="form-group">
                    <label for="inv_id">Inventory Id</label>
                    <input type="text" readonly class="form-control" name="inv_id" id="inv_id" placeholder="Enter Inventory Id" value="<?php echo $row['inv_id'] ?>">
                  </div>

                 <div class="form-group">
                    <label for="product_cat">Product Category</label>
           <!--  -->
                    
                    <select class="form-control" id="product_cat" name="product_cat" value="<?php echo $product_cat?>">
                      <option><?php echo $product_cat ?></option>
                      <option value="1">CPU</option>
                      <option value="2">Laptop</option>
                      <option value="3">Monitor</option>
                      <option value="4">Printer</option>
                      <option value="5">Mouse</option>
                      <option value="6">Keyboard</option>
                      <option value="7">UPS</option>
                      <option value="8">Cash Drawer</option>
                      <option value="9">POS Terminal</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter Brand" value="<?php echo $row['brand'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" name="model" id="model" placeholder="Enter Model" value="<?php echo $row['model'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="sl_no">Serial Number</label>
                    <input type="text" class="form-control" name="sl_no" id="sl_no" placeholder="Enter Serial Number" value="<?php echo $row['sl_no'] ?>">
                  </div>
                  <div class="form-group processor">
                    <label for="processor">Processor Type</label>
                      <select class="form-control" id="processor" name="processor" value="<?php echo $processor?>">
                      <option><?php echo $row['processor'] ?></option>
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
                      <option><?php echo $row['ram']." GB" ?></option>
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
                      <input type="text" class="form-control" name="hdd" id="hdd" placeholder="Enter HDD/SSD Size"value="<?php echo $row['hdd'] ?>">
                  </div> 

                  <div class="form-group mon_size">
                    <label for="mon_size">Monitor Size</label>
                      <input type="text" class="form-control" name="mon_size" id="mon_size" placeholder="Monitor Size in Inch" value="<?php echo $row['mon_size'] ?>">
                  </div>  
                  <div class="form-group toner">
                    <label for="toner">Toner Number</label>
                      <input type="text" class="form-control" name="toner" id="toner" placeholder="Input Printer Toner Number" value="<?php echo $row['toner'] ?>">
                  </div>  
                  <div class="form-group va">
                    <label for="va">UPS Capacity(KVA)</label>
                      <input type="text" class="form-control" name="va" id="va" placeholder="Input UPS Capacity">
                  </div>

                  <div class="form-group">
                    <label for="user">User Name</label>
                      <input type="text" class="form-control" name="user" id="user" placeholder="Enter Asset Users Name" value="<?php echo $row['user'] ?>">
                  </div>
                  <div class="form-group user_designation">
                    <label for="user_designation">User Designation</label>
                      <input type="text" class="form-control" name="user_designation" id="user_designation" placeholder="Enter Users Designation" value="<?php echo $row['user_designation'] ?>">
                  </div>

                  <div class="form-group PF">
                    <label for="PF">PF No</label>
                      <input type="text" class="form-control" name="PF" id="PF" placeholder="Enter Users PF Number" value="<?php if($row['PF']==0){ echo "";} else {echo $row['PF'];} ?>">
                  </div>


                  <div class="form-group">
                    <label for="dept">User Department</label>
                      <select class="form-control" id="dept" name="dept">
                      <option><?php echo $row['dept'] ?></option>
                      <option value="Admin">Admin</option>
                      <option value="Accounts">Accounts</option>
                      <option value="Care & Clean">Care & Clean</option>
                      <option value="Carparking">Carparking</option>
                      <option value="Civil">Civil</option>
                      <option value="Electrical">Electrical</option>
                      <option value="Fire">Fire</option>
                      <option value="IT">IT</option>
                      <option value="Mechanical">Mechanical</option>
                      <option value="SCD">SCD</option>
                      <option value="Security">Security</option>
                      <option value="Toggi Fun World">Toggi Fun World</option>
                      <option value="Store">Store</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="location">Current Location</label>
                      <input type="text" class="form-control" name="location" id="location" placeholder="Enter Current Location" value="<?php echo $row['location'] ?>">
                  </div>


                  <div class="form-group">
                    <label for="status">Asset Status</label>
                      <select class="form-control" id="status" name="status">
                         <?php  if ($row['status']==1) {
                           $status="Useable";
                         } elseif ($row['status']==2) {
                           $status="Damaged";
                         } elseif ($row['status']==3) {
                           $status="Need to Repair";
                         }
                          ?>

                      <option><?php echo $status ?></option>
                      <option value="Useable">Useable</option>
                      <option value="Damaged">Damaged</option>
                      <option value="Need to Repair">Need to Repair</option>
                    </select>
                  </div>


                  <div class="form-group remarks">
                    <label for="remarks">Remarks</label>
                      <textarea class="form-control" name="remarks" id="remarks"><?php echo $row['remarks'] ?></textarea>
                  </div>           



                </div>
                <!-- /.card-body -->







                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update Product</button>
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
