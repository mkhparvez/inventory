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






 ?>


