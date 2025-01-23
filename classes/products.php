<?php 

/**
 * 
 */
class Product 
{
	private $con="";
	function __construct()
	{
		$this->con= new mysqli("localhost","root","","inventory");

	}

	function addNewProduct($allData){
		$product_cat = $allData["product_cat"];
		$brand = $allData["brand"];
		$model = $allData["model"];
		$sl_no = $allData["sl_no"];
		$inv_id = $allData["inv_id"];
		$processor = $allData["processor"];
		$ram = $allData["ram"];
		$hdd = $allData["hdd"];
    $mouse =  isset($allData["mouse"]) ? $allData["mouse"] : 0;
    $keyboard =  isset($allData["keyboard"]) ? $allData["keyboard"] : 0;
		$mon_size = $allData["mon_size"];
		$toner = $allData["toner"];
		$va = $allData["va"];
    $port = $allData["port"];
    $port_type = $allData["port_type"];
    $cam_type = $allData["cam_type"];
    $cam_res = $allData["cam_res"];
    $ip = $allData["ip"];
		$user = $allData["user"];
		$user_designation = $allData["user_designation"];
		$PF = $allData["PF"];
		$entry_user = $_SESSION['mName'];
		$dept_id = $allData["dept_id"];
		$location = $allData["location"];
		$status = $allData["status"];
		$remarks = $allData["remarks"];
        date_default_timezone_set('Asia/Dhaka'); 
      $entry_date = date("Y-m-d H:m:s");
      $last_edited = date("Y-m-d H:m:s");
      



    // Fetch the department name based on dept_id
    $dept_name = 'Not Defined'; // Default value if not found
    $dept_sql = $this->con->query("SELECT dept_name FROM tbl_dept WHERE id = '$dept_id'");
    if ($dept_sql && $dept_sql->num_rows > 0) {
        $dept_row = $dept_sql->fetch_assoc();
        $dept = $dept_row['dept_name'];
    }




    // Validate required fields

         if ($product_cat=="" || $dept_id=="" || $status=="" || $location=="" || $status=="" || $inv_id== "") {

         	return '<div class="alert alert-danger"><strong>Error: </strong>Please fill out all required fields.</div>';	

         }

         else {


		$sql = $this->con->query("INSERT INTO tbl_products (product_cat,brand,model,sl_no,inv_id,processor,ram ,hdd,mouse,keyboard,mon_size,toner,va,port,port_type,cam_type,cam_res,ip,user,user_designation,PF,entry_user,entry_date,last_edited,dept_id,dept,location,status,remarks) VALUES ('$product_cat','$brand','$model','$sl_no','$inv_id','$processor','$ram' ,'$hdd','$mouse','$keyboard','$mon_size','$toner','$va','$port','$port_type','$cam_type','$cam_res','$ip','$user','$user_designation','$PF','$entry_user','$entry_date','$last_edited','$dept_id','$dept','$location','$status','$remarks')");




    


		if ($sql) {
			return '<div class="alert alert-success"><strong>Success: </strong>Asset Successfully Added</div>';
		}

		else {
			return '<div class="alert alert-danger"><strong>Failed: </strong>Product Not Added</div>';			
		}
	}

	}

	function allProduct(){
			$sql = $this->con->query("SELECT * FROM tbl_products WHERE status !='4';");
			return $sql;			
		}

	function history($id){
    // $id = $_POST['id'];
			$sql = $this->con->query("SELECT * FROM tbl_history WHERE inv_id='$id' ORDER BY id ASC");
			return $sql;			
		}

//   function history1($id){
//       $sql = $this->con->query("SELECT h.*,p.*, p.remarks as product_remarks, h.remarks as history_remarks
// FROM tbl_history h 
// JOIN tbl_products p ON h.inv_id = p.inv_id
// ORDER BY h.trnsfr_date ASC, h.inv_id, h.curr_user, h.pre_user ASC;");
//       return $sql;      
//     }

