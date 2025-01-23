<?php 

/**
 * 
 */
class Ping {
	private $con = "";
	function __construct()
	{
		$this->con= new mysqli("localhost","root","","inventory");
	}

	function addNewDevice($allData){
		$device_name= $allData["device_name"];
		$device_ip= $allData["device_ip"];
		$column_no= $allData["column_no"];
		$remarks= $allData["p_remarks"];

		if ($device_name == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Branch Name</div>';
		}
		elseif ($device_ip == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Managers Name</div>';
		}
		elseif ($column_no == "") {
			return  '<div class="alert alert-danger"><strong>Error: </strong>Please input Phone Number</div>';
		}

		else {
			$sql = $this->con->query("INSERT INTO tbl_ping (device_name,device_ip,column_no,remarks)VALUES('$device_name','$device_ip','$column_no','$remarks')");

			if ($sql) {
				return  '<div class="alert alert-success"><strong>Success: </strong>New Device Entry Successful.</div>';
			}

			else{
					return '<div class="alert alert-danger"><strong>Error: </strong>Something went wrong</div>';
				}

			}
		}



	function getData()
    {
        $sql = "SELECT device_name, device_ip, column_no FROM tbl_ping";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            $data = [];

            while ($row = $result->fetch_assoc()) {
                $column_no = $row['column_no'];
                $device_name = $row['device_name'];
                $device_ip = $row['device_ip'];
                // $remarks = $row['remarks'];

                if (!isset($data[$column_no])) {
                    $data[$column_no] = [];
                }

                $data[$column_no][] = [$device_ip, $device_name];
            }

            return $data;
        } else {
            return [];
        }
    }



    	function allDevice(){
			$sql = $this->con->query("SELECT * FROM tbl_ping");
			return $sql;			
		}



		function update($allData,$id){
		$device_name= $allData["device_name"];
		$device_ip= $allData["device_ip"];
		$column_no= $allData["column_no"];
		$remarks= $allData["p_remarks"];

			$sql = $this->con->query("UPDATE tbl_ping SET device_name='$device_name', device_ip='$device_ip', column_no='$column_no', remarks='$remarks' WHERE id='$id'");


			echo "<script>window.location.replace('manage_ping.php')</script>";			
		}


		function delete($id){
			$sql = $this->con->query("DELETE FROM tbl_ping WHERE id='$id'");
			return $sql;			
			echo "<script>window.location.replace('usercontrol.php')</script>";		
		}



		function find($id){
			$sql = $this->con->query("SELECT * FROM tbl_ping WHERE id='$id'");
			$sql = $sql->fetch_assoc();
			return $sql;

		}



	

	// 	function allBranch(){
	// 		$sql = $this->con->query("SELECT * FROM tbl_branch");
	// 		return $sql;			
	// 	}

	// 	function active($id){
	// 		$sql = $this->con->query("UPDATE tbl_branch SET status='0' WHERE id='$id'");
	// 		return $sql;
	// 		echo "<script>window.location.replace('usercontrol.php')</script>";		
	// 	}

	// 	function inactive($id){
	// 		$sql = $this->con->query("UPDATE tbl_branch SET status='1' WHERE id='$id'");
	// 		return $sql;	
	// 		echo "<script>window.location.replace('usercontrol.php')</script>";		
	// 	}

	// 	

	// 	function findBranch($id){
	// 		$sql = $this->con->query("SELECT * FROM tbl_branch WHERE id='$id'");
	// 		return $sql;			
	// 	}



	}

		?>

