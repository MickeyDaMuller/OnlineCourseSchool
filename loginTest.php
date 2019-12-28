<?php
 session_start();
   include("connection.php");

   $conn = Connect();
  
  


   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $pass = mysqli_real_escape_string($conn,$_POST['password']); 
      //$timezone  = +1; //(GMT -5:00) EST (U.S. & Canada)
      //$loggedtime = gmdate("d-M-Y H:i a", time() + 3600*($timezone+date("I")));
       
//echo gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
//var_dump($_POST);



      // checking the database to check where email and password input is equals to that of one on the database
     
      $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass' AND com_code = 'verified'";
 //$sql = "SELECT * FROM users";

      //connecting to the database to get the result
      $result = mysqli_query($conn,$sql);

        // number of count of rows available
      $count = mysqli_num_rows($result); 

      //fetching out the list of rows that has the query above
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      //to check if the account is active on active field(Email Validation)
      $active = $row['com_code'];
      $user_id = $row['id'];
      $email = $row['email'];
      $password = $row['password'];
      $myimage = $row['myimage'];
      $firstname = $row['firstname'];
      $surname = $row['surname'];


  
//$query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass' AND com_code = 'verified'"
    
      // If result matched $myusername and $mypassword, table row must be 1 row
      //echo $count;
    
      if(!empty($count)) {
         //session_register("confemail");
         //$_SESSION['login_user'] = $row['email'];
        $_SESSION['login_user'] = $email;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['surname'] = $surname;
        $_SESSION['myimage'] = $myimage;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $user_id;
 header("location: video_dashboard.php");
         //echo "Successfully Logged In";

  //$sql = "SELECT confname FROM gylf_conf WHERE confemail = '$confemail' and confpass = '$confpass'";
    //  $result = mysqli_query($conn,$sql);
    //  $row = mysqli_fetch_assoc($result);
    // $confname = $row['confname'];

          //   $sql = "SELECT confcountry FROM gylf_conf WHERE confemail = '$confemail' and confpass = '$confpass'";
     // $result = mysqli_query($conn,$sql);
     // $row = mysqli_fetch_assoc($result);
    // $confcountry = $row['confcountry'];
      
    //$count = mysqli_num_rows($result);

         
      //if (!$count==1) {
      // $query = "INSERT INTO loggedin(confname,confemail,loggedtime,confcountry) VALUES ('" .$confname. "','" .$confemail. "','" .$loggedtime. "','" .$confcountry. "') ";
       // $success = $conn->query($query);
       //echo "$success";
     // }
        

      }
      


//if (!$success) {
 //   die("Couldn't enter data: ".$conn->error);
//}

      else {
         $error = "<center>Your Login Email or Password is invalid or Account not activated</center>";
      }
   }
?>

<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Global Youth Leaders' Forum Academy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <link rel="stylesheet" media="all" href="css/style.css">
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

</head>
<body>

    <header id="header">
    <div class="container">
      <a href="" id="logo" title="GYLF Academy">GYLF Academy</a>
      <div class="menu-trigger"></div>
      <nav id="menu">
        <ul>
          <!--li><a href="events.html">Students</a></li-->
          <li><a href="index.php">Home</a></li>
         <li><a href="#about">About us</a></li>
          <li><a href="#sidebar">Courses</a></li>
          <!--li><a href="gallery.php">Students</a></li-->
          
        </ul>
        <ul>
          <!--li><a href="gallery.php">Gallery</a></li-->
          <li><a href="events.php">Events</a></li>
          
          <li><!--a href="#fancy" class="get-contact"--><a href="contact.php">Contact</a></li>
          <li><a href="registrations.php">Register</a></li>
          </ul>
      </nav>
      <!-- / navigation -->
    </div>
    <!-- / container -->
  <br>
  <br>
  </header>
  <!-- / header -->
