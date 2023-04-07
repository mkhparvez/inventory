<?php 

/**
 * 
 */
class Shop 
{
	private $con="";
	function __construct()
	{
		$this->con= new mysqli("localhost","root","","inventory");

	}

	function addNewConn($allData){
		$Level = $allData["Level"];
		$Block = $allData["Block"];
		$Shop_Number = $allData["Shop_Number"];
		$Shop_Name = $allData["Shop_Name"];
		$POP = $allData["POP"];
		$Bandwidth = $allData["Bandwidth"];
		$IP_Address = $allData["IP_Address"];
		$Subnet = $allData["Subnet"];
		$Gateway = $allData["Gateway"];
		$Connection_Date = $allData["Connection_Date"];
		$Connection_Type = $allData["Connection_Type"];;
		$Bill_Month = $allData["Bill_Month"];
		$ONU_MAC = $allData["ONU_MAC"];
		$ONU_Serial = $allData["ONU_Serial"];
		$entry_user = $_SESSION['mName'];
		$TJB = $allData["TJB"];
		$OLT_Port = $allData["OLT_Port"];
		$Remarks = $allData["Remarks"];
    // $status = $allData["status"];
    date_default_timezone_set('Asia/Dhaka'); 
      $date = date("Y-m-d H:m:s");


						
 if ($IP_Address == "") {
    $field_name = "IP_Address";
} elseif ($Subnet == "") {
    $field_name = "Subnet Mask";
} elseif ($Gateway == "") {
    $field_name = "Gateway";
} elseif ($POP == "") {
    $field_name = "POP Location";
} elseif ($Shop_Name== "") {
    $field_name = "Shop_Name";
} 

if (isset($field_name)) {
    return "<div class='alert alert-danger'><strong>Error:</strong> Please fill $field_name fields.</div>";

} else {
    $sql = $this->con->query("INSERT INTO shop (Level,Block,Shop_Number,Shop_Name,POP,Bandwidth,IP_Address ,Subnet,Gateway,Connection_Date,Connection_Type,Bill_Month,ONU_MAC,ONU_Serial,entry_user,TJB,OLT_Port,status,Remarks,entry_date) VALUES ('$Level','$Block','$Shop_Number','$Shop_Name','$POP','$Bandwidth','$IP_Address' ,'$Subnet','$Gateway','$Connection_Date','$Connection_Type','$Bill_Month','$ONU_MAC','$ONU_Serial','$entry_user','$TJB','$OLT_Port','1','$Remarks','$date')");

    if ($sql) {
        return '<div class="alert alert-success"><strong>Success: </strong>Asset Successfully Added</div>';
    } 
    else {
        return '<div class="alert alert-danger"><strong>Failed: </strong>Product Not Added</div>';      
    }
}


	}

	function allConnection(){
			$sql = $this->con->query("SELECT * FROM `shop` ");
			return $sql;			
		}

  function findActive(){
      $sql = $this->con->query("SELECT * FROM `shop` WHERE status='1' ORDER BY `Level` ASC, `Block` ASC,`Shop_Number` ASC");
      return $sql;      
    }

  function findInactive(){
      $sql = $this->con->query("SELECT * FROM `shop` WHERE status='0' ORDER BY `Level` ASC, `Block` ASC,`Shop_Number` ASC");
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
			$sql = $this->con->query("UPDATE shop SET status='0' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('dashboard.php')</script>";		
		}

		function inactive($id){
			$sql = $this->con->query("UPDATE shop SET status='1' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('dashboard.php')</script>";		
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

		function findConn($id){
			$sql = $this->con->query("SELECT * FROM shop WHERE id='$id'");
			$sql = $sql->fetch_assoc();
			return $sql;

		}

		function updateCon($allData, $id){


		$Level = $allData["Level"];
    $Block = $allData["Block"];
    $Shop_Number = $allData["Shop_Number"];
    $Shop_Name = $allData["Shop_Name"];
    $POP = $allData["POP"];
    $Bandwidth = $allData["Bandwidth"];
    $IP_Address = $allData["IP_Address"];
    $Subnet = $allData["Subnet"];
    $Gateway = $allData["Gateway"];
    $Connection_Date = $allData["Connection_Date"];
    $Connection_Type = $allData["Connection_Type"];;
    $Bill_Month = $allData["Bill_Month"];
    $ONU_MAC = $allData["ONU_MAC"];
    $ONU_Serial = $allData["ONU_Serial"];
    $entry_user = $_SESSION['mName'];
    $TJB = $allData["TJB"];
    $OLT_Port = $allData["OLT_Port"];
    $Remarks = $allData["Remarks"];
    // $status = $allData["status"];
    date_default_timezone_set('Asia/Dhaka'); 
      $date = date("Y-m-d H:m:s");





        $sql = $this->con->query("UPDATE shop SET Level = '$Level', Block = '$Block', Shop_Number = '$Shop_Number', Shop_Name = '$Shop_Name', POP = '$POP', Bandwidth = '$Bandwidth', IP_Address = '$IP_Address', Subnet = '$Subnet', Gateway = '$Gateway', Connection_Date = '$Connection_Date', Connection_Type = '$Connection_Type', Bill_Month = '$Bill_Month', ONU_MAC = '$ONU_MAC', ONU_Serial = '$ONU_Serial', entry_user = '$entry_user', TJB = '$TJB', OLT_Port = '$OLT_Port', Remarks = '$Remarks', updateDate = '$date' WHERE id='$id'");

			echo "<script>window.location.replace('active_con.php')</script>";
			
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
                          else{
                            $newDept = 'Not Defiend';
                          }


         if ($new_user=="" || $new_dept=="" || $newDept=="" || $new_location=="" || $status=="" || $inv_id== "") {

         	return '<div class="alert alert-danger"><strong>Error: </strong>Please fill out all required fields.</div>';	

         }

         else {

         	$sql = $this->con->query("UPDATE tbl_products SET user = '$new_user', dept_id = '$new_dept', dept = '$newDept', location = '$new_location', status = '$status' WHERE inv_id='$inv_id'");


        $sql = $this->con->query("INSERT INTO tbl_history (inv_id ,curr_user,pre_user,curr_loc,pre_loc,remarks,entry_user,trnsfr_date) VALUES ('$inv_id ','$new_user','$user','$new_location','$location','$remarks','$entry_user','$date')");
        // $sql = $this->history($inv_id,$new_user,$user,$new_location,$location,$remarks,$entry_user,$date);

			echo "<script>window.location.replace('manageproduct.php')</script>";



		if ($sql) {
			// return '<div class="alert alert-success"><strong>Success: </strong>Asset Transfer Successful</div>';
		}

		else {
			return '<div class="alert alert-danger"><strong>Error: </strong>Asset Transfer Failed</div>';			
		}

         }

        
			
			
		}



		}
 ?>