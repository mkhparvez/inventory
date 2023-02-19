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
                    <label for="product_cat">Level</label>
                    <select class="form-control" id="product_cat" name="product_cat">
                      <option>Select Option</option>
                      <option value="1">Level-01</option>
                      <option value="2">Level-02</option>
                      <option value="3">Level-03</option>
                      <option value="4">Level-04</option>
                      <option value="5">Level-05</option>
                      <option value="6">Level-06</option>
                      <option value="7">Level-07</option>
                      <option value="8">Level-08</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="block">Block</label>
                    <select class="form-control" id="block" name="block">
                      <option>Select Option</option>
                      <option value="A">Block-A</option>
                      <option value="B">Block-B</option>
                      <option value="C">Block-C</option>
                      <option value="D">Block-D</option>
                    </select>
                  </div>
                  <div class="form-group Shop_Number">
                    <label for="Shop_Number">Shop_Number</label>
                    <input type="text" class="form-control" name="Shop_Number" id="Shop_Number" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group Shop_Name">
                    <label for="Shop_Name">Shop_Name</label>
                    <input type="text" class="form-control" name="Shop_Name" id="Shop_Name" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group POP">
                    <label for="POP">POP</label>
                    <input type="text" class="form-control" name="POP" id="POP" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group Bandwidth">
                    <label for="Bandwidth">Bandwidth</label>
                    <input type="text" class="form-control" name="Bandwidth" id="Bandwidth" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group IP_Address">
                    <label for="IP_Address">IP_Address</label>
                    <input type="text" class="form-control" name="IP_Address" id="IP_Address" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group Subnet">
                    <label for="Subnet">Subnet</label>
                    <input type="text" class="form-control" name="Subnet" id="Subnet" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group Gateway">
                    <label for="Gateway">Gateway</label>
                    <input type="text" class="form-control" name="Gateway" id="Gateway" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group Connection_Date">
                    <label for="Connection_Date">Connection_Date</label>
                    <input type="text" class="form-control" name="Connection_Date" id="Connection_Date" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group Connection_Type">
                    <label for="Connection_Type">Connection_Type</label>
                    <input type="text" class="form-control" name="Connection_Type" id="Connection_Type" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group Bill_Month">
                    <label for="Bill_Month">Bill_Month</label>
                    <input type="text" class="form-control" name="Bill_Month" id="Bill_Month" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group ONU_MAC">
                    <label for="ONU_MAC">ONU_MAC</label>
                    <input type="text" class="form-control" name="ONU_MAC" id="ONU_MAC" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group ONU_Serial">
                    <label for="ONU_Serial">ONU_Serial</label>
                    <input type="text" class="form-control" name="ONU_Serial" id="ONU_Serial" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group TJB">
                    <label for="TJB">TJB</label>
                    <input type="text" class="form-control" name="TJB" id="TJB" placeholder="Enter Shop Number">
                  </div>
                  <div class="form-group OLT_Port">
                    <label for="OLT_Port">OLT_Port</label>
                    <input type="text" class="form-control" name="OLT_Port" id="OLT_Port" placeholder="Enter Shop Number">
                  </div>

                  <div class="form-group Remarks">
                    <label for="Remarks">Remarks</label>
                      <textarea class="form-control" name="Remarks" id="Remarks" placeholder=""></textarea>
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
