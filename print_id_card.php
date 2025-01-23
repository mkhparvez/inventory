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
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">


            <!-- my Content -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Print ID Card</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <!-- form start -->
<form method="post" action="reports/id_card_print.php">
                <div class="card-body">



    <div class="form-group row">
        <div class="col-xs-4">
            <input class="form-control" name="pf_no" type="text" placeholder="Enter PF numbers separated by commas">
        </div>
        <div class="col-xs-2">
            <button type="submit" name="both" class="btn btn-primary">Print Both Side</button>
            <button type="submit" name="front" class="btn btn-primary">Print Front Side</button>
            <button type="submit" name="back" class="btn btn-primary">Print Back Side</button>
        </div>
    </div>



             



            

    

              </div>
              <!-- /.card-body -->
            </div>

</form>



              </div>
              <div class="col-md-2"></div>
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
