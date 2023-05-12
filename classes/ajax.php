<?php
	include 'products.php';
	$action = $_POST['action'];
	$action();
	
	function findProduct(){
	$product = new Product;
	$id = $_POST['inv_id'];
	$sql = $product->findProducts($id);
	echo json_encode($sql);

	}

	function history(){
	$product = new Product;
	$id = $_POST['inv_id'];
	$sql = $product->history($id);
	echo json_encode($sql);

	}


	// function g_pass(){
	// $product = new Product;
	// $id = $_POST['inv_id'];
	// $sql = $product->g_pass($id);
	// echo json_encode($sql);

	// }



		function addItem(){
		$pdate = $_POST['pdate'];
		$gp_id =$_POST['gp_id'];
		$inv_id =$_POST['inv_id'];
		$brand =$_POST['brand'];
		$model =$_POST['model'];
		$sl_no =$_POST['sl_no'];
		$spec =$_POST['spec'];
		$location =$_POST['location'];
		$new_loc =$_POST['new_loc'];
		$dept =$_POST['dept'];
		$new_dept =$_POST['new_dept'];
		$r_name =$_POST['r_name'];
		$r_desig =$_POST['r_desig'];
		$company =$_POST['company'];
		$remarks =$_POST['remarks'];
		// session_start();
		// $br_id = $_SESSION['id'];

		$product = new Product;
		$sql = $product->addItem($pdate, $gp_id, $inv_id, $brand, $model, $sl_no, $spec, $location, $new_loc, $dept, $new_dept, $r_name, $r_desig, $company, $remarks);
		echo $sql;
	}




	function showItem(){
		$product = new Product;
		$gp_id = $_POST['gp_id'];

		$sql = $product->showItem($gp_id);
		$tdata = "";
		while($data = $sql->fetch_assoc()){
			$tdata .= '<tr>
				<td>'.$data["pdate"].'</td>
				<td>'.$data["inv_id"].'</td>
				<td>'.$data["brand"].'</td>
				<td>'.$data["model"].'</td>
				<td>'.$data["sl_no"].'</td>
				<td>'.$data["spec"].'</td>
				<td> <button value="'.$data["id"].'" class="removeItem btn btn-lg"><i class="fas fa-backspace text-danger"></i></button> </td>
			</tr>';
		}
		echo $tdata;
	}


	function removeItem(){
		$product = new Product;
		$id = $_POST['id'];
		$sql= $product->removeItem($id);
		echo $sql;
	}








 ?>


 


