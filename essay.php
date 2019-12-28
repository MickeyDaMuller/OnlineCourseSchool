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
 
    
    if( document.modulepost.essay.value == "" )
         {
            alert( "Please insert your Essay!" );
            document.modulepost.essay.focus() ;
            return false;
         }



         return( true );
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
         <li><a href="video.php">Video Post</a></li>
         <li class="current"><a href="essay.php">Essay Post</a></li>
          <li><a href="modulepost.php">Question Post</a></li>
          <!--li><a href="gallery.php">Students</a></li-->
          
        </ul>
        <ul>
          <!--li><a href="gallery.php">Gallery</a></li-->
          <li><a href="scores.php">Scores</a></li>
          
          <li><!--a href="#fancy" class="get-contact"--><a href="gylf_academy_registered.php">Student Info</a></li>
          
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
	
	<div style = "width:100%; border: solid 3px #008bc4; " align="center">
		<!--h2>Request information</h2-->

    <h2><div style = "background-color:#008bc4; color:#FFFFFF; padding:5px"><center><b>GYLF ACADEMY MODULE</b></center></div></h2>
        
            <div style = "margin:20px">
               
               <form action = "thankyouessay.php" method = "post" id="modulepost" name="modulepost" onsubmit="return(validatePost());">

                          <div class="form-group">
                                 <label><font color="#008bc4" size="6px">Essay:</font></label>
                              <!--input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; width: 100%; text-align: center;" required-->

                              <textarea id="essay" name="essay" rows="20" style="border:2px solid #008bc4; width: 100%;" required="true"></textarea>
                          </div>
                          <br>

                     

                        <div class="form-group">
                            <!--center><input type = "submit" value = " Submit " style="background:rgb(255,165,0); padding: 10px; border: 0; text-align: center; font-size: 16px;color:#ffffff "/></center-->

                            <button class="btn blue" name="loginSubmit" id="loginSubmit" type="submit">Submit</button>

                        </div>


<br>
<br>
<!--center><a href="registrations.php"><strong><b><font color="#008bc4">Not a member? Sign up</font></b></strong></a></center-->
                          

                  

               </form>
               
              
          
            </div>


	</div>

	</div>

	




	




	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
