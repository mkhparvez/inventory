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
              $id = $_GET['id'];
               if (isset($_POST['update'])) {
               echo $idCard->update($id, $_POST);
              }
                            
              $obj = $idCard->allID_card($id);
              $row = $obj;

              // Fetch departments
              $dept = $idCard->findDept();
              $designation = $idCard->findDesig();

                 
               ?>


                  
                  <div class="form-group">
                    <label for="pf_no">PF Number</label>
                    <input type="text" class="form-control" name="pf_no" id="pf_no" placeholder="Enter Employee PF Number" value="<?php echo $row['pf_no'] ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Employee Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Employee Name" value="<?php echo $row['name'] ?>">
                  </div>
                  
                  <div class="form-group designation">
                      <label for="designation">Designation</label>
                      <select class="form-control" id="designation" name="designation">
                          <?php
                          if ($designation->num_rows > 0) {
                              while ($rows = $designation->fetch_assoc()) {
                                  // Check if the fetched designation matches the employee's current designation
                                  $selected = ($rows['designation'] == $row['designation']) ? 'selected' : '';
                                  echo '<option value="' . $rows['designation'] . '" ' . $selected . '>' . $rows['designation'] . '</option>';
                              }
                          } else {
                              echo '<option value="">No Designation Available</option>';
                          }
                          ?>
                      </select>
                  </div>


                  <div class="form-group department">
                      <label for="department">Department</label>
                      <select class="form-control" id="department" name="department">
                          <?php
                          if ($dept->num_rows > 0) {
                              while ($rows = $dept->fetch_assoc()) {
                                  // Correct the comparison to use $row['department'], as that is likely the employee's department column
                                  $selected = ($rows['dept_name'] == $row['department']) ? 'selected' : '';
                                  echo '<option value="' . $rows['dept_name'] . '" ' . $selected . '>' . $rows['dept_name'] . '</option>';
                              }
                          } else {
                              echo '<option value="">No Department Available</option>';
                          }
                          ?>
                      </select>
                  </div>


                  <div class="form-group unit">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" name="unit" id="unit" placeholder="Enter Salary Unit" value="<?php echo $row['unit'] ?>">
                  </div>

                  <div class="form-group blood_group">
                    <label for="blood_group">Blood Group</label>
                      <select class="form-control" id="blood_group" name="blood_group">
        <option value="0">Select Option</option>
        <option value="A +ve" <?php echo (isset($row['blood_group']) && $row['blood_group'] == 'A +ve') ? 'selected' : ''; ?>>A +ve</option>
        <option value="A -ve" <?php echo (isset($row['blood_group']) && $row['blood_group'] == 'A -ve') ? 'selected' : ''; ?>>A -ve</option>
        <option value="B +ve" <?php echo (isset($row['blood_group']) && $row['blood_group'] == 'B +ve') ? 'selected' : ''; ?>>B +ve</option>
        <option value="B -ve" <?php echo (isset($row['blood_group']) && $row['blood_group'] == 'B -ve') ? 'selected' : ''; ?>>B -ve</option>
        <option value="AB +ve" <?php echo (isset($row['blood_group']) && $row['blood_group'] == 'AB +ve') ? 'selected' : ''; ?>>AB +ve</option>
        <option value="AB -ve" <?php echo (isset($row['blood_group']) && $row['blood_group'] == 'AB -ve') ? 'selected' : ''; ?>>AB -ve</option>
        <option value="O +ve" <?php echo (isset($row['blood_group']) && $row['blood_group'] == 'O +ve') ? 'selected' : ''; ?>>O +ve</option>
        <option value="O -ve" <?php echo (isset($row['blood_group']) && $row['blood_group'] == 'O -ve') ? 'selected' : ''; ?>>O -ve</option>
    </select>
                  </div>

                  




      

  <!-- Employee Photo -->
<div class="form-group image_path">
    <?php if (isset($row['image_path']) && !empty($row['image_path'])): ?>
        <img src="ID_Card/EmpPic/<?php echo basename($row['image_path']); ?>" alt="Employee Photo" style="width:100px; height:auto; margin-bottom: 10px;">
        <p style="font-weight:700">Employee Photo</p>
    <?php else: ?>
        <p>No image available</p>
    <?php endif; ?>
    <input class="form-control px-1 py-1" type="file" name="image_path2">
    <!-- Keep the old image path hidden -->
    <input type="hidden" name="old_image_path" value="<?php echo $row['image_path']; ?>">
</div>

<!-- Employee Signature -->
<div class="form-group sign_path">
    <?php if (isset($row['sign_path']) && !empty($row['sign_path'])): ?>
        <img src="ID_Card/EmpSign/<?php echo basename($row['sign_path']); ?>" alt="Employee Signature" style="width:100px; height:auto; margin-bottom: 10px;">
        <p style="font-weight:700">Employee Signature</p>
    <?php else: ?>
        <p>No signature available</p>
    <?php endif; ?>
    <input class="form-control px-1 py-1" type="file" name="sign_path2">
    <!-- Keep the old signature path hidden -->
    <input type="hidden" name="old_sign_path" value="<?php echo $row['sign_path']; ?>">
</div>


        

                  <div class="form-group remark">
                    <label for="remark">Remarks</label>
                      <textarea class="form-control" name="remarks" id="remarks" placeholder="" value="<?php echo $row['remarks'] ?>"></textarea>
                  </div>         

                </div>
                <!-- /.card-body -->

                <div class="card-footer submit">
                  <button type="submit" name="update" class="btn btn-primary">Submit</button>
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
