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
            <h1 class="m-0">Department Management</h1>
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
          <div class="col-md-6">

            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage All Departments</h3>

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
                      <th>Asset ID</th>
                      <th>Asset Name</th>                      
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      include 'classes/id_card.php';
                      $idCard = new IDCard;
                      if (isset($_GET['active'])) {
                        $id =$_GET['active'];
                        $idCard->dept_active($id); 
                      }
                      if (isset($_GET['inactive'])) {
                        $id =$_GET['inactive'];
                        $idCard->dept_inactive($id); 
                      }
                      if (isset($_GET['id'])) {
                        $id =$_GET['id'];
                        $idCard->dept_delete($id); 
                      }
                      $obj = $idCard->findDept();
                      if($obj->num_rows > 0){
                        while($row = $obj->fetch_assoc()){ 
                          if ($row["status"] == 1) {
                            $status = '<a href="id_dept.php?active='.$row["id"].'" name="active" class="btn btn-success btn-sm"><i class="fa-solid fa-toggle-on"></i></a>';
                          }
                          else{
                            $status = '<a href="id_dept.php?inactive='.$row["id"].'" name="inactive" class="btn btn-secondary btn-sm btn-outline-light"><i class="fa-solid fa-toggle-off"></i></a>';
                          }
                         ?>
                         
                          <tbody>
                            <tr>
                              <td><?php echo $row["id"]; ?></td>
                              <td><?php echo $row["dept_name"]; ?></td>

                              

                              <td><?php echo $status ?></td>

                                <td>
                    <button data-toggle="modal" data-target="#deleteModal<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm ml-1"><i class="fa fa-trash"></i></button>
                </td>
            </tr>

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
                            <a href="id_dept.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Confirm</a>
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


   <div class="col-md-6">

            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Department</h3>

                
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">

                   <?php 
              
              if (isset($_POST['submit'])) {
              echo $idCard->dept_add($_POST);
               echo "<script>window.location.replace('id_dept.php')</script>";
              }
               ?>
              
                <div class="form-group ">
                    <label for="dept_name">Department Name</label>
                    <input type="text" class="form-control" name="dept_name" id="dept_name" placeholder="Enter New Department Name">
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
