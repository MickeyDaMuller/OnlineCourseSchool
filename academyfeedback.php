<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Feedback At The Academy</title>

<style>
table, th, td {
     border: 1px solid black;
}
</style>


</head>



<body>

<!-- Start Site Header -->
	<header class="site-header">
    	<div class="container for-navi">
        	<div align="center" class="site-logo">
         
            <h1><u>Student Feedback At The Academy</u></h1>
            </div>

<?php
$dbhost = "web01.enterthehealingschool.org";
 $dbuser = "youthleaders";
 $dbpass = "nwljrcn8-@dl";
 $dbname = "youthlea_gylf";

 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname, surname, email, country,message, type, time_date FROM academy_support";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Firstame</th><th>surname</th><th>Email</th><th>Country</th><th>Message</th><th>Type</th><th>Time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td> <td>".$row["surname"]."</td><td>".$row["email"]."</td><td>".$row["country"]."</td><td>".$row["message"]."</td><td>".$row["type"]."</td><td>".$row["time_date"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>


</body>
</html>