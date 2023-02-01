

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

    <!-- /.content-header -->

    <!-- Main content -->
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">


            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Asset Transfer History</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <!-- form start -->
              <form method="POST">
                <div class="card-body">


                <div class="form-group row">
                  <div class="col-xs-2">
                    <!-- <label for="ex1">col-xs-2</label> -->
                    <input class="form-control" id="inv_id" type="text">
                  </div>
                  <div class="col-xs-2">
                     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              <?php 
              include 'classes/products.php';
              $product = new Product;
              // $inv_id = $_GET['id'];
              if (isset($_POST['submit'])) {
              $obj = $product->findProducts($inv_id);
              $row = $obj->fetch_assoc();
              var_dump($row);



              ?>

              




            

    <table id="history" class="table table-borderless text-center">
      
    <thead>
      <tr>
        <?php 
          $datarow=mysqli_fetch_assoc($data);
          if ($datarow["product_cat"] == 1) {
                            $product_cat = 'CPU';
                          }
                          elseif ($datarow["product_cat"] == 2) {
                            $product_cat = 'Laptop';
                          }
                          elseif ($datarow["product_cat"] == 3) {
                            $product_cat = 'Monitor';
                          }
                          elseif ($datarow["product_cat"] == 4) {
                            $product_cat = 'Printer';
                          }
                          elseif ($datarow["product_cat"] == 5) {
                            $product_cat = 'Mouse';
                          }
                          elseif ($datarow["product_cat"] == 6) {
                            $product_cat = 'Keyboard';
                          }
                          elseif ($datarow["product_cat"] == 7) {
                            $product_cat = 'UPS';
                          }
                          elseif ($datarow["product_cat"] == 8) {
                            $product_cat = 'Cash Drawer';
                          }
                          else{
                            $product_cat = 'Not Defiend';
                          }
        ?>


        <th><?php echo $product_cat." : ".$datarow['brand']." ".$datarow['model']?></th>
        
        
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($res)){
      $datetime = $row['trnsfr_date'];
      $date = date('d-M-Y',strtotime($datetime));


        ?>

        <tr>
          <td><i class="fas fa-arrow-circle-down text-info h2"></i></td>
        </tr>
      <tr>

        <td class="bg-secondary"><?php echo $row['curr_user']." "."(".$datarow['dept'].")"."&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;"."Date: ".$date?></td>
        
              </tr>
      <?php } ?>
    </thead>
    </table>

              </div>
              <!-- /.card-body -->
            </div>
            



              </div>
              <div class="col-md-2"></div>
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
