
<?php
 
// echo "connecting";
function Connect()
{
$dbhost = "web01.enterthehealingschool.org";
 $dbuser = "youthleaders";
 $dbpass = "nwljrcn8-@dl";
 $dbname = "youthlea_gylf";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
//echo "connected";

     return $conn;
}
?>
