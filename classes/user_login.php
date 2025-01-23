<?php 

/**
 * 
 */
class Login {
	private $con = "";
	function __construct()
	{
		$this->con= new mysqli("localhost","Administrator","server@bcdlit","inventory");
	}

	function addLogin($allData){
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
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Department Name</div>';
		}
		elseif ($mName == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Username Name</div>';
		}
		elseif ($phone == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Phone Number</div>';
		}
		elseif ($email == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Email Address</div>';
		}

		else{
			$password = md5($password);
			$sql = $this->con->query("INSERT INTO tbl_login (dept,mName,email,phone,password)VALUES('$dept','$mName','$email','$phone','$password')");

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
				$sql = $this->con->query("SELECT * FROM tbl_login WHERE (mName='$userName' OR email = '$userName' OR phone = '$userName') AND password = '$password' AND status = '1'");
				if ($sql->num_rows > 0) {
					$sql = $sql->fetch_assoc();
					session_start();
					$_SESSION['id'] = $sql["id"];
					$_SESSION['dept'] = $sql["dept"];
					$_SESSION['mName'] = $sql["mName"];
					$_SESSION['role'] = $sql["role"];
					header("location: dashboard.php");
				}
				else{
					return '<div class="alert alert-danger"><strong>Error: </strong>User Name or Password not Found</div>';
				}
			}
		}

		function allLogin(){
			$sql = $this->con->query("SELECT * FROM tbl_login");
			return $sql;			
		}

		function active($id){
			$sql = $this->con->query("UPDATE tbl_login SET status='0' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('usercontrol.php')</script>";		
		}

		function inactive($id){
			$sql = $this->con->query("UPDATE tbl_login SET status='1' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('usercontrol.php')</script>";		
		}

		function delete($id){
			$sql = $this->con->query("DELETE FROM tbl_login WHERE id='$id'");
			return $sql;			
			echo "<script>window.location.replace('usercontrol.php')</script>";		
		}

		function findLogin($id){
			$sql = $this->con->query("SELECT * FROM tbl_login WHERE id='$id'");
			return $sql;			
		}

		function update($id,$allData){
			$dept= $allData["dept"];
			$mName= $allData["mName"];
			$phone= $allData["phone"];
			$email= $allData["email"];
			$role= $allData["role"];
			$sql = $this->con->query("UPDATE tbl_login SET dept='$dept', mName='$mName', phone='$phone', email='$email', role='$role' WHERE id='$id'");
			echo "<script>window.location.replace('usercontrol.php')</script>";			
		}

	}

		?>

