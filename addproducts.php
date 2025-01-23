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
              include 'classes/setup.php';
              $product = new Product;
              $setup = new Setup;
              if (isset($_POST['submit'])) {
               echo $product->addNewProduct($_POST);
              }


               // Fetch departments
                  $dept = $setup->findDept();
                  $product_type = $setup->allProducts_types();
                 
               ?>

                  <div class="form-group">
                    <label for="product_cat">Product Category</label>
                    <select class="form-control" id="product_cat" name="product_cat">
                      <option value="0">Select Option</option>
                        <?php
                        // Populate the dropdown
                        if ($product_type->num_rows > 0) {
                            while ($row_product = $product_type->fetch_assoc()) {
                                // Check if the current category matches the one in the database
                                $selected = ($row_product['type_name'] == $row_product['id']) ? 'selected' : '';
                                echo '<option value="' . $row_product['id'] . '" ' . $selected . '>' . $row_product['type_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">Not Found</option>';
                        }
                        ?>
                      </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="inv_id">Inventory Id</label>
                    <input type="text" class="form-control" name="inv_id" id="inv_id" placeholder="Enter Inventory Id">
                  </div>
                  <div class="form-group brand">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter Brand">
                  </div>
                  <div class="form-group model">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" name="model" id="model" placeholder="Enter Model">
                  </div>
                  <div class="form-group sl_no">
                    <label for="sl_no">Serial Number</label>
                    <input type="text" class="form-control" name="sl_no" id="slNo" placeholder="Enter Serial Number">
                  </div>
                  <div class="form-group processor">
                    <label for="processor">Processor Type</label>
                      <select class="form-control" id="processor" name="processor">
                      <option value="0">Select Option</option>
                      <option value="Core i9">Core i9</option>
                      <option value="Core i7">Core i7</option>
                      <option value="Core i5">Core i5</option>
                      <option value="Core i3">Core i3</option>
                      <option value="Ryzen 3">Ryzen 3</option>
                      <option value="Ryzen 5">Ryzen 5</option>
                      <option value="Ryzen 7">Ryzen 7</option>
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

                  <div class="form-group mouseKeyboard" id="mouseKeyboard">
                    <label for="mouse">Mouse</label>                      
                      <input type="checkbox" id="mouse" name="mouse" value="1">
                    <label for="keyboard">Keyboard</label>                      
                      <input type="checkbox" id="keyboard" name="keyboard" value="1">
                  </div> 

                  <div class="form-group mon_size">
                    <label for="mon_size">Monitor Size</label>
                      <input type="text" class="form-control" name="mon_size" id="mon_size" placeholder="Monitor Size in Inch">
                  </div>  
                  <div class="form-group toner">
                    <label for="toner">Toner Number</label>
                      <input type="text" class="form-control" name="toner" id="toner" placeholder="Input Printer Toner Number">
                  </div>    
                  <div class="form-group va">
                    <label for="va">UPS Capacity(KVA)</label>
                      <input type="text" class="form-control" name="va" id="va" placeholder="Input UPS Capacity">
                  </div>  

                  
                  
                    <div class="form-group port">
                    <label for="port">Number of Port/Channel</label>
                      <select class="form-control" id="port" name="port">
                      <option>Select Option</option>
                      <option value="8">8 Port</option>
                      <option value="16">16 Port</option>
                      <option value="24">24 Port</option>
                      <option value="48">48 Port</option>
                      <option value="64">64 Port</option>
                      <option value="128">128 Port</option>
                    </select>
                  </div>  

                  <div class="form-group port_type">
                    <label for="port_type">Port Type(POE / Non POE)</label>
                      <select class="form-control" id="port_type" name="port_type">
                      <option>Select Option</option>
                      <option value="POE">POE</option>
                      <option value="Non POE">Non POE</option>
                    </select>
                  </div>



                   <div class="form-group cam_type">
                    <label for="cam_type">Camera Type</label>
                      <select class="form-control" id="cam_type" name="cam_type">
                      <option>Select Option</option>
                      <option value="Bullet">Bullet Camera</option>
                      <option value="Dome">Dome Camera</option>
                    </select>
                  </div>


                   <div class="form-group cam_res">
                    <label for="cam_res">Camera Resolution</label>
                      <select class="form-control" id="cam_res" name="cam_res">
                      <option>Select Option</option>
                      <option value="2">2 Megapixel</option>
                      <option value="4">4 Megapixel</option>
                      <option value="5">5 Megapixel</option>
                      <option value="8">8 Megapixel</option>
                    </select>
                  </div>

                 

                  <div class="form-group ip">
                    <label for="ip">IP Address</label>
                      <input type="text" class="form-control" name="ip" id="ip" placeholder="Input IP Address">
                  </div> 
 

          
                  <div class="form-group search-box user">
                    <label for="user">User Name</label>
                      <input type="text" class="form-control" name="user" id="user" placeholder="Enter Asset Users Name">
                      <div id="result">
                  </div>
                  </div>

                  <!-- <div class="form-group search-box">
                    <label for="new_user">New User</label>
                      <input type="text" class="form-control" name="new_user" id="new_user" placeholder="Enter Asset Users Name">
                      <div id="result">
                      </div>
                  </div> -->

                  <div class="form-group user_designation">
                    <label for="user_designation">User Designation</label>
                      <input type="text" class="form-control" name="user_designation" id="user_designation" placeholder="Enter Users Designation">
                  </div>

                  <div class="form-group PF">
                    <label for="PF">PF No</label>
                      <input type="text" class="form-control" name="PF" id="PF" placeholder="Enter Users PF Number">
                  </div>


                  <div class="form-group dept_id">
                    <label for="dept_id">User Department</label>
                      <select class="form-control" id="dept_id" name="dept_id">
                      <option>Select Department</option>
                      <?php
                        if ($dept->num_rows > 0) {
                            while ($rows = $dept->fetch_assoc()) {
                                echo '<option value="' . $rows['id'] . '">' . $rows['dept_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No Department Available</option>';
                        }
                        ?>
                    </select>
                  </div>

                  <div class="form-group location">
                    <label for="location">Current Location</label>
                      <input type="text" class="form-control" name="location" id="location" placeholder="Enter Current Location">
                  </div>


                  <div class="form-group status">
                    <label for="status">Asset Status</label>
                      <select class="form-control" id="status" name="status">
                      <option>Select Option</option>
                      <option value="1">Useable</option>
                      <option value="2">Damaged</option>
                      <option value="3">Need to Repair</option>
                    </select>
                  </div> 




                  <div class="form-group remarks">
                    <label for="remarks">Remarks</label>
                      <textarea class="form-control" name="remarks" id="remarks" placeholder=""></textarea>
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
<?php 
      include "includes/scripts.php";
    ?>
<!-- REQUIRED SCRIPTS -->



</body>
</html>
