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
            <h1 class="m-0">Card Issuing Authority</h1>
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
          <div class="col-md-7">

            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Authority</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th style="width: 5px">#Sl.No</th>
                      <th style="width: 150px">Name</th>                      
                      <th>Designation</th>
                      <th>Signature</th>
                      <th>Last Upload</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      include 'classes/id_card.php';
                      $idCard = new IDCard;
                      if (isset($_GET['active'])) {
                        $id =$_GET['active'];
                        $idCard->auth_active($id); 
                      }
                      if (isset($_GET['inactive'])) {
                        $id =$_GET['inactive'];
                        $idCard->auth_inactive($id); 
                      }
                      if (isset($_GET['id'])) {
                        $id =$_GET['id'];
                        $idCard->auth_delete($id); 
                      }

                      if (isset($_GET['set'])) {
                        $id =$_GET['set'];
                        $idCard->auth_set($id); 
                      }

                      $obj = $idCard->findAuth();
                      if($obj->num_rows > 0){ $sl=1;
                        while($row = $obj->fetch_assoc()){ 
                          if ($row["status"] == 1) {
                            $status = '<a href="authority.php?active='.$row["id"].'" name="active" class="btn btn-success btn-sm"><i class="fa-solid fa-toggle-on"></i></a>';
                          }
                          else{
                            $status = '<a href="authority.php?inactive='.$row["id"].'" name="inactive" class="btn btn-secondary btn-sm btn-outline-light"><i class="fa-solid fa-toggle-off"></i></a>';
                          }
                         ?>
                         
                          <tbody>
                            <tr>
                              <td><?php echo $sl ?></td>
                              <td><?php echo $row["name"]; ?></td>
                              <td><?php echo $row["designation"]; ?></td>

                              <td>
                                <!-- Employee Signature -->
    <?php if (isset($row['sign_path']) && !empty($row['sign_path'])): ?>
        <img src="ID_Card/Authority/<?php echo basename($row['sign_path']); ?>" alt="Employee Signature" style="width:80px; height:auto; margin-bottom: 10px;">
    <?php else: ?>
        <p>No signature available</p>
    <?php endif; ?>

                              </td>


                              <td style="width: 110px"><?php echo date('d-M-Y', strtotime($row['last_update'])); ?></td>

                              

                         <!-- <td><?php echo $status ?></td> -->




                              
                                <td style="width: 120px">
                    <button data-toggle="modal" data-target="#SetModal<?php echo $row["id"]; ?>" class="btn btn-success btn-sm ml-1"><i class="fa-solid fa-cloud-arrow-up"></i></button>
                
                    <button data-toggle="modal" data-target="#deleteModal<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm ml-1"><i class="fa fa-trash"></i></button>
                </td>

                            </tr>


               <?php $sl++; ?>



            <!-- Set Authority Modal -->
            <div class="modal fade" id="SetModal<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row["id"]; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel<?php echo $row["id"]; ?>">Confirmation Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to Upload Signature to all ID Card?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="authority.php?set=<?php echo $row["id"]; ?>" class="btn btn-danger">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row["id"]; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel<?php echo $row["id"]; ?>">Confirmation Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this setup?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="authority.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>


            <?php 
                }
            } else { ?>
            <tr>
                <td colspan="8" class="text-center">Data Not Found</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>


              </div>
              <!-- /.card-body -->
            </div>

          </div>



    <!-- Column-02 -->


   <div class="col-md-5">

            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Authority</h3>

                
              </div>

              <!-- /.card-header -->
              <!-- form start -->
               <form method="POST" enctype="multipart/form-data">
                <div class="card-body">

                   <?php 
              
              if (isset($_POST['submit'])) {
              echo $idCard->auth_add($_POST, $_FILES);
               // echo "<script>window.location.replace('authority.php')</script>";
              }
               ?>
              
                  
                  <div class="form-group">
                    <label for="name">Authority Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Authority Name">
                  </div>


                  <div class="auth_sign_path">
                    <label for="auth_sign_path">Authority Signature</label>
                      <!-- <textarea class="form-control" name="auth_sign_path" id="sign_path" placeholder=""></textarea> -->
                      <input class="form-control px-1 py-1"  type="file" name="auth_sign_path" required>
                  </div>  

                <div class="form-group ">
                    <label for="remarks">Remarks</label>
                    <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks if any">
                </div>



                  <div class=" submit">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>


              </div>
              <!-- /.card-body -->
            </div>

          </div> <!--  Column-02 -->
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
