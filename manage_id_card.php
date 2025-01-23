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
                      <th>PF No.</th>
                      <th>Employee Name</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Blood Group</th>
                      
                      <th style="width: 170px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                     include 'classes/id_card.php';
              $idCard = new IDCard;

                      if (isset($_GET['id'])) {
                        $id =$_GET['id'];
                        $idCard->delete($id); 
                      }
                      $obj = $idCard->allID_cards();
                      if($obj->num_rows > 0){ $sl=1;
                        while($row = $obj->fetch_assoc()){ 

                         
                         ?>
                         
                            <tr>
                              <td><?php echo $sl ?></td>
                              <td><?php echo $row["pf_no"]; //."<br>".$row["brand"]." ".$row["model"];//?></td>
                              <td><?php echo $row["name"]; ?></td>
                              <td><?php echo $row["designation"]; ?></td>
                              <td><?php echo $row["department"]; ?></td>
                              <td><?php echo $row["blood_group"]; ?></td>


      
                              <td>

                                <form method="post" action="reports/id_card_print.php">
                
   
                              <div class="col-xs-4">
                                  <input type="hidden" class="form-control" name="pf_no" type="text" value="<?php echo $row['pf_no']; ?>">
                              </div>
                              <div class="col-xs-2">
                                  <button type="submit" name="both" class="btn btn-primary btn-sm" title="Print Both Sides">
                                   <i class="fa-solid fa-id-card"></i>
                                  </button>

                                  <button type="submit" name="front" class="btn btn-primary btn-sm" title="Print Front Side">
                                      <i class="fa-solid fa-id-card-clip"></i> <!-- Front side icon -->
                                  </button>

                                  <button type="submit" name="back" class="btn btn-primary btn-sm" title="Print Back Side">
                                      <i class="fa-solid fa-credit-card"></i> <!-- Back side icon -->
                                  </button>



                                

                                <a href="edit_id_card.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" style=" margin-right: 2px;">
                                    <i class="fa fa-edit"></i>
                                </a> 
                       
                                    </div>
                                    <!-- /.card-body -->
                                  </div>

                      </form>

                  




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
