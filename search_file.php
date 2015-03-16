<?php
session_start();
$v = $_POST['search'];

// Connect to the database
$dbLink = new mysqli('localhost', 'root', '', 'userdata');
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
// Query for a list of all existing files
$sql = "SELECT id, name, mime, size, created FROM file where Name like '%$v%'";
$result = $dbLink->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
          header("np3.html");
    }
    else {
        // Print the top of a table
        echo '<table width="100%" style="font-family:helvetica;color:#FB5A32; font-size:18px; font-weight:bold" cellspacing="0">
                <tr height="80" style="background-color:#333333;color:white">
                    <td style="padding-left:40px"><b>Name</b></td>
                    <td style="padding-left:55px"><b>Mime</b></td>
                    <td style="margin-right:15px"><b>Size (bytes)</b></td>
                    <td><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr height='50' style='background-color:#33B7FE; color:black'>
                    <td style='padding-left:40px'>{$row['name']}</td>
                    <td style='padding-left:55px'>{$row['mime']}</td>
                    <td style='margin-right:15px'>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}
 
// Close the mysql connection
$dbLink->close();
?>
<html>
<head>
<link rel="stylesheet" href="homepage.css" />
</head>
<body>
</body>
</html>