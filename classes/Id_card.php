<?php 

/**
 * 
 */
class IDCard {
    private $con = "";

    function __construct() {
        $this->con = new mysqli("localhost", "root", "", "inventory");
    }

    // Add the uploadFile method here
    function uploadFile($file, $destination) {
        // Get the original file name
        $fileName = basename($file['name']);

        // Set the target file path (destination + original file name)
        $targetFilePath = $destination . $fileName;

        // Create directory if it doesn't exist
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        // Check if file with the same name exists
        if (file_exists($targetFilePath)) {
            // Append timestamp to avoid conflicts
            $fileName = time() . "_" . $fileName;
            $targetFilePath = $destination . $fileName;
        }

        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return $targetFilePath; // Return the path for DB storage
        } else {
            return null; // Handle failed upload
        }
    }

    function addNewCard($allData, $files) {
        $name = $allData["name"];
        $designation = $allData["designation"];
        $department = $allData["department"];
        $pf_no = $allData["pf_no"];
        $blood_group = $allData["blood_group"];
        $unit = $allData["unit"];
        $remarks = $allData["remark"];
        // $authority = isset($allData["authority"]) ? $allData["authority"] : '';

        // Ensure the file array exists before attempting to access it
        if (isset($files['image_path']) && isset($files['sign_path'])) {
            // Upload image and signature files
            $image_path = $this->uploadFile($files['image_path'], 'ID_Card/EmpPic/');
            $sign_path = $this->uploadFile($files['sign_path'], 'ID_Card/EmpSign/');
        } else {
            // Handle missing file uploads
            return '<div class="alert alert-danger"><strong>Error: </strong>Image or Signature file missing.</div>';
        }


		 // Insert data into the database
		if ($name != "") {
		    // Get auth_sign_path from tbl_id_authority where status = 1
		    $result = $this->con->query("SELECT sign_path FROM tbl_id_authority WHERE status = 1 LIMIT 1");
		    
		    // Check if a result was returned and fetch the sign_path
		    $auth_sign_path = null; // Initialize variable
		    if ($result && $row = $result->fetch_assoc()) {
		        $auth_sign_path = $row['sign_path']; // Access the 'sign_path' column by its name
		    }

 
	    // Insert into tbl_idcard
	    $sql = $this->con->query("INSERT INTO tbl_idcard (name, designation, department, pf_no, blood_group, unit, image_path, sign_path, remarks, auth_sign_path) 
	        VALUES ('$name', '$designation', '$department', '$pf_no', '$blood_group', '$unit', '$image_path', '$sign_path', '$remarks', '$auth_sign_path')");

	    if ($sql) {
	        echo '<div class="alert alert-success"><strong>Success: </strong>ID Card successfully added.</div>';
	        echo "<script>setTimeout(function() { window.location.replace('new_id_card_entry.php'); }, 2000);</script>";
	    } else {
	        return '<div class="alert alert-danger"><strong>Failed: </strong>ID Card not added.</div>';
	    }
	} else {
	    return '<div class="alert alert-danger"><strong>Error: </strong>Please fill out required fields.</div>';
	}
}



		function allID_cards(){
			$sql = $this->con->query("SELECT * FROM `tbl_idcard`");
			return $sql;			
		}

		function allID_card($id){
			$sql = $this->con->query("SELECT * FROM `tbl_idcard` WHERE id='$id'");
			$sql = $sql->fetch_assoc();
			return $sql;		
		}

		function active($id){
			$sql = $this->con->query("UPDATE tbl_idcard SET status='1' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('productTypes.php')</script>";		
		}

		function inactive($id){
			$sql = $this->con->query("UPDATE tbl_idcard SET status='0' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('productTypes.php')</script>";		
		}

		function delete($id){
			$sql = $this->con->query("DELETE FROM tbl_idcard WHERE id='$id'");
			return $sql;			
			echo "<script>window.location.replace('productTypes.php')</script>";		
		}

		function findBranch($id){
			$sql = $this->con->query("SELECT * FROM tbl_products_types WHERE id='$id'");
			return $sql;			
		}

function update($id, $allData){
    $pf_no = $this->con->real_escape_string($allData["pf_no"]);
    $name = $this->con->real_escape_string($allData["name"]);
    $designation = $this->con->real_escape_string($allData["designation"]);
    $department = $this->con->real_escape_string($allData["department"]);
    $blood_group = $this->con->real_escape_string($allData["blood_group"]);
    $unit = $this->con->real_escape_string($allData["unit"]);
    $remarks = $this->con->real_escape_string($allData["remarks"]);

    // Handle image upload
    if (isset($_FILES['image_path2']) && $_FILES['image_path2']['error'] == 0) {
        $image_path = 'ID_Card/EmpPic/' . basename($_FILES['image_path2']['name']);
        move_uploaded_file($_FILES['image_path2']['tmp_name'], $image_path);
    } else {
        $image_path = $allData['old_image_path']; // Use old image path if no new file is uploaded
    }

    // Handle signature upload
    if (isset($_FILES['sign_path2']) && $_FILES['sign_path2']['error'] == 0) {
        $sign_path = 'ID_Card/EmpSign/' . basename($_FILES['sign_path2']['name']);
        move_uploaded_file($_FILES['sign_path2']['tmp_name'], $sign_path);
    } else {
        $sign_path = $allData['old_sign_path']; // Use old signature path if no new file is uploaded
    }

    // Update the database
    $sql = "UPDATE tbl_idcard 
            SET name='$name', 
                designation='$designation', 
                department='$department', 
                pf_no='$pf_no', 
                blood_group='$blood_group', 
                unit='$unit', 
                remarks='$remarks', 
                image_path='$image_path', 
                sign_path='$sign_path'
            WHERE id='$id'";

    $result = $this->con->query($sql);

    if ($result) {
        return '<div class="alert alert-success"><strong>Success: </strong>Updated Successfully</div>';
    } else {
        return '<div class="alert alert-danger"><strong>Failed: </strong>Update Failed</div>';
    }
}
	
	





		function findDept(){
			$sql = $this->con->query("SELECT * FROM tbl_id_dept");
			return $sql;			
		}

		function dept_active($id){
			$sql = $this->con->query("UPDATE tbl_id_dept SET status='0' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('id_dept.php')</script>";		
		}

		function dept_inactive($id){
			$sql = $this->con->query("UPDATE tbl_id_dept SET status='1' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('id_dept.php')</script>";		
		}

		function dept_delete($id){
			$sql = $this->con->query("DELETE FROM tbl_id_dept WHERE id='$id'");
			return $sql;			
			echo "<script>window.location.replace('id_dept.php')</script>";		
		}


		function dept_add($allData){
		$dept_name= $allData["dept_name"];
		$remarks= $allData["remarks"];

	$sql = $this->con->query("INSERT INTO tbl_id_dept (dept_name, status, remarks) VALUES ('$dept_name', '1', '$remarks')");



		if ($sql) {
			return '<div class="alert alert-success"><strong>Success: </strong>Asset Successfully Added</div>';
			
		}

		else {
			return '<div class="alert alert-danger"><strong>Failed: </strong>Product Not Added</div>';			
		}
	}







		function findDesig(){
			$sql = $this->con->query("SELECT * FROM tbl_id_designation");
			return $sql;			
		}

		function desig_active($id){
			$sql = $this->con->query("UPDATE tbl_id_designation SET status='0' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('id_desig.php')</script>";		
		}

		function desig_inactive($id){
			$sql = $this->con->query("UPDATE tbl_id_designation SET status='1' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('id_desig.php')</script>";		
		}

		function desig_delete($id){
			$sql = $this->con->query("DELETE FROM tbl_id_designation WHERE id='$id'");
			return $sql;			
			echo "<script>window.location.replace('id_desig.php')</script>";		
		}


		function desig_add($allData){
		$desig_name= $allData["desig_name"];
		$remarks= $allData["remarks"];

	$sql = $this->con->query("INSERT INTO tbl_id_designation (designation, status, remarks) VALUES ('$desig_name', '1', '$remarks')");



		if ($sql) {
			return '<div class="alert alert-success"><strong>Success: </strong>Asset Successfully Added</div>';
			
		}

		else {
			return '<div class="alert alert-danger"><strong>Failed: </strong>Product Not Added</div>';			
		}
	}





		function findAuth(){
			$sql = $this->con->query("SELECT * FROM tbl_id_authority");
			return $sql;			
		}

		function auth_active($id){
			$sql = $this->con->query("UPDATE tbl_id_authority SET status='0' WHERE id='$id'");
			return $sql;
			echo "<script>window.location.replace('authority.php')</script>";		
		}

		function auth_inactive($id){
			$sql = $this->con->query("UPDATE tbl_id_authority SET status='1' WHERE id='$id'");
			return $sql;	
			echo "<script>window.location.replace('authority.php')</script>";		
		}

		function auth_delete($id){
			$sql = $this->con->query("DELETE FROM tbl_id_authority WHERE id='$id'");
			return $sql;			
			echo "<script>window.location.replace('authority.php')</script>";		
		}


		function auth_set($id){
		    // Update the auth_sign_path in tbl_idcard with the corresponding sign_path from tbl_id_authority
		    $sql = $this->con->query("UPDATE tbl_idcard 
                          SET auth_sign_path = (SELECT sign_path 
                                                FROM tbl_id_authority 
                                                WHERE id='$id')");
    
     // Update last_upload in tbl_id_authority with the current date
    $sql2 = $this->con->query("UPDATE tbl_id_authority 
                                SET last_update = NOW(), 
                                    status = 1 
                                WHERE id = '$id'");

    $sql3 = $this->con->query("UPDATE tbl_id_authority 
                                SET status = 0 
                                WHERE id != '$id'");

    // Check if both queries were successful
    if ($sql && $sql2 && $sql3) {
        echo "<script>window.location.replace('authority.php')</script>"; // Redirect after successful update
    } else {
        echo "<div class='alert alert-danger'>Failed to update the record</div>";
    }
}



	function auth_add($allData, $files) {
    $name = $allData["name"];
    $remarks = $allData["remarks"];

    if (isset($files['auth_sign_path'])) {
        // Upload image and signature files
        $auth_sign_path = $this->uploadFile($files['auth_sign_path'], 'ID_Card/Authority/');
    } else {
        // Handle missing file uploads
        return '<div class="alert alert-danger"><strong>Error: </strong>Image or Signature file missing.</div>';
    }

    // Insert query with the actual file path
    $sql = $this->con->query("INSERT INTO tbl_id_authority (name, sign_path, status, remarks) VALUES ('$name', '$auth_sign_path', '1', '$remarks')");

    if ($sql) {
        return '<div class="alert alert-success"><strong>Success: </strong>Authority Successfully Added</div>';
    } else {
        return '<div class="alert alert-danger"><strong>Failed: </strong>Authority Not Added</div>';
    }
}















	



}

	

		?>

