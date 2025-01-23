<?php 

/**
 * 
 */
class Setup {
	private $con = "";
	function __construct()
	{
		$this->con= new mysqli("localhost","root","","inventory");
	}



	function addNewAssetType($allData){
    $type_name = $allData["type_name"];
    $brand = isset($allData["brand"]) ? $allData["brand"] : 0;
    $model = isset($allData["model"]) ? $allData["model"] : 0;
    $sl_no = isset($allData["sl_no"]) ? $allData["sl_no"] : 0;
    $processor = isset($allData["processor"]) ? $allData["processor"] : 0;
    $ram = isset($allData["ram"]) ? $allData["ram"] : 0;
    $storage = isset($allData["storage"]) ? $allData["storage"] : 0;
    $mouse = isset($allData["mouse"]) ? $allData["mouse"] : 0;
    $keyboard = isset($allData["keyboard"]) ? $allData["keyboard"] : 0;
    $mon_size = isset($allData["mon_size"]) ? $allData["mon_size"] : 0;
    $toner = isset($allData["toner"]) ? $allData["toner"] : 0;
    $ups = isset($allData["ups"]) ? $allData["ups"] : 0;
    $ip = isset($allData["ip"]) ? $allData["ip"] : 0;
    $port_type = isset($allData["port_type"]) ? $allData["port_type"] : 0;
    $cam_type = isset($allData["cam_type"]) ? $allData["cam_type"] : 0;

						

         if ($type_name=="") {

         	return '<div class="alert alert-danger"><strong>Error: </strong>Please fill out required fields.</div>';	

         }

         else {


		$sql = $this->con->query("INSERT INTO tbl_products_types (type_name,brand,model,sl_no,processor,ram ,storage,mouse,keyboard,mon_size,toner,ups,ip,port_type,cam_type) VALUES ('$type_name','$brand','$model','$sl_no','$processor','$ram' ,'$storage','$mouse','$keyboard','$mon_size','$toner','$ups','$ip','$port_type','$cam_type')");


		if ($sql) {
			return '<div class="alert alert-success"><strong>Success: </strong>Asset Successfully Added</div>';
		}

		else {
			return '<div class="alert alert-danger"><strong>Failed: </strong>Product Not Added</div>';			
		}
	}

	}




	function addBranch($allData){
		$dept= $allData["dept"];
		$mName= $allData["mName"];
		$phone= $allData["phone"];
		$email= $allData["email"];
		$password= $allData["password"];
		$rpassword= $allData["rpassword"];

		if ($password != $rpassword) {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Password not Matched.</div>';
		}
		elseif ($dept == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Branch Name</div>';
		}
		elseif ($mName == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Managers Name</div>';
		}
		elseif ($phone == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Phone Number</div>';
		}
		elseif ($email == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Email Address</div>';
		}

		else{
			$password = md5($password);
			$sql = $this->con->query("INSERT INTO tbl_products_types (dept,mName,email,phone,password)VALUES('$dept','$mName','$email','$phone','$password')");

			if ($sql) {
				return  '<div class="alert alert-success"><strong>Success: </strong>Registration Successful.</div>';
			}
		}
	}



		function login($allData){
			$userName = $allData["userName"];
			$password = $allData["password"];
			if($userName == ""){
				return '<div class="alert alert-danger"><strong>Error: </strong>User Name is Empty</div>';
			}
			elseif($password == ""){
				return '<div class="alert alert-danger"><strong>Error: </strong>Password is Empty</div>';
			}

			else{
				$password = md5($password);
				$sql = $this->con->query("SELECT * FROM tbl_products_types WHERE (mName='$userName' OR email = '$userName' OR phone = '$userName') AND password = '$password' AND status = '1'");
				if ($sql->num_rows > 0) {
					$sql = $sql->fetch_assoc();
					session_start();
					$_SESSION['id'] = $sql["id"];
					$_SESSION['dept'] = $sql["dept"];
					$_SESSION['mName'] = $sql["mName"];
					header("location: dashboard.php");
				}
				else{
					return '<div class="alert alert-danger"><strong>Error: </strong>User Name or Password not Found</div>';
				}
			}
		}

		function allProducts_types(){
			$sql = $this->con->query("SELECT * FROM tbl_products_types");
			return $sql;			
		}

		function active($id){
			$sql = $this->con->query("UPDATE tbl_products_types SET status='0' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('productTypes.php')</script>";		
		}

		function inactive($id){
			$sql = $this->con->query("UPDATE tbl_products_types SET status='1' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('productTypes.php')</script>";		
		}

		function delete($id){
			$sql = $this->con->query("DELETE FROM tbl_products_types WHERE id='$id'");
			return $sql;			
			echo "<script>window.location.replace('productTypes.php')</script>";		
		}

		function findBranch($id){
			$sql = $this->con->query("SELECT * FROM tbl_products_types WHERE id='$id'");
			return $sql;			
		}

		function update($id,$allData){
			$dept= $allData["dept"];
			$mName= $allData["mName"];
			$phone= $allData["phone"];
			$email= $allData["email"];
			$sql = $this->con->query("UPDATE tbl_products_types SET dept='$dept', mName='$mName', phone='$phone', email='$email' WHERE id='$id'");
			echo "<script>window.location.replace('productTypes.php')</script>";			
		}





		function findDept(){
			$sql = $this->con->query("SELECT * FROM tbl_dept");
			return $sql;			
		}

		function dept_active($id){
			$sql = $this->con->query("UPDATE tbl_dept SET status='0' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('department.php')</script>";		
		}

		function dept_inactive($id){
			$sql = $this->con->query("UPDATE tbl_dept SET status='1' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('department.php')</script>";		
		}

		function dept_delete($id){
			$sql = $this->con->query("DELETE FROM tbl_dept WHERE id='$id'");
			return $sql;			
			echo "<script>window.location.replace('department.php')</script>";		
		}


		function dept_add($allData){
		$dept_name= $allData["dept_name"];
		$remarks= $allData["remarks"];

	$sql = $this->con->query("INSERT INTO tbl_dept (dept_name, status, remarks) VALUES ('$dept_name', '1', '$remarks')");



		if ($sql) {
			return '<div class="alert alert-success"><strong>Success: </strong>Asset Successfully Added</div>';
			
		}

		else {
			return '<div class="alert alert-danger"><strong>Failed: </strong>Product Not Added</div>';			
		}
	}

	}

		?>

