<?php
include 'classes/ping.php';

// Create an instance of the Ping class
$ping = new Ping();

// Fetch data from the database
$data = $ping->getData();




// Check if there is data to display
if (!empty($data)) {
    echo "<meta http-equiv='refresh' content='10'>";
    echo "<body style='float: right;'>";

    // Container for tables
    echo "<div style='display: inline-block;'>";

    // Loop through each column
    foreach ($data as $columnNumber => $columnData) {
        echo "<table border='1px solid black' cellpadding='2px' style='text-align: left; display: inline-block; margin-right: 20px;vertical-align: top; '>";
        // Display column data
        foreach ($columnData as $item) {
            echo "<tr>";
            echo "<td>{$item[1]}</td>";
            echo "<td>" . pingDevice($item[0]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // End of container
    echo "</div>";

    echo "</body>";
} else {
    echo "No data found";
}

// Function to ping device and display status
function pingDevice($ip)
{
    $ping = exec("ping -n 1 -w 1000 $ip", $output, $status);

    if ($status != 0) {
        $myAudioFile = "ping/alarm_beep_3.mp3";
           echo '<audio autoplay="true" style="display:none;">
            <source src="' .
               $myAudioFile .
               '" type="audio/mp3">
            </audio>';


        return '<div style="width:20px;height:20px; background: #FF0000;"></div>';
    } else {
        return '<div style="width:20px;height:20px; background: #00FF00;"></div>';
    }
}
?>