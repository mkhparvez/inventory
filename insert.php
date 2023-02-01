<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "aatman";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
      die ('connection faild:'.$conn->connect_error);
    }

    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO users (email,message)VALUES('$email','$message')"; 

    if ($conn->query($sql)===TRUE) {
      echo "message sent successfully";     
    }else{
      echo "Error: ".$sql."<br>".$conn->error;
    }

    $conn->close();
?>