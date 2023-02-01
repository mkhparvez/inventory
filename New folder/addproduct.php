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
            <h1 class="m-0">Products</h1>
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
                <h3 class="card-title">Add Products</h3>
                <a href="manageproduct.php" class="btn btn-sm btn-success float-right"><i class="fas fa-eye"></i></a>
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
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                    <label for="des">Product Description</label>
                    <textarea type="text" class="form-control" name="des" id="des" placeholder="Enter Product Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="size">Product Size</label>
                    <input type="text" class="form-control" name="size" id="size" placeholder="Enter Product Size">
                  </div>
                  <div class="form-group">
                    <label for="color">Product Color</label>
                    <input type="color" class="form-control" name="color" id="color">
                  </div>
                  <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Enter Barcode">
                  </div>
                  <div class="form-group">
                    <label for="costPrice">Cost Price</label>
                    <input type="number" class="form-control" name="costPrice" id="costPrice" placeholder="Enter Cost Price">
                  </div>
                  <div class="form-group">
                    <label for="sellPrice">Product Sale Price</label>
                    <input type="number" class="form-control" name="salePrice" id="salePrice" placeholder="Enter Sale Price">
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
