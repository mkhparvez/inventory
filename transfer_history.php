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
                    <input class="form-control" name="inv_id" type="text" value="<?php if (isset($_POST['submit'])) ?>">

                    <!-- { echo $_POST['inv_id'];} -->

                  </div>
                  <div class="col-xs-2">
                     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              <?php 
              include 'classes/products.php';
              $product = new Product;
               if (isset($_POST['submit'])) {  
              $inv_id = $_POST['inv_id'];   
              $obj = $product->findProduct($inv_id);
              $row = $obj;

              if ($row=="Errror") {
                 echo '<div class="alert alert-danger text-center">Inventory Id not Exist</div>';

              } else {
                // code...
             
              
              ?>



            

    <table id="history" class="table table-borderless text-center">
      
    <thead>
      <tr>
        <th style="padding: 0;"><?php echo"Inv_id :$inv_id"?></th>
      </tr>
      <tr>
        <?php 
          if ($row["product_cat"] == 1) {
                            $product_cat = 'CPU';
                          }
                          elseif ($row["product_cat"] == 2) {
                            $product_cat = 'Laptop';
                          }
                          elseif ($row["product_cat"] == 3) {
                            $product_cat = 'Monitor';
                          }
                          elseif ($row["product_cat"] == 4) {
                            $product_cat = 'Printer';
                          }
                          elseif ($row["product_cat"] == 5) {
                            $product_cat = 'Mouse';
                          }
                          elseif ($row["product_cat"] == 6) {
                            $product_cat = 'Keyboard';
                          }
                          elseif ($row["product_cat"] == 7) {
                            $product_cat = 'UPS';
                          }
                          elseif ($row["product_cat"] == 8) {
                            $product_cat = 'Cash Drawer';
                          }
                          else{
                            $product_cat = 'Not Defiend';
                          }
        ?>


        <th><?php echo $product_cat." : ".$row['brand']." ".$row['model']?></th>

         <?php
        $obj = $product->history($inv_id,1);
          if($obj->num_rows > 0){
           $his_row_p = $obj->fetch_assoc();{
              $datetime = $his_row_p['trnsfr_date'];
              $date = date('d-M-Y',strtotime($datetime));

        ?>

        <tr>
          <td class="bg-secondary"><?php echo $his_row_p['pre_user']." "."(".$his_row_p['pre_dept'].")"."&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;"."Date: ".$date?></td>
        </tr>

        <?php
      } }
      ?>
        
        
      </tr>
    </thead>
    <tbody>
      <?php
        $obj = $product->history($inv_id);
          if($obj->num_rows > 0){
            while($his_row = $obj->fetch_assoc()){
              $datetime = $his_row['trnsfr_date'];
              $date = date('d-M-Y',strtotime($datetime));

        ?>

        <tr>

          <td><i class="fas fa-arrow-circle-down text-info h2"></i></td>

        </tr>

        <tr>
        <td class="bg-secondary"><?php echo $his_row['curr_user']." "."(".$his_row['curr_dept'].")"."&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;"."Date: ".$date?></td>
        </tr>

        
        
      <tr>

        
        
              </tr>
      <?php }

      
 ?>
    </thead>

  </tbody>
  <?php

      
       }
       else {
        echo '<td class="alert alert-primary">History  Not  Found</td>';

      }

       }


        }



  ?>
    </table>

              </div>
              <!-- /.card-body -->
            </div>

  </form>



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
