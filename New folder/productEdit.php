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
              $id = $_GET['id'];
              if (isset($_POST['update'])) {
               echo $product->updateProduct($_POST,$id);
              }
              $obj = $product->findProduct($id);
              $row = $obj->fetch_assoc();

               ?>

                  <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="<?php echo $row['name'] ?> ">
                  </div>

                  <div class="form-group">
                    <label for="des">Product Description</label>
                    <textarea name="des" type="des" class="form-control" id="des" placeholder="Enter Product Description"> <?php echo $row['des'] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="size">Product Size</label>
                    <input type="text" class="form-control" name="size" id="size" placeholder="Enter Product Size" value="<?php echo $row['size'] ?> ">
                  </div>
                  <div class="form-group">
                    <label for="color">Product Color</label>
                    <input type="color" class="form-control" name="color" id="color"  value="<?php echo $row['color'] ?> ">
                  </div>
                  <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Enter Barcode" value="<?php echo $row['barcode'] ?> ">
                  </div>
                  <div class="form-group">
                    <label for="costPrice">Cost Price</label>
                    <input name="costPrice" type="number" class="form-control"  id="costPrice" placeholder="Enter Cost Price" value="<?php echo $row['costPrice'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="salePrice">Product Sale Price</label>
                    <input name="salePrice" type="number"  class="form-control"  id="salePrice" placeholder="Enter Sale Price" value="<?php echo $row['salePrice'] ?>">
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
