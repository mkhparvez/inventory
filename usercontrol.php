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

            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage All User Information</h3>

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
                      <th style="width: 15px">Sl_No</th>
                      <th>Department Name</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      include "classes/user_login.php";
                      $Login = new Login;
                      if (isset($_GET['active'])) {
                        $id =$_GET['active'];
                        $Login->active($id); 
                      }
                      if (isset($_GET['inactive'])) {
                        $id =$_GET['inactive'];
                        $Login->inactive($id); 
                      }
                      if (isset($_GET['id'])) {
                        $id =$_GET['id'];
                        $Login->delete($id); 
                      }
                      $obj = $Login->allLogin();
                      if($obj->num_rows > 0){ $sl=1;
                        while($row = $obj->fetch_assoc()){ 
                          if ($row["status"] == 1) {
                            $status = '<a href="usercontrol.php?active='.$row["id"].'" name="active" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                          }
                          else{
                            $status = '<a href="usercontrol.php?inactive='.$row["id"].'" name="inactive" class="btn btn-secondary btn-sm"><i class="fas fa-eye-slash"></i></a>';
                          }
                         ?>
                         
                          <tbody>
                            <tr>
                              <td><?php echo $sl ?></td>
                              <td><?php echo $row["dept"]; ?></td>
                              <td><?php echo $row["mName"]; ?></td>
                              <td><?php echo $row["email"]; ?></td>
                              <td><?php echo $row["phone"]; ?></td>
                              <td><?php echo $status ?></td>
                              <td>
                              <select class="form-control" id="role" name="role" disabled>
                         <?php  if ($row['role']==1) {
                           $role="Admin";
                         } elseif ($row['role']==2) {
                           $role="Editor";
                         } elseif ($row['role']==3) {
                           $role="Viewer";
                         }
                          ?>

                      <option><?php echo $role ?></option>
                      <option value="1">Admin</option>
                      <option value="2">Editor</option>
                      <option value="3">Viewer</option>
                    </select>
                    </td>

                              <td><a href="Loginedit.php?id=<?php echo $row['id'];  ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

                              <button data-toggle="modal" data-target="#delete<?php echo $row["id"] ?>" class="btn btn-danger btn-sm ml-1"><i class="fa fa-trash"></i></button></td>

                              


                            </tr>
                          </tbody>
                      <?php $sl++; ?>

                        <!-- Delete Modal -->
<div class="modal fade" id="delete<?php echo $row["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are sure want to delete this Login?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="usercontrol.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Confirm</a>
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

</body>
</html>