	function ProductCount(){
			$sql = $this->con->query("SELECT (SELECT COUNT( *) FROM tbl_products WHERE `product_cat`=1) AS cpu,
       (SELECT COUNT( *) FROM tbl_products WHERE `product_cat`=2) AS laptop,
       (SELECT COUNT( *) FROM tbl_products WHERE `product_cat`=3) AS monitor,
       (SELECT COUNT( *) FROM tbl_products WHERE `product_cat`=4) AS printer,
       (SELECT COUNT( *) FROM tbl_products WHERE `mouse`=1) AS mouse,
       (SELECT COUNT( *) FROM tbl_products WHERE `keyboard`=1) AS keyboard,
       (SELECT COUNT( *) FROM tbl_products WHERE `product_cat`=7) AS ups,
       (SELECT COUNT( *) FROM tbl_products WHERE `product_cat`=8) AS cash_drawer,
       (SELECT COUNT( *) FROM tbl_products WHERE `product_cat`=9) AS pos,
       (SELECT COUNT( *) FROM tbl_products WHERE `status`=1) AS useable,
       (SELECT COUNT( *) FROM tbl_products WHERE `status`=2) AS damaged,
       (SELECT COUNT( *) FROM tbl_products WHERE `status`=3) AS repair;");
			return $sql;			
		}

		function active($id){
			$sql = $this->con->query("UPDATE tbl_products SET status='0' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('manageproduct.php')</script>";		
		}

		function inactive($id){
			$sql = $this->con->query("UPDATE tbl_products SET status='1' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('manageproduct.php')</script>";		
		}

		function delete($inv_id){
			$sql = $this->con->query("DELETE FROM tbl_products WHERE inv_id='$inv_id'");
			return $sql;			
			echo "<script>window.location.replace('manageproduct.php')</script>";		
		}

		function findProduct($id){
			$sql = $this->con->query("SELECT * FROM tbl_products WHERE inv_id='$id'");
			$sql2= $this->history($id);
			if ($sql->num_rows > 0 || $sql2->num_rows > 0) {
			$sql = $sql->fetch_assoc();
			$sql2 = $sql2->fetch_assoc();
				return $sql;
				return $sql2;
			} else {
				
				return "Errror";
			}
			
			
		}

		function findProducts($id){
			$sql = $this->con->query("SELECT * FROM tbl_products WHERE inv_id='$id'");
			$sql = $sql->fetch_assoc();
			return $sql;

		}

		function updateProduct($allData, $id){
			// $name = $allData["name"];
			// $des = $allData["des"];
			// $size = $allData["size"];
			// $color = $allData["color"];
			// $barcode = $allData["barcode"];
			// $costPrice = $allData["costPrice"];
			// $salePrice = $allData["salePrice"];

			// $sql = $this->con->query("UPDATE tbl_products SET name = '$name', des = '$des', size = '$size', color = '$color', barcode = '$barcode', costPrice = '$costPrice', salePrice = '$salePrice' WHERE inv_id='$id'");

		
		$product_cat = $allData["product_cat"];
		$brand = $allData["brand"];
		$model = $allData["model"];
		$sl_no = $allData["sl_no"];
		$inv_id = $allData["inv_id"];
		$processor = $allData["processor"];
		$ram = $allData["ram"];
		$hdd = $allData["hdd"];
		$mon_size = $allData["mon_size"];
		$toner = $allData["toner"];
		$va = $allData["va"];
		$ip = $allData["ip"];
		$user = $allData["user"];
		$user_designation = $allData["user_designation"];
		$PF = $allData["PF"];
		$entry_user = $_SESSION['mName'];
		$dept = $allData["dept"];
		$location = $allData["location"];
		$status = $allData["status"];
		$remarks = $allData["remarks"];
    $last_edited = date("Y-m-d H:m:s");

   

    // Fetch the department name based on dept_id
    $dept_id = '0'; // Default value if not found
    $dept_sql = $this->con->query("SELECT dept_name FROM tbl_dept WHERE dept_name = '$dept'");
    if ($dept_sql && $dept_sql->num_rows > 0) {
        $dept_row = $dept_sql->fetch_assoc();
        $dept_id = $dept_row['id'];
    }


				

       if ($status == 'Useable') {
                            $status = '1';
                          }
                          elseif ($status == 'Damaged') {
                            $status = '2';
                          }
                          elseif ($status == 'Need to Repair') {
                            $status = '3';
                          }
                          else{
                            $status = 'Not Defiend';
                          }









        $sql = $this->con->query("UPDATE tbl_products SET product_cat = '$product_cat', brand = '$brand', model = '$model', sl_no = '$sl_no', processor = '$processor', ram = '$ram', hdd = '$hdd', mon_size = '$mon_size', toner = '$toner', va = '$va', ip = '$ip', user = '$user', user_designation = '$user_designation', PF = '$PF', dept_id = '$dept_id', dept = '$dept', location = '$location',last_edited = '$last_edited', status = '$status', remarks = '$remarks' WHERE inv_id='$id'");



			echo "<script>window.location.replace('manageproduct.php')</script>";
			
		}





function transfer($allData){
		
		$sl_no = $allData["sl_no"];
		$inv_id = $allData["inv_id"];
		$user = $allData["user"];
		$new_user = $allData["new_user"];
		$entry_user = $_SESSION['mName'];
		$new_dept = $allData["new_dept"];
		$dept = $allData["dept"];
		$location = $allData["location"];
		$new_location = $allData["new_location"];
		// $user_designation = $allData["user_designation"];
		// $PF = $allData["PF"];
		$status = $allData["status"];
		$remarks = $allData["remarks"];
    // $g_pass = $allData["g_pass"];
        date_default_timezone_set('Asia/Dhaka'); 
    	$date = date("Y-m-d H:m:s");
      $last_edited = date("Y-m-d H:m:s");

      if(isset($allData["g_pass"])){
        $g_pass = $allData["g_pass"];
    } else {
        $g_pass = 0; // set a default value
    }





    // Fetch the department name based on dept_id
    $dept_name = 'Not Defined'; // Default value if not found
    $dept_sql = $this->con->query("SELECT dept_name FROM tbl_dept WHERE id = '$new_dept'");
    if ($dept_sql && $dept_sql->num_rows > 0) {
        $dept_row = $dept_sql->fetch_assoc();
        $newDept = $dept_row['dept_name'];
    }




         if ($new_user=="" || $new_dept=="" || $newDept=="" || $new_location=="" || $status=="" || $inv_id== "") {

         	return '<div class="alert alert-danger"><strong>Error: </strong>Please fill out all required fields.</div>';	

         }

  else {

         if ($status == '4') {

          $sql = $this->con->query("UPDATE tbl_products SET user = '$new_user', dept_id = '$new_dept', dept = '$newDept', location = '$new_location', last_edited = '$last_edited', status = '$status' WHERE inv_id='$inv_id'");


        $sql = $this->con->query("INSERT INTO tbl_history (inv_id, curr_user, pre_user, curr_dept, pre_dept, curr_loc, pre_loc, remarks, entry_user, trnsfr_date,scrap) VALUES ('$inv_id', '$new_user', '$user', '$new_dept', '$dept', '$new_location', '$location', '$remarks', '$entry_user', '$date','1')");
        // return '<div class="alert alert-warning"><strong>Warning: </strong>Asset transfer failed because status is 4</div>';
    
    }


    else {

 $sql = $this->con->query("UPDATE tbl_products SET user = '$new_user', dept_id = '$new_dept', dept = '$newDept', location = '$new_location', user_designation = NULL, PF = NULL, status = '$status' WHERE inv_id='$inv_id'");




  $sql = $this->con->query("INSERT INTO tbl_history (inv_id ,curr_user,pre_user,curr_dept,pre_dept,curr_loc,pre_loc,remarks,entry_user,trnsfr_date,scrap) VALUES ('$inv_id ','$new_user','$user','$newDept','$dept','$new_location','$location','$remarks','$entry_user','$date','0')");
        // $sql = $this->history($inv_id,$new_user,$user,$new_location,$location,$remarks,$entry_user,$date);

      // echo "<script>window.location.replace('manageproduct.php')</script>";

      if($g_pass) {
      echo "<script>window.location.replace('gatepass.php?id=$inv_id')</script>";
      } else {
     echo "<script>window.location.replace('manageproduct.php')</script>";
            }


  
    }

  }



		if ($sql) {
			// return '<div class="alert alert-success"><strong>Success: </strong>Asset Transfer Successful</div>';
		}

		else {
			return '<div class="alert alert-danger"><strong>Error: </strong>Asset Transfer Failed</div>';			
		}

         


			
			

}


  function g_pass($id){
      $sql = $this->con->query("SELECT * FROM `tbl_gpass` WHERE gp_id='$id' ORDER BY id ASC");
      return $sql;      
    }




function addItem($pdate, $gp_id, $inv_id, $brand, $model, $sl_no, $spec, $location, $new_loc, $dept, $new_dept, $r_name, $r_desig, $company, $remarks){

    if ($pdate=="" || $gp_id=="" || $inv_id=="" || $brand=="" || $model=="" || $sl_no== "") {

      return json_encode(array("status" => "error", "message" => "Missing required fields"));
    }

    else {
      $sql = $this->con->query("INSERT INTO tbl_gpass (pdate, gp_id, inv_id, brand, model, sl_no, spec, pre_loc, new_loc, dept, new_dept, r_name, r_desig, company, remarks) VALUES ('$pdate', '$gp_id', '$inv_id', '$brand', '$model', '$sl_no', '$spec', '$location', '$new_loc', '$dept', '$new_dept', '$r_name', '$r_desig', '$company', '$remarks')");
    // $sql = $this->stockupdateInsert($product_id,$qnt,$br_id);


    if ($sql) {
      return json_encode(array("status" => "success", "message" => "Item added successfully"));
    }
    else{
      return json_encode(array("status" => "error", "message" => "Failed to add item"));
    }

    }

}



  // function addItem($pdate, $gp_id, $inv_id, $brand, $model, $sl_no, $spec){

  //   if ($pdate=="" || $gp_id=="" || $inv_id=="" || $brand=="" || $model=="" || $sl_no== "") {

  //     return "400";
  //   }

  //   else {
  //     $sql = $this->con->query("INSERT INTO tbl_gpass (pdate, gp_id, inv_id, brand, model, sl_no, spec) VALUES ('$pdate', '$gp_id', '$inv_id','$brand', '$model', '$sl_no', '$spec')");
  //   // $sql = $this->stockupdateInsert($product_id,$qnt,$br_id);


  //   if ($sql) {
  //     return "200";
  //   }
  //   else{
  //     return "400";
  //   }

  //   }

  // }



  function showItem($gp_id){
    $sql = $this->con->query("SELECT * FROM tbl_gpass WHERE gp_id = '$gp_id'");
    return $sql;

  }



  function removeItem($id){
    $sql = $this->con->query("DELETE FROM tbl_gpass WHERE id = '$id'");
    return $sql;
  }


   function generateGPID() {
    // get current year
    $currentYear = date('y');

    // query to get the latest GP ID from database
    $query = "SELECT gp_id FROM tbl_gpass WHERE gp_id LIKE '%/{$currentYear}' ORDER BY gp_id DESC LIMIT 1";
    $result = mysqli_query($this->con, $query);

    if (mysqli_num_rows($result) > 0) {
        // if there are records, extract the last number and increment it
        $lastGPID = mysqli_fetch_assoc($result)['gp_id'];
        $lastNumber = explode('/', $lastGPID)[0];
        $newNumber = $lastNumber + 1;
        $newGPID = $newNumber . "/{$currentYear}";
    } else {
        // if there are no records, set the GP ID to 1/Current Year
        $newGPID = "1/{$currentYear}";
    }

    // return the new GP ID
    return $newGPID;
  }













		}
 ?>