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
		$mon_size = $allData["mon_size"];
		$toner = $allData["toner"];
		$va = $allData["va"];;
		$user = $allData["user"];
		$user_designation = $allData["user_designation"];
		$PF = $allData["PF"];
		$entry_user = $_SESSION['mName'];
		$dept_id = $allData["dept_id"];
		$location = $allData["location"];
		$status = $allData["status"];
		$remarks = $allData["remarks"];


						if ($dept_id == 1) {
                            $dept = 'Admin';
                          }
                          elseif ($dept_id == 2) {
                            $dept = 'Accounts';
                          }
                          elseif ($dept_id == 3) {
                            $dept = 'Care & Clean';
                          }
                          elseif ($dept_id == 4) {
                            $dept = 'Carparking';
                          }
                          elseif ($dept_id == 5) {
                            $dept = 'Civil';
                          }
                          elseif ($dept_id == 6) {
                            $dept = 'Electrical';
                          }
                          elseif ($dept_id == 7) {
                            $dept = 'Fire';
                          }
                          elseif ($dept_id == 8) {
                            $dept = 'IT';
                          }
                          elseif ($dept_id == 9) {
                            $dept = 'Mechanical';
                          }
                          elseif ($dept_id == 10) {
                            $dept = 'SCD';
                          }
                          elseif ($dept_id == 11) {
                            $dept = 'Security';
                          }
                          elseif ($dept_id == 12) {
                            $dept = 'Toggi Fun World';
                          }
                          elseif ($dept_id == 13) {
                            $dept = 'Store';
                          }
                          elseif ($dept_id == 14) {
                            $dept = 'Food Court';
                          }
                          else{
                            $dept = 'Not Defiend';
                          }

         if ($product_cat=="" || $dept_id=="" || $status=="" || $location=="" || $status=="" || $inv_id== "") {

         	return '<div class="alert alert-danger"><strong>Error: </strong>Please fill out all required fields.</div>';	

         }

         else {


		$sql = $this->con->query("INSERT INTO tbl_products (product_cat,brand,model,sl_no,inv_id,processor,ram ,hdd,mon_size,toner,va,user,user_designation,PF,entry_user,dept_id,dept,location,status,remarks) VALUES ('$product_cat','$brand','$model','$sl_no','$inv_id','$processor','$ram' ,'$hdd','$mon_size','$toner','$va','$user','$user_designation','$PF','$entry_user','$dept_id','$dept','$location','$status','$remarks')");


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
			$sql = $this->con->query("SELECT * FROM tbl_history WHERE inv_id='$id' ORDER BY id ASC");
			return $sql;			
		}

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
		$va = $allData["va"];;
		$user = $allData["user"];
		$user_designation = $allData["user_designation"];
		$PF = $allData["PF"];
		$entry_user = $_SESSION['mName'];
		$dept = $allData["dept"];
		$location = $allData["location"];
		$status = $allData["status"];
		$remarks = $allData["remarks"];


						if ($dept == 'Admin') {
                            $dept_id = 1;
                          }
                          elseif ($dept == 'Accounts') {
                            $dept_id = 2;
                          }
                          elseif ($dept == 'Care & Clean') {
                            $dept_id = 3;
                          }
                          elseif ($dept == 'Carparking') {
                            $dept_id = 4;
                          }
                          elseif ($dept == 'Civil') {
                            $dept_id = 5;
                          }
                          elseif ($dept == 'Electrical') {
                            $dept_id = 6;
                          }
                          elseif ($dept == 'Fire') {
                            $dept_id = 7;
                          }
                          elseif ($dept == 'IT') {
                            $dept_id = 8;
                          }
                          elseif ($dept == 'Mechanical') {
                            $dept_id = 9;
                          }
                          elseif ($dept == 'SCD') {
                            $dept_id = 10;
                          }
                          elseif ($dept == 'Security') {
                            $dept_id = 11;
                          }
                          elseif ($dept == 'Toggi Fun World') {
                            $dept_id = 12;
                          }
                          elseif ($dept == 'Store') {
                            $dept_id = 13;
                          }
                          elseif ($dept == 'Food Court') {
                            $dept_id = 14;
                          }
                          else{
                            $dept_id = '0';
                          }



          if ($product_cat == 'CPU' || $product_cat == '1') {
                            $product_cat = '1';
                          }
                          elseif ($product_cat == 'Laptop' || $product_cat == '2') {
                            $product_cat = '2';
                          }
                          elseif ($product_cat == 'Monitor' || $product_cat == '3') {
                            $product_cat = '3';
                          }

                          elseif ($product_cat == 'Printer' || $product_cat == '4') {
                            $product_cat = '4';
                          }
                          elseif ($product_cat == 'Mouse' || $product_cat == '5') {
                            $product_cat = '5';
                          }
                          elseif ($product_cat == 'Keyboard' || $product_cat == '6') {
                            $product_cat = '6';
                          }
                          elseif ($product_cat == 'UPS' || $product_cat == '7') {
                            $product_cat = '7';
                          }
                          elseif ($product_cat == 'Cash Drawer' || $product_cat == '8') {
                            $product_cat = '8';
                          }
                          elseif ($product_cat == 'POS Terminal' || $product_cat == '9') {
                            $product_cat = '9';
                          }
                          else{
                            $product_cat = 'Not Defiend';
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









        $sql = $this->con->query("UPDATE tbl_products SET product_cat = '$product_cat', brand = '$brand', model = '$model', sl_no = '$sl_no', processor = '$processor', ram = '$ram', hdd = '$hdd', mon_size = '$mon_size', toner = '$toner', va = '$va', user = '$user', user_designation = '$user_designation', PF = '$PF', dept_id = '$dept_id', dept = '$dept', location = '$location', status = '$status', remarks = '$remarks' WHERE inv_id='$id'");



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
		$status = $allData["status"];
		$remarks = $allData["remarks"];
        date_default_timezone_set('Asia/Dhaka'); 
    	$date = date("Y-m-d H:m:s");




						if ($new_dept == 1) {
                            $newDept = 'Admin';
                          }
                          elseif ($new_dept == 2) {
                            $newDept = 'Accounts';
                          }
                          elseif ($new_dept == 3) {
                            $newDept = 'Care & Clean';
                          }
                          elseif ($new_dept == 4) {
                            $newDept = 'Carparking';
                          }
                          elseif ($new_dept == 5) {
                            $newDept = 'Civil';
                          }
                          elseif ($new_dept == 6) {
                            $newDept = 'Electrical';
                          }
                          elseif ($new_dept == 7) {
                            $newDept = 'Fire';
                          }
                          elseif ($new_dept == 8) {
                            $newDept = 'IT';
                       	  }
                    	  elseif ($new_dept == 9) {
                            $newDept = 'Mechanical';
                          }
                          elseif ($new_dept == 10) {
                            $newDept = 'SCD';
                          }
                          elseif ($new_dept == 11) {
                            $newDept = 'Security';
                          }
                          elseif ($new_dept == 12) {
                            $newDept = 'Toggi Fun World';
                          }
                          elseif ($new_dept == 13) {
                            $newDept = 'Store';
                          }
                          elseif ($new_dept == 14) {
                            $newDept = 'Food Court';
                          }
                          elseif ($new_dept == 15) {
                            $newDept = 'Transport';
                          }
                          elseif ($new_dept == 16) {
                            $newDept = 'Customar Service';
                          }
                          elseif ($new_dept == 17) {
                            $newDept = 'Branding & Mkt.';
                          }
                          elseif ($new_dept == 20) {
                            $newDept = 'No Department';
                          }
                          else{
                            $newDept = 'Not Defiend';
                          }

           


         if ($new_user=="" || $new_dept=="" || $newDept=="" || $new_location=="" || $status=="" || $inv_id== "") {

         	return '<div class="alert alert-danger"><strong>Error: </strong>Please fill out all required fields.</div>';	

         }

  else {

         if ($status == '4') {

          $sql = $this->con->query("UPDATE tbl_products SET user = '$new_user', dept_id = '$new_dept', dept = '$newDept', location = '$new_location', status = '$status' WHERE inv_id='$inv_id'");


        $sql = $this->con->query("INSERT INTO tbl_history (inv_id, curr_user, pre_user, curr_dept, pre_dept, curr_loc, pre_loc, remarks, entry_user, trnsfr_date,scrap) VALUES ('$inv_id', '$new_user', '$user', '$new_dept', '$dept', '$new_location', '$location', '$remarks', '$entry_user', '$date','1')");
        // return '<div class="alert alert-warning"><strong>Warning: </strong>Asset transfer failed because status is 4</div>';
    
    }


    else {

  $sql = $this->con->query("UPDATE tbl_products SET user = '$new_user', dept_id = '$new_dept', dept = '$newDept', location = '$new_location', status = '$status' WHERE inv_id='$inv_id'");



  $sql = $this->con->query("INSERT INTO tbl_history (inv_id ,curr_user,pre_user,curr_dept,pre_dept,curr_loc,pre_loc,remarks,entry_user,trnsfr_date,scrap) VALUES ('$inv_id ','$new_user','$user','$newDept','$dept','$new_location','$location','$remarks','$entry_user','$date','0')");
        // $sql = $this->history($inv_id,$new_user,$user,$new_location,$location,$remarks,$entry_user,$date);

      echo "<script>window.location.replace('manageproduct.php')</script>";

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














  function addItem($pdate, $gp_id, $inv_id, $brand, $model, $sl_no, $spec){

    if ($pdate=="" || $gp_id=="" || $inv_id=="" || $brand=="" || $model=="" || $sl_no== "") {

      return "400";
    }

    else {
      $sql = $this->con->query("INSERT INTO tbl_gpass (pdate, gp_id, inv_id, brand, model, sl_no, spec) VALUES ('$pdate', '$gp_id', '$inv_id','$brand', '$model', '$sl_no', '$spec')");
    // $sql = $this->stockupdateInsert($product_id,$qnt,$br_id);


    if ($sql) {
      return "200";
    }
    else{
      return "400";
    }

    }

  }



  function showItem($gp_id){
    $sql = $this->con->query("SELECT * FROM tbl_gpass WHERE gp_id = '$gp_id'");
    return $sql;

  }



  function removeItem($id){
    $sql = $this->con->query("DELETE FROM tbl_gpass WHERE id = '$id'");
    return $sql;
  }













		}
 ?>