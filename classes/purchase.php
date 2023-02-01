<?php

class Purchase
{
	private $con = "";
	function __construct()
	{
		$this->con= new mysqli("localhost","root","","pos");
	}

	function findProduct($barcode){
		$sql = $this->con->query("SELECT * FROM tbl_product WHERE barcode = '$barcode'");
		$result = $sql->fetch_assoc();
		return $result;

	}


	function findStock($product_id){
		$sql = $this->con->query("SELECT * FROM tbl_stock WHERE product_id = '$product_id'");
		$result = $sql->fetch_assoc();
		return $result;

	}


	function addItem($pdate, $cName, $invoice, $product_id, $barcode, $price, $qnt, $total,$br_id){

		if ($pdate=="" || $cName=="" || $invoice=="" || $product_id=="" || $barcode=="" || $price== "" || $total=="") {

			return "400";
		}

		else {
			$sql = $this->con->query("INSERT INTO tbl_purchase_details (pdate, cName, invoice, product_id, barcode, price, qnt, total,br_id) VALUES ('$pdate', '$cName', '$invoice','$product_id', '$barcode', '$price', '$qnt', '$total','$br_id')");
		$sql = $this->stockupdateInsert($product_id,$qnt,$br_id);


		if ($sql) {
			return "200";
		}
		else{
			return "400";
		}

		}


		

	}


	function stockupdateInsert($product_id,$qnt,$br_id){
		$sql= $this->con->query("SELECT * FROM tbl_stock WHERE product_id='$product_id'");
		if ($sql->num_rows > 0) {
			$data = $sql->fetch_assoc();
			$pastStock = $data["qnt"];
			$totalStock = $pastStock + $qnt;
		$sql = $this->con->query("UPDATE tbl_stock SET qnt='$totalStock' WHERE product_id= '$product_id'");	
		return $sql;

		}
		else {
			$insert = $this->con->query("INSERT INTO tbl_stock (product_id,qnt,br_id) VALUES ('$product_id','$qnt','$br_id')");
			return $sql;
			}

	}


	function showItem($invoice){
		$sql = $this->con->query("SELECT * FROM tbl_purchase_details WHERE invoice = '$invoice'");
		return $sql;

	}

	function qntCal($invoice){
		$sql = $this->con->query("SELECT * FROM tbl_purchase_details WHERE invoice = '$invoice'");
		return $sql;

	}

	function amountCal($invoice){
		$sql = $this->con->query("SELECT * FROM tbl_purchase_details WHERE invoice = '$invoice'");
		return $sql;

	}

	function purchaseSummery($pdate,$cName,$invoice,$total_quantity,$total_price,$dis,$dis_amount,$grand_total,$pay,$due,$br_id){

		$sql = $this->con->query("INSERT INTO tbl_purchase_summery(pdate,company,invoice,total_quantity,total_price,dis,dis_amount,grand_total,pay,due,br_id)VALUES('$pdate','$cName','$invoice','$total_quantity','$total_price','$dis','$dis_amount','$grand_total','$pay','$due','$br_id')");
	}

	
	function purchaseSummeryShow(){

		$sql = $this->con->query("SELECT * FROM tbl_purchase_summery");
		return $sql;
	}



	function removeItem($id){
		$sql = $this->con->query("DELETE FROM tbl_purchase_details WHERE id = '$id'");
		return $sql;
	}





}

?>