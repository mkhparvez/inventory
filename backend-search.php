<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "inventory");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if (isset($_REQUEST["term"])) {
    // Modify the query to match any part of the name
    $sql = "SELECT * FROM tbl_users WHERE name LIKE ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        $param_term = '%' . $_REQUEST["term"] . '%';
        
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    // Include designation and pf in data attributes
                    echo "<p data-designation='" . $row["designation"] . "' data-pf='" . $row["pf"] . "'>" . $row["name"] . "</p>";
                }
            } else {
                echo "<p>No matches found. <span id='add-new-user'>Click to add new user</span></p>";
            }
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }
    }
    mysqli_stmt_close($stmt);
}

 
// close connection
mysqli_close($link);
?>