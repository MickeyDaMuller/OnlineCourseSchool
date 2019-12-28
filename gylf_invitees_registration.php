<?php 
require 'phpmailer/PHPMailerAutoload.php'; 
require 'connection.php';

$conn = Connect();

if(isset($_POST['submit']))
{

if($_POST['inviter_fullname'] == '')
{
echo '<script>alert("Message is required.")</script>';
}

else{
$inviter_fullname = $conn->real_escape_string($_POST['inviter_fullname']);
$inviter_email = $conn->real_escape_string($_POST['inviter_email']);
$m1st_invitee_fullname = $conn->real_escape_string($_POST['m1st_invitee_fullname']);
$m1st_invitee_email = $conn->real_escape_string($_POST['m1st_invitee_email']);
$m2nd_invitee_fullname = $conn->real_escape_string($_POST['m2nd_invitee_fullname']);
$m2nd_invitee_email = $conn->real_escape_string($_POST['m2nd_invitee_email']);
$m3rd_invitee_fullname = $conn->real_escape_string($_POST['m3rd_invitee_fullname']);
$m3rd_invitee_email = $conn->real_escape_string($_POST['m3rd_invitee_email']);
$m4th_invitee_fullname = $conn->real_escape_string($_POST['m4th_invitee_fullname']);
$m4th_invitee_email = $conn->real_escape_string($_POST['m4th_invitee_email']);
$m5th_invitee_fullname = $conn->real_escape_string($_POST['m5th_invitee_fullname']);
$m5th_invitee_email = $conn->real_escape_string($_POST['m5th_invitee_email']);
$m6th_invitee_fullname = $conn->real_escape_string($_POST['m6th_invitee_fullname']);
$m6th_invitee_fullname = $conn->real_escape_string($_POST['m6th_invitee_email']);
$m7th_invitee_fullname = $conn->real_escape_string($_POST['m7th_invitee_fullname']);
$m7th_invitee_email = $conn->real_escape_string($_POST['m7th_invitee_email']);
$m8th_invitee_fullname = $conn->real_escape_string($_POST['m8th_invitee_fullname']);
$m8th_invitee_email = $conn->real_escape_string($_POST['m8th_invitee_email']);
$m9th_invitee_fullname = $conn->real_escape_string($_POST['m9th_invitee_fullname']);
$m9th_invitee_email = $conn->real_escape_string($_POST['m9th_invitee_email']);
$m10th_invitee_fullname = $conn->real_escape_string($_POST['m10th_invitee_fullname']);
$m10th_invitee_email = $conn->real_escape_string($_POST['m10th_invitee_email']);
$timezone  = +1; //(GMT -5:00) EST (U.S. & Canada)
$time_date = gmdate("d-M-Y H:i a", time() + 3600*($timezone+date("I")));

//var_dump($_POST);


$sql = "INSERT INTO gylf_academy_invitees (inviter_fullname, inviter_email, m1st_invitee_fullname, m1st_invitee_email, m2nd_invitee_fullname, m2nd_invitee_email, m3rd_invitee_fullname, m3rd_invitee_email, m4th_invitee_fullname, m4th_invitee_email, m5th_invitee_fullname, m5th_invitee_email, m6th_invitee_fullname, m6th_invitee_email, m7th_invitee_fullname, m7th_invitee_email, m8th_invitee_fullname, m8th_invitee_email, m9th_invitee_fullname, m9th_invitee_email, m10th_invitee_fullname, m10th_invitee_email,time_date) VALUES ('$inviter_fullname', '$inviter_email', '$m1st_invitee_fullname', '$m1st_invitee_email', '$m2nd_invitee_fullname', '$m2nd_invitee_email','$m3rd_invitee_fullname', '$m3rd_invitee_email', '$m4th_invitee_fullname', '$m4th_invitee_email', '$m5th_invitee_fullname', '$m5th_invitee_email', '$m6th_invitee_fullname', '$m6th_invitee_email', '$m7th_invitee_fullname', '$m7th_invitee_email', '$m8th_invitee_fullname', '$m8th_invitee_email','$m9th_invitee_fullname', '$m9th_invitee_email', '$m10th_invitee_fullname', '$m10th_invitee_email', '$time_date')";
$result = mysqli_query($conn,$sql) or die(mysqli_error());
//echo $sql;

echo $result;
if ($result) {
echo "Successful";

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'globalyouthleadersforum.org';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'contact@globalyouthleadersforum.org';                 // SMTP username
$mail->Password = 'Tg7RNPEnUclV';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('noreply@globalyouthleadersforum.org', "Global Youth Leaders' Forum");
//$mail->addAddress($email, $firstname);     // Add a recipient
$mail->addAddress($email);               // Name is optional
$mail->addReplyTo('contact@globalyouthleadersforum.org', "Global Youth Leaders' Forum");
//$mail->addCC('iexcel4ever@gmail.com');
$mail->addBCC('mike.hsch@gmail.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'GYLF Academy Support';
$mail->Body    = "

Dear $firstname $surname,<br><br>

We received your message. You would receive a feedback shortly.<br><br>


Thank you<br>

The GYLF Academy.


"





;
$mail->AltBody = "

Dear $firstname $surname,<br><br>

You have successfully registration for the GYLF Academy.<br>
Kindly follow the link below to activate your account.<br><br><br>
http://www.globalyouthleadersforum.org/gylf_academy/confirm.php?passkey=$com_code<br><br><br>


Thank you<br>

The GYLF Academy.


";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   //echo "<div align='center'>Congratulations! You have successfully registered. Check you email to confirm your registration.</div>";
   echo '<script>alert("Congratulations! Your message has been sent. You would receive a feedback shortly.")</script>';
}

 
$conn->close();

}
else{

echo "Not Successful";

}

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
  
   <script type="text/javascript"
                          src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>‌​
                      
    <script type="text/javascript">

      

        
     function validate()
      {
    


         if( document.signupform.m1st_inviter_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m1st_inviter_fullname.focus() ;
            return false;
         }
 if( document.signupform.m1st_inviter_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m1st_inviter_email.focus() ;
            return false;
         }
 if( document.signupform.m2nd_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m2nd_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m2nd_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m2nd_invitee_email.focus() ;
            return false;
         }
 if( document.signupform.m3rd_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m3rd_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m3rd_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m3rd_invitee_email.focus() ;
            return false;
         }
 if( document.signupform.m4th_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m4th_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m4th_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m4th_invitee_email.focus() ;
            return false;
         }
 if( document.signupform.m5th_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m5th_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m5th_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m5th_invitee_email.focus() ;
            return false;
         }
 if( document.signupform.m6th_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m6th_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m6th_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m6th_invitee_email.focus() ;
            return false;
         }
 if( document.signupform.m7th_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m7th_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m7th_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m7th_invitee_email.focus() ;
            return false;
         }
 if( document.signupform.m8th_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m8th_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m8th_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m8th_invitee_email.focus() ;
            return false;
         }
 if( document.signupform.m9th_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m9th_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m9th_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m9th_invitee_email.focus() ;
            return false;
         }
 if( document.signupform.m10th_invitee_fullname.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.signupform.m10th_invitee_fullname.focus() ;
            return false;
         }
 if( document.signupform.m10th_invitee_email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.m10th_invitee_email.focus() ;
            return false;
         }

         return( true );
      }
      </script>

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
<body onload="invisible()">

   <header id="header">
    <div class="container">
      <a href="index.php" id="logo" title="GYLF Academy">GYLF Academy</a>
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
          <li class="current"><a href="registrations.php">Register</a></li>
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
  <div class="container" align="center">
  
  <div style = "width:350px; border: solid 3px #008bc4; " align="center">
    <!--h2>Request information</h2-->
    <div id="signup" align="center">
        
           <h2><div style = "background-color:#008bc4; color:#FFFFFF; padding:5px"><center><b>INVITATION FORM</b></center></div></h2>
            <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
        <center><p><font size="2.5" color="#008bc4"><strong><u>NB</u>:</strong> Kindly provide your fullname and email follow by your invitees info</font></p></center>
            <div style = "margin:20px">
               
               <form action = "gylf_invitees_registration.php" method = "post" id="signupform" name="signupform" onsubmit="return(validate());">
                                 <div class="form-group">
                                 <label><font color="#008bc4"><strong>Inviter Fullname:</strong></font></label>
                              <input type="text" name="inviter_fullname" id="inviter_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>


              <div class="form-group">
              <label><font color="#008bc4"><strong>Inviter Email:</strong></font></label>
                              <input type="email" name="inviter_email" id="inviter_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>
               <hr  color="#008bc4">

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>1st Invitee Fullname:</strong></font></label>
                              <input type="text" name="m1st_invitee_fullname" id="m1st_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>1st Invitee Email:</strong></font></label>
                              <input type="text" name="m1st_invitee_email" id="m1st_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                        

 <hr  color="#008bc4">

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>2nd Invitee Fullname:</strong></font></label>
                              <input type="text" name="m2nd_invitee_fullname" id="m2nd_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>2nd Invitee Email:</strong></font></label>
                              <input type="text" name="m2nd_invitee_email" id="m2nd_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>
<hr  color="#008bc4">
                          <div class="form-group">
                          <label><font color="#008bc4"><strong>3rd Invitee Fullname:</strong></font></label>
                              <input type="text" name="m3rd_invitee_fullname" id="m3rd_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>3rd Invitee Email:</strong></font></label>
                              <input type="text" name="m3rd_invitee_email" id="m3rd_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

<hr  color="#008bc4">

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>4th Invitee Fullname:</strong></font></label>
                              <input type="text" name="m4th_invitee_fullname" id="m4th_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>4th Invitee Email:</strong></font></label>
                              <input type="text" name="m4th_invitee_email" id="m4th_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>
<hr  color="#008bc4">


                          <div class="form-group">
                          <label><font color="#008bc4"><strong>5th Invitee Fullname:</strong></font></label>
                              <input type="text" name="m5th_invitee_fullname" id="m5th_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>5th Invitee Email:</strong></font></label>
                              <input type="text" name="m5th_invitee_email" id="m5th_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

<hr  color="#008bc4">

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>6th Invitee Fullname:</strong></font></label>
                              <input type="text" name="m6th_invitee_fullname" id="m6th_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>6th Invitee Email:</strong></font></label>
                              <input type="text" name="m6th_invitee_email" id="m6th_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>
<hr  color="#008bc4">


                          <div class="form-group">
                          <label><font color="#008bc4"><strong>7th Invitee Fullname:</strong></font></label>
                              <input type="text" name="m7th_invitee_fullname" id="m7th_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>7th Invitee Email:</strong></font></label>
                              <input type="text" name="m7th_invitee_email" id="m7th_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>
<hr  color="#008bc4">


                          <div class="form-group">
                          <label><font color="#008bc4"><strong>8th Invitee Fullname:</strong></font></label>
                              <input type="text" name="m8th_invitee_fullname" id="m8th_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><b><font color="#008bc4"><strong>8th Invitee Email:</strong></font></b></label>
                              <input type="text" name="m8th_invitee_email" id="m8th_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>
<hr  color="#008bc4">



                          <div class="form-group">
                          <label><font color="#008bc4"><strong>9th Invitee Fullname:</strong></font></label>
                              <input type="text" name="m9th_invitee_fullname" id="m9th_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><font color="#008bc4"><strong>9th Invitee Email:</strong></font></label>
                              <input type="text" name="m9th_invitee_email" id="m9th_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>
<hr  color="#008bc4">


                          <div class="form-group">
                          <label><font color="#008bc4"><strong>10th Invitee Fullname:</strong></font></label>
                              <input type="text" name="m10th_invitee_fullname" id="m10th_invitee_fullname" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                          <div class="form-group">
                          <label><b><font color="#008bc4"><strong>10th Invitee Email:</strong></font></b></label>
                              <input type="text" name="m10th_invitee_email" id="m10th_invitee_email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                  <!--div class="form-group">
                            <center><input type = "submit" value = " Submit " style="background:rgb(255,165,0); padding: 10px; border: 0; text-align: center; font-size: 16px;color:#ffffff "/></center-->

                            <br>

<button class="btn blue" name="submit" id="submit" type="submit">Submit</button>

                        </div>




               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
          
      
      </div>
  </div>

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
