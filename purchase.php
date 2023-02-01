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
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
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

          		<div class="col-md-3">
          			<div class="form-group">
          				<input type="date" id="pdate" name="pdate" class="form-control" value="<?php echo date('Y-m-d'); ?>">
          			</div>
          		</div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="cName" class="form-control" placeholder="Enter Company Name">
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="invoice" class="form-control" placeholder="Enter Invoice Number">
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" readonly id="stock" class="form-control" placeholder="Available Stock">
                </div>
              </div>          		
          	</div>

            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Enter Product Barcode">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" readonly name="costPrice" id="costPrice" class="form-control" placeholder="Product Cost Price">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Enter Quantity">
                </div>
              </div>

              <input readonly type="hidden" id="product_id" class="form-control" placeholder="Product id">

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" readonly id="total" name="total" class="form-control" placeholder="Total">
                </div>
                  <button class="addItem btn btn-info mt-1">Add Item</button>
                </div>
           </div>

        <div class="row mt-2">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>Date</th>
                <th>Barcode</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody class="tdata">
              
            </tbody>

          </table>
        </div>

        <div class="row">
          
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="totalQnt" class="form-control" placeholder="Total Quantity">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="totalAmt" class="form-control" placeholder="Total Amount">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <select id="dis" class="form-control">

                  <option value="10">10%</option>
                  <option value="15">15%</option>
                  <option value="20">20%</option>
                  <option value="25">25%</option>
                  <option value="30">30%</option>
                  <option value="35">35%</option>
                  <option value="40">40%</option>
                  <option value="45">45%</option>
                  <option value="50">50%</option>
                  <option value="55">55%</option>
                  <option value="60">60%</option>
                  <option value="65">65%</option>
                  <option value="70">70%</option>
                  <option value="75">75%</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="disAmt" class="form-control" placeholder="Discount Amount">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="gTotal" class="form-control" placeholder="Grand Total">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="payment" class="form-control" placeholder="Payment">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="due" class="form-control" placeholder="Due">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <button id="save" class="form-control btn btn-primary">Save & Print</button>
                </div>
              </div>






        </div>


            <!-- my Content -->


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
