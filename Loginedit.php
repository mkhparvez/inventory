  <?php 
    include "includes/header.php";
  ?>

  <!-- Preloader -->
    <?php                                                                             include "includes/loader.php";
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
            <h1 class="m-0">Login Data Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Login_edit</li>
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

            <?php
            include 'classes/user_login.php';
              $Login = new Login;
              $id = $_GET['id'];
              if (isset($_POST['update'])) {
                $Login->update($id,$_POST);
              }
              $obj = $Login->findLogin($id);
              $row = $obj->fetch_assoc();
                
            ?>

            <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="dept" placeholder="Login Name" value="<?php echo $row['dept'] ?> ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> 

         <div class="input-group mb-3">
          <input type="text" class="form-control" name="mName" placeholder="Manager Name" value="<?php echo $row['mName'] ?> ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $row['phone'] ?> ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email"value="<?php echo $row['email'] ?> ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <select class="form-control" id="role" name="role">
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
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="update"  class="btn btn-primary btn-block">Update</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


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
