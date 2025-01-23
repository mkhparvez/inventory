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
            <h1 class="m-0">New ID Card Entry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">ID Card</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ID Card</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">

              <?php 
              include 'classes/id_card.php';
              $idCard = new IDCard;
              if (isset($_POST['submit'])) {
               echo $idCard->addNewCard($_POST, $_FILES); // Pass both POST and FILES data
              }


               // Fetch departments
                  $dept = $idCard->findDept();
                  $designation = $idCard->findDesig();
                  // $product_type = $idCard->allProducts_types();
                 

                 
               ?>


                  
                  <div class="form-group">
                    <label for="pf_no">PF Number</label>
                    <input type="text" class="form-control" name="pf_no" id="pf_no" placeholder="Enter Employee PF Number">
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Employee Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Employee Name">
                  </div>



                  <div class="form-group designation">
                    <label for="designation">Designation</label>
                      <select class="form-control" id="designation" name="designation">
                      <option>Select Designation</option>
                      <?php
                        if ($designation->num_rows > 0) {
                            while ($rows = $designation->fetch_assoc()) {
                                echo '<option value="' . $rows['designation'] . '">' . $rows['designation'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No Designation Available</option>';
                        }
                        ?>
                    </select>
                  </div>

                  
<!--                   <div class="form-group">
                    <label for="designation">Employee Designation</label>
                    <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Employee Designation">
                  </div> -->

<!--                   <div class="form-group department">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" name="department" id="department" placeholder="Select Department">
                  </div> -->




                  <div class="form-group department">
                    <label for="department">Department</label>
                      <select class="form-control" id="department" name="department">
                      <option>Select Department</option>
                      <?php
                        if ($dept->num_rows > 0) {
                            while ($rows = $dept->fetch_assoc()) {
                                echo '<option value="' . $rows['dept_name'] . '">' . $rows['dept_name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No Department Available</option>';
                        }
                        ?>
                    </select>
                  </div>



                  <div class="form-group unit">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" name="unit" id="unit" placeholder="Enter Salary Unit" value="BCDL">
                  </div>

                  <div class="form-group blood_group">
                    <label for="blood_group">Blood Group</label>
                      <select class="form-control" id="blood_group" name="blood_group">
                      <option value="0">Select Option</option>
                      <option value="A +ve">A +ve</option>
                      <option value="A -ve">A -ve</option>
                      <option value="B +ve">B +ve</option>
                      <option value="B -ve">B -ve</option>
                      <option value="AB +ve">AB +ve</option>
                      <option value="AB -ve">AB -ve</option>
                      <option value="O +ve">O +ve</option>
                      <option value="O -ve">O -ve</option>
                    </select>
                  </div>

                  




      

                  <div class="image_path">
                    <label for="image_path">Employee Photo</label>
                      <!-- <textarea class="form-control" name="image_path" id="image_path" placeholder=""></textarea> -->
                      <input class="form-control px-1 py-1"  type="file" name="image_path" required>
                  </div>  

                  <div class="sign_path">
                    <label for="sign_path">Employee Signature</label>
                      <!-- <textarea class="form-control" name="sign_path" id="sign_path" placeholder=""></textarea> -->
                      <input class="form-control px-1 py-1"  type="file" name="sign_path" required>
                  </div>  

                  <div class="form-group remark">
                    <label for="remark">Remarks</label>
                      <textarea class="form-control" name="remark" id="remark" placeholder=""></textarea>
                  </div>  
       

                </div>
                <!-- /.card-body -->

                <div class="card-footer submit">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