<!--div class="divider"></div-->
<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

  <div class="container" align="center">
  
  <div style = "width:350px; border: solid 3px #008bc4; " align="center">
    <!--h2>Request information</h2-->

    <?php
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'user.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);
    ?>
    <h2>Welcome <?php echo $userData['first_name']; ?>!</h2>
    <a href="userAccount.php?logoutSubmit=1" class="logout">Logout</a>
    <div class="regisFrm">
        <p><b>Name: </b><?php echo $userData['firstname'].' '.$userData['surname']; ?></p>
        <p><b>Email: </b><?php echo $userData['email']; ?></p>
        <p><b>Phone: </b><?php echo $userData['phone']; ?></p>
    </div>
    <?php }else{ ?>
    
    <h2><div style = "background-color:#008bc4; color:#FFFFFF; padding:5px"><center><b>Sign In</b></center></div></h2>
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        
            <div style = "margin:20px">
               
               <form action = "" method = "post">

                                 <div class="form-group">
                                 <label><font color="#008bc4">Email:</font></label>
                              <input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>




              <div class="form-group">
              <label><font color="#008bc4">Password:</font></label>
                              <input type="password" name="password" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>

                          <div class="form-group">



<br>
<center><a href="forgottenpwd.php"><strong><b><font color="#008bc4">Forgotten Password?</font></b></strong></a></center>
<br>
<div class="form-group">
                            <!--center><input type = "submit" value = " Submit " style="background:rgb(255,165,0); padding: 10px; border: 0; text-align: center; font-size: 16px;color:#ffffff "/></center-->

<button class="btn blue" name="loginSubmit" id="loginSubmit" type="submit">Submit</button>

                        </div>


<br>
<br>
<center><a href="registrations.php"><strong><b><font color="#008bc4">Not a member? Sign up</font></b></strong></a></center>
                          </div>

                          <br>

                  

               </form>
               
               
          
            </div>


  </div>
<?php } ?>
  </div>

  
  <br>
  <br>

<footer id="footer">
    <div class="container">
      <section>
        <article class="col-1">
          <h3>Contact</h3>
          <ul>
            <li class="address"><a href="#">303, Pretoria Avenue, Cnr. Harley and Bram Fischer Drive, Randburg, Johannesburg,<br>Gauteng, South Africa.</a></li>
            <li class="mail"><a href="#">contact@globalyouthleadersforum.org</a></li>
            <li class="phone last"><a href="#">(+27)-113-262-467</a></li>
          </ul>
        </article>
        <article class="col-2">
          <h3>COURSES OFFERED</h3>
          <ul>
            <li>Principles of Leadership</li>
            <li>Project Management</li>
            <li>Finance Management /Wealth Creation</li>
            <li>Human Resource Management</li>
            <li class="last">Technology Optimization</li>
          </ul>
        </article>
        <article class="col-3">
          <h3>Social media</h3>
          <p>Follow us on our social media handle.</p>
          <ul>
            <li class="facebook"><a href="#">Kingschat</a></li>
            <!--li class="google-plus"><a href="#">Google+</a></li>
            <li class="twitter"><a href="#">Twitter</a></li>
            <li class="pinterest"><a href="#">Pinterest</a></li-->
          </ul>
        </article>
        <article class="col-4">
          <h3>Newsletter</h3>
          <p>Subscribe for our newsletter</p>
          <form action="#">
            <input placeholder="Email address..." type="text">
            <button type="submit">Subscribe</button>
          </form>
          <ul>
            <li><a href="#"></a></li>
          </ul>
        </article>
      </section>
      <p class="copy">Copyright © GYLF Academy. Designed by <a href="" title="Designed by GYLF Academy" target="_blank">Copyright © GYLF Academy</a>. All rights reserved.</p>
    </div>
    <!-- / container -->
  </footer>
  <!-- / footer -->

  <div id="fancy">
    <h2>Request information</h2>
    <form action="#">
      <div class="left">
        <fieldset class="mail"><input placeholder="Email address..." type="text"></fieldset>
        <fieldset class="name"><input placeholder="Name..." type="text"></fieldset>
        <fieldset class="subject"><select><option>Choose subject...</option><option>Choose subject...</option><option>Choose subject...</option></select></fieldset>
      </div>
      <div class="right">
        <fieldset class="question"><textarea placeholder="Question..."></textarea></fieldset>
      </div>
      <div class="btn-holder">
        <button class="btn blue" type="submit">Send request</button>
      </div>
    </form>
  </div>




  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
