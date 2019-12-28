<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LIST OF NEW GENERATION OF YOUTH</title>

<style>
table, th, td {
     border: 1px solid black;
}
</style>


</head>



<body>
<div class="container for-navi">
          <div align="center" class="site-logo">
         
            <h1><u>LIST OF REGISTERED GYLF ACADEMY STUDENT</u></h1>
            </div>

<div class="main-container fadeIn animated">

		<div class="container">

			<div class="row">

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

                    
           

                $query = "SELECT id,firstname,surname,username,email,password,gender,age,myimage,country,nationality,phone,hearus,areuborn,woulduborn,areuholy,woulduholy,com_code,created FROM users";
                //$result = mysqli_query($conn, $query); 
                $result = $conn->query($query) or die("Error");


if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Firstname</th><th>Surname</th><th>Username</th><th>Email</th><th>Password</th><th>Gender</th><th>Age</th><th>Country</th><th>Nationality</th><th>Phone</th><th>Hear Us</th><th>Confirmation</th><th>Registration Date</th><th>Are you born again?</th><th>Would you like to be born again?</th><th>Are you filled with the Holy Spirit?</th><th>Would you like to receive the Holy Spirit?</th><th>Profile Image</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td> <td>".$row["surname"]."</td><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td><td>".$row["gender"]."</td><td>".$row["age"]."</td><td>".$row["country"]."</td><td>".$row["nationality"]."</td><td>".$row["phone"]."</td><td>".$row["hearus"]."</td><td>".$row["com_code"]."</td><td>".$row["created"]."</td><td>".$row["areuborn"]."</td><td>".$row["woulduborn"]."</td><td>".$row["areuholy"]."</td><td>".$row["woulduholy"]."</td><td><img src=\"data:image/jpeg;base64,".base64_encode($row['myimage'] )."\" height=\"100\" width=\"100\" class=\"img-thumnail\" /></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>



              
            


	


		</div>
		


	</div>


</div>
</body>
</html>