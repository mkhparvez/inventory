<?php
class Product 
{
  private $con="";

  function __construct()
  {
    $this->con= new mysqli("localhost","root","","inventory");
  }

  function history($id){
    $sql = $this->con->query("SELECT * FROM tbl_history WHERE inv_id = '$id' ORDER BY id DESC LIMIT 1");
    return $sql;      
  }
}

// Instantiate the Product class
$product = new Product();

// Get the value of inv_id from the AJAX request
$id = $_POST['id'];

// Run the database query to retrieve data from the tbl_history table
$result = $product->history($id);

// Initialize an empty array to store the response data
$response = array();

// If the query returns any rows, store the first row's 'curr_loc' column in the response array
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $response['curr_loc'] = $row['curr_loc'];
  $response['pre_loc'] = $row['pre_loc'];
  $response['curr_dept'] = $row['curr_dept'];
  $response['pre_dept'] = $row['pre_dept'];
} else {
  // If the query does not return any rows, store an empty string in the response array
  $response['curr_loc'] = '';
  $response['pre_loc'] = '';
  $response['curr_dept'] = '';
  $response['pre_dept'] = '';
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
