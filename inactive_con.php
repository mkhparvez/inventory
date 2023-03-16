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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage All Shops Information</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="container">


    <?php
// $con=mysqli_connect('localhost','root','','inventory');
// $res=mysqli_query($con,"SELECT * FROM `shop` WHERE status='0' ORDER BY `Level` ASC, `Block` ASC,`Shop_Number` ASC;");

// if ($res->num_rows > 0) {
//   // code...

    include "classes/shop.php";
                      $shop = new Shop;
                      if (isset($_GET['active'])) {
                        $id =$_GET['active'];
                        $shop->active($id); 
                      }
                      if (isset($_GET['inactive'])) {
                        $id =$_GET['inactive'];
                        $shop->inactive($id); 
                      }
                      if (isset($_GET['id'])) {
                        $id =$_GET['id'];
                        $shop->delete($id); 
                      }
                      $obj = $shop->findInactive();
                      if($obj->num_rows > 0){ $sl=1;
                        while($row = $obj->fetch_assoc()){ 
                          if ($row["status"] == 1) {
                            $status = '<a href="inactive_con.php?active='.$row["id"].'" name="active" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';
                          }
                          else{
                            $status = '<a href="inactive_con.php?inactive='.$row["id"].'" name="inactive" class="btn btn-success btn-sm">Activate</a>';
                          }

                          ?>

    <table id="active_con" class="table table-dark table-responsive">
    <thead>
      <tr>
        <th>Shop Name</th>
        <th>Shop_No.</th>
        <th>Level</th>
        <th>Block</th>
        <th>POP</th>
        <th>IP_Address</th>
        <th>Subnet</th>
        <th>Gateway</th>
        <th>ONU_MAC</th>
        <th>ONU_Serial</th>
        <th>OLT Port</th>
        <th>Action</th>
        <!-- <th style="display:none;">Address</th> -->
        <!-- <th>City</th> -->
      </tr>
    </thead>
    <tbody>
      
     
       <tr>
        <td><?php echo $row['Shop_Name']?></td>
        <td><?php echo $row['Shop_Number']?></td>
        <td><?php echo $row['Level']?></td>
        <td><?php echo $row['Block']?></td>
        <td><?php echo $row['POP']?></td>
        <td><?php echo $row['IP_Address']?></td>
        <td><?php echo $row['Subnet']?></td>
        <td><?php echo $row['Gateway']?></td>
        <td><?php echo $row['ONU_MAC']?></td>
        <td><?php echo $row['ONU_Serial']?></td>
        <td><?php echo $row['OLT_Port']?></td>
        <td><?php echo $status?></td>
        <!-- <td style="display:none;"><?php echo $row['sl_no']?></td> -->
      </tr>
      <?php }  ?>
    </thead>
    </table>
   </div>

   <?php 
   } else {
    ?>
  <h5 class="text-center bg-danger mt-3">Data Not Found</h5>

<?php
}
?>

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
  $(document).ready( function () {
    $('#active_tbl').DataTable();
  });
  </script>

</body>
</html>
