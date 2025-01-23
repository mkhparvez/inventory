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
 <!--    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div>  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage All Asset Information</h3>

                <!-- <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-2">
                <table id="assets" class="table text-center">
                  <thead>
                    <tr>
                      <th style="width: 10px">#Sl.No</th>
                      <th>Asset Name</th>
                      <th>Inventory Id</th>
                      <th>Specification</th>
                      <th>Brand, Model & <br> Serial No.</th>
                      <th>Username</th>
                      <th style="display:none;">PF</th>
                      <th>Department</th>
                      <th style="width: 105px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      include "classes/products.php";
                      $product = new Product;
                      if (isset($_GET['id'])) {
                        $id =$_GET['id'];
                        $product->delete($id); 
                      }
                      $obj = $product->allProduct();
                      if($obj->num_rows > 0){ $sl=1;
                        while($row = $obj->fetch_assoc()){ 

                          if ($row["product_cat"] == 1) {
                            $product_cat = 'CPU';
                            $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."<br> HDD-".$row["hdd"];
                          }
                          elseif ($row["product_cat"] == 2) {
                            $product_cat = 'Laptop';
                            $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."<br> HDD-".$row["hdd"];
                          }
                          elseif ($row["product_cat"] == 3) {
                            $product_cat = 'Monitor';
                            $spec = $row["mon_size"].'"';
                          }
                          elseif ($row["product_cat"] == 4) {
                            $product_cat = 'Printer';

                                  if (empty($row["toner"]) || $row["toner"] === "NULL") {
                                      $spec =  $row["toner"];
                                  } else {
                                      $spec = 'Toner : '. $row["toner"];
                                  }   
                                   

                                  if (empty($row["ip"]) || $row["ip"] === "NULL") {
                                      $spec =  $row["toner"];
                                  } else {
                                      // $spec = 'Toner : '. $row["toner"] '.'<br> IP-'.$row["ip"]';
                                      $spec = 'Toner: ' . $row["toner"] . '<br> IP: ' . $row["ip"];

                                      // $spec = $spec =  $row["cam_res"]." MP, ".$row["cam_type"]." Camera,  "."<br> IP-".$row["ip"];
                                  }       

                          }


                          elseif ($row["product_cat"] == 5) {
                            $product_cat = 'Mouse';
                            $spec = "";
                          }
                          elseif ($row["product_cat"] == 6) {
                            $product_cat = 'Keyboard';
                            $spec = "";                            
                          }
                          elseif ($row["product_cat"] == 7) {
                            $product_cat = 'UPS';
                            $spec = $row["va"]."VA";
                          }
                          elseif ($row["product_cat"] == 8) {
                            $product_cat = 'Cash Drawer';
                            $spec = "N/A";                            
                          }
                          elseif ($row["product_cat"] == 9) {
                            $product_cat = 'POS Terminal';
                            $spec = $row["processor"].", "."RAM-".$row["ram"]."GB".", "."<br> HDD-".$row["hdd"];
                          }
                          elseif ($row["product_cat"] == 10) {
                            $product_cat = 'Scanner';
                            $spec = "N/A";
                          }
                          elseif ($row["product_cat"] == 11) {
                            $product_cat = 'Barcode Scanner';
                            $spec = "N/A";
                          }
                          elseif ($row["product_cat"] == 12) {
                            $product_cat = 'Photocopier';
                            $spec = "N/A";
                          }

                          elseif ($row["product_cat"] == 13) {
                            $product_cat = 'Camera';
                            $spec = $spec =  $row["cam_res"]." MP, ".$row["cam_type"]." Camera,  "."<br> IP-".$row["ip"];
                          }
                          elseif ($row["product_cat"] == 14) {
                            $product_cat = 'Switch';
                            $spec = $spec =  $row["port"]." Port ".$row["port_type"].",  "."<br> IP-".$row["ip"];
                          }
                          elseif ($row["product_cat"] == 15) {
                            $product_cat = 'Router';
                            $spec = "N/A";
                          }
                          elseif ($row["product_cat"] == 16) {
                            $product_cat = 'DVR';
                            $spec = "N/A";
                          }
                          elseif ($row["product_cat"] == 17) {
                            $product_cat = 'NVR';
                            $spec = "N/A";
                          }
                          elseif ($row["product_cat"] == 18) {
                            $product_cat = 'External HDD';
                            $spec =$row["hdd"];
                          }
                          elseif ($row["product_cat"] == 19) {
                            $product_cat = 'External SSD';
                            $spec =$row["hdd"];
                          }
                          elseif ($row["product_cat"] == 20) {
                            $product_cat = 'Pendrive';
                            $spec =$row["hdd"];
                          }
                          else{
                            $product_cat = 'Not Defiend';
                            $spec = "";                            
                          }
                          
                         ?>
                         
                            <tr>
                              <td><?php echo $sl ?></td>
                              <td><?php echo $product_cat //."<br>".$row["brand"]." ".$row["model"];//?></td>
                              <td><?php echo $row["inv_id"]; ?></td>

                              <td><?php echo $spec ?></td>

                              <td><?php echo $row["brand"]." ".$row["model"]."<br> SN: ". $row["sl_no"]; ?></td>
                              
                             
                              <td>
                                  <?php 
                                  if (empty($row["user"])) {
                                      echo $row["location"];
                                  } else {
                                      echo $row["user"];
                                  }
                                  ?>
                              </td>

                              <td style="display:none;"><?php echo $row["PF"]; ?></td>
                              <td><?php echo $row["dept"]; ?></td>
                              <td>
<!-- 
                                <a href="product_details.php?id=<?php echo $row['inv_id']; ?>" class="btn btn-info btn-sm"  style="margin-right: 2px;">
                                   <i class="fa-solid fa-circle-info"></i>
                                </a>
 -->
                                <a href="transfer_history.php?id=<?php echo $row['inv_id']; ?>" class="btn btn-info btn-sm"  style="margin-right: 2px;">
                                   <i class="fa-solid fa-circle-info"></i>
                                </a>

                                <?php if ($_SESSION['role'] != 3): ?>

                                <a href="productEdit.php?id=<?php echo $row['inv_id']; ?>" class="btn btn-warning btn-sm" style=" margin-right: 2px;">
                                    <i class="fa fa-edit"></i>
                                </a>                              
                                <a href="asset_transfer.php?id=<?php echo $row['inv_id']; ?>" class="btn btn-danger btn-sm" style="margin-right: 2px;">
                                   <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                                 <?php endif; ?>
                              </td>

                      <?php $sl++; ?>


                      <!-- Delete Modal -->
<div class="modal fade" id="<?php echo $row["inv_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are sure want to delete this product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="manageproduct.php?id=<?php echo $row["inv_id"] ?>" class="btn btn-danger">Confirm</a>
      </div>
    </div>
  </div>
</div>

                              

                       <?php  }
                      }
                      else{ ?>
                        <tbody>
                          <tr>
                            <td colspan="8" class="text-center">Data Not Found</td>
                          </tr>
                        </tbody>
                      <?php }
                    ?>
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
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

<script>
$(document).ready(function() {
    // Initialize your DataTable
    var table = $('#assets').DataTable();

    // Get the 'search' parameter from the URL
    var urlParams = new URLSearchParams(window.location.search);
    var searchParam = urlParams.get('search');

    // If the 'search' parameter exists, use it to filter the DataTable
    if (searchParam) {
        table.search(searchParam).draw(); // Apply the search term and redraw the table
    }
});
</script>

</body>
</html>
