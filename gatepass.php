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
            <h1 class="m-0">Gatepass</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gatepass</li>
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
                  <input type="text" id="gp_id" class="form-control" >
                </div>
              </div>


          		<div class="col-md-3">
          			<div class="form-group">
          				<input type="date" id="pdate" name="pdate" class="form-control" value="<?php echo date('Y-m-d'); ?>">
          			</div>
          		</div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="inv_id" class="form-control" placeholder="Enter Inventory Id">
                </div>
              </div>

          	</div>

            <div class="row">

              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" readonly id="brand" class="form-control" placeholder="Enter Brand Name">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" readonly id="model" class="form-control" placeholder="Model Number">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" readonly name="sl_no" id="sl_no" class="form-control" placeholder="Enter Serial Number">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" readonly name="spec" id="spec" class="form-control" placeholder="Assets Specification">
                </div>
                </div>
           </div>

            <div class="row">

              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" readonly id="pre_loc" class="form-control" placeholder="Location">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="curr_loc" class="form-control" placeholder="New Location">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" readonly name="dept" id="pre_dept" class="form-control" placeholder="Department">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="new_dept" id="curr_dept" class="form-control" placeholder="New Department">
                </div>
                </div>
           </div>


            <div class="row">

              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" id="r_name" class="form-control" placeholder="Receiver Name">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="r_desig" class="form-control" placeholder="Receiver Deisgnation">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" name="company" id="company" class="form-control" placeholder="Company Name">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks">
                </div>
                  <button class="addItem btn btn-info mt-1">Add Item</button>
                </div>
           </div>

        <div class="row mt-2">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>Date</th>
                <th>Inv_id</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Serial No.</th>
                <th>Specification</th>
              </tr>
            </thead>
            <tbody class="tdata">
              
            </tbody>

          </table>
        </div>

<!--         <div class="row">
          
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

                  <option value="0">-----------</option>
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
 -->
<div class="form-group">
                  <a href="reports/multicell-table.php?id=" class="btn btn-primary" id="print-btn" target="_blank">Print</a>
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
<script>
  // Add keyup event listener to input
 
</script>


</body>
</html>
