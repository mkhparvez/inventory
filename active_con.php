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
                <div class="container" style="margin-top:50px;">
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
        <th>OLT_Port</th>
        <!-- <th style="display:none;">Address</th> -->
        <!-- <th>City</th> -->
      </tr>
    </thead>
    <tbody>
      <?php
$con=mysqli_connect('localhost','root','','inventory');
$res=mysqli_query($con,"SELECT * FROM `shop` WHERE status='1' ORDER BY `Level` ASC, `Block` ASC,`Shop_Number` ASC;");
?>
      <?php while($row=mysqli_fetch_assoc($res)){?>
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
        <!-- <td style="display:none;"><?php echo $row['sl_no']?></td> -->
      </tr>
      <?php } ?>
    </thead>
    </table>
   </div>

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
//   $(document).ready(function () {
//     $('#active_con').DataTable({
//         order: [[3, 'desc']],
//     });
// });
  </script>

</body>
</html>
