

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
<script type="text/javascript">
  
function validate()
      {
    
         
         if( document.signupform.email.value == "" )
         {
            alert( "Please provide your email!" );
            document.signupform.email.focus() ;
            return false;
         }
    
   
     
         return( true );
      }
      </script>

</script>



</head>
<body>

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


  <div class="container" align="center">
  
  <div style = "width:350px; border: solid 3px #008bc4; " align="center">
    <!--h2>Request information</h2-->
    <div id="signup" align="center">
        
           <h2><div style = "background-color:#008bc4; color:#FFFFFF; padding:5px"><center><b>Resend Password</b></center></div></h2>
            <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
        
            <div style = "margin:20px">
               
               <form action = "thankyouforgottenpwd.php" method = "post" id="signupform" enctype="multipart/form-data" onsubmit="return(validate());>
                                 <div class="form-group">
                              <input type="text" name="email" id="email" class="form-control" placeholder="Email" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>



<center><a href="login.php"><strong><b>Already a member?</b></strong></a> <strong>|</strong> <a href="registrations.php"><strong><b>Not a member?</b></strong></a></center>

                          </div>

                       

                  <div class="form-group">
                            <!--center><input type = "submit" value = " Submit " style="background:rgb(255,165,0); padding: 10px; border: 0; text-align: center; font-size: 16px;color:#ffffff "/></center-->


<button class="btn blue" name="signupSubmit" id="signupSubmit" type="submit">Submit</button>

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
