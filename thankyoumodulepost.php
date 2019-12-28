<?php
  
require 'connection.php';
$conn    = Connect();
$module    = $conn->real_escape_string($_POST['module']);
$questionnumber    = $conn->real_escape_string($_POST['questionnumber']);
$question    = $conn->real_escape_string($_POST['question']);
$a    = $conn->real_escape_string($_POST['a']);
$b    = $conn->real_escape_string($_POST['b']);
$c    = $conn->real_escape_string($_POST['c']);
$d   = $conn->real_escape_string($_POST['d']);
$e    = $conn->real_escape_string($_POST['e']);
$answer = $conn->real_escape_string($_POST['answer']);

$timezone  = +1; //(GMT -5:00) EST (U.S. & Canada)
$time_date = gmdate("d-M-Y H:i a", time() + 3600*($timezone+date("I")));

       
//echo gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
//var_dump($_POST);

if (!empty($_POST['questionnumber'])&& !empty($_POST['module'])&& !empty($_POST['question'])&& !empty($_POST['a'])&& !empty($_POST['b'])&& !empty($_POST['c'])&& !empty($_POST['d'])&& !empty($_POST['e'])&& !empty($_POST['answer'])) {

  

          $query   = "INSERT into gylf_academy_module1 (questionnumber,question,a,b,c,d,answer,ref_id,created) VALUES('" . $questionnumber . "','" . $question . "','" . $a . "','" . $b . "','" . $c . "','" . $d . "','" . $e . "','" . $answer . "','" . $module . "','" . $time_date . "')";

//$essayquery   = "INSERT into gylf_academy_module1_essay (module,created) VALUES('" . $module . "','" . $time_date . "')";

  //echo $query;
  //echo $essayquery;
$success = $conn->query($query);
//$essaysuccess = $conn->query($essayquery);


         if($success)
{
   //echo '<script>alert("You have successfully post a module to the academy")</script>';
  //echo "successfully";
  echo '<script>alert("You have successfully post to the academy")</script>';
}
         
      
//echo "$success";
}

 
 elseif (empty($_POST['module']) && empty($_POST['questionnumber']) && empty($_POST['question'])&& empty($_POST['a'])&& empty($_POST['b'])&& empty($_POST['c'])&& empty($_POST['d'])&& empty($_POST['e'])&& empty($_POST['answer'])) {
 
 //echo '<script>alert("Kindly fill all fields to post a module, thank you!")</script>';
  //echo "fill all fields";
  echo '<script>alert("Kindly fill all fields to post, thank you!")</script>';
 }

 
$conn->close();

 
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
 
    if( document.modulepost.module.value == "" )
         {
            alert( "Please select your module!" );
            document.modulepost.module.focus() ;
            return false;
         }

           if( document.modulepost.questionnumber.value == "" )
         {
            alert( "Please select your module!" );
            document.modulepost.questionnumber.focus() ;
            return false;
         }

    if( document.modulepost.question.value == "" )
         {
            alert( "Please insert your question!" );
            document.modulepost.question.focus() ;
            return false;
         }

    if( document.modulepost.a.value == "" )
         {
            alert( "Please insert your A!" );
            document.modulepost.a.focus() ;
            return false;
         }       

  if( document.modulepost.b.value == "" )
         {
            alert( "Please insert your B!" );
            document.modulepost.b.focus() ;
            return false;
         }
if( document.modulepost.c.value == "" )
         {
            alert( "Please insert your C!" );
            document.modulepost.c.focus() ;
            return false;
         }
   
if( document.modulepost.d.value == "" )
         {
            alert( "Please insert your D!" );
            document.modulepost.d.focus() ;
            return false;
         }
if( document.modulepost.e.value == "" )
         {
            alert( "Please insert your E!" );
            document.modulepost.e.focus() ;
            return false;
         }


if( document.modulepost.answer.value == "" )
         {
            alert( "Please insert your Answer!" );
            document.modulepost.answer.focus() ;
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
         
         <li><a href="essay.php">Essay Post</a></li>
          <li class="current"><a href="modulepost.php">Question Post</a></li>
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
               
               <form action = "thankyoumodulepost.php" method = "post" id="modulepost" name="modulepost" onsubmit="return(validatePost());">

                 <div class="form-group">
 <label><font color="#008bc4" size="6px">Module Type:</font></label>
                            <fieldset class="center" style="border:2px solid #008bc4; width: 100%" required>

                            

                            <select class="center" id="module" name="module">

                            <option value="unspecified" selected="selected" style="text-align: center;"></option>
                                                                  <option value="1">Module 1</option>
                                                                  <option value="2">Module 2</option>
                                                                  <option value="3">Module 3</option>
                                                                  <option value="4">Module 4</option>
                                                                  <option value="5">Module 5</option>

                            </select>

                            </fieldset>

                          </div>
                          <br>


                              <div class="form-group">
 <label><font color="#008bc4" size="6px">Question Number:</font></label>
                            <fieldset class="center" style="border:2px solid #008bc4; width: 100%" required>

                            

                            <select class="center" id="questionnumber" name="questionnumber">

                            <option value="unspecified" selected="selected" style="text-align: center;"></option>
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                  <option value="10">10</option>

                            </select>

                            </fieldset>

                          </div>
                          <br>

                         <div class="form-group">
                                     <label><font color="#008bc4" size="6px">Question:</font></label>
                                  <!--input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; width: 100%; text-align: center;" required-->

                                  <textarea id="question" name="question" rows="10" style="border:2px solid #008bc4; width: 100%;" required></textarea>
                        </div>
                              <br>

                              <div class="form-group">
                                     <label><font color="#008bc4" size="6px">A:</font></label>
                                  <!--input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; width: 100%; text-align: center;" required-->

                                  <textarea id="a" name="a" rows="5" style="border:2px solid #008bc4; width: 100%;" required></textarea>
                        </div>
                              <br>

                              <div class="form-group">
                                     <label><font color="#008bc4" size="6px">B:</font></label>
                                  <!--input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; width: 100%; text-align: center;" required-->

                                  <textarea id="b" name="b" rows="5" style="border:2px solid #008bc4; width: 100%;" required></textarea>
                        </div>
                              <br>


                              <div class="form-group">
                                     <label><font color="#008bc4" size="6px">C</font></label>
                                  <!--input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; width: 100%; text-align: center;" required-->

                                  <textarea id="c" name="c" rows="5" style="border:2px solid #008bc4; width: 100%;" required></textarea>
                        </div>
                              <br>


                               <div class="form-group">
                                     <label><font color="#008bc4" size="6px">D</font></label>
                                  <!--input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; width: 100%; text-align: center;" required-->

                                  <textarea id="d" name="d" rows="5" style="border:2px solid #008bc4; width: 100%;" required></textarea>
                        </div>
                              <br>

                              <div class="form-group">
                                     <label><font color="#008bc4" size="6px">E</font></label>
                                  <!--input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; width: 100%; text-align: center;" required-->

                                  <textarea id="e" name="e" rows="5" style="border:2px solid #008bc4; width: 100%;" ></textarea>
                        </div>
                              <br>


                               <div class="form-group">
                                     <label><font color="#008bc4" size="6px">ANSWER</font></label>
                                  <!--input type="text" id="email" name="email" class="form-control" style="border:2px solid #008bc4; width: 100%; text-align: center;" required-->

                                  <textarea id="answer" name="answer" rows="5" style="border:2px solid #008bc4; width: 100%;" required></textarea>
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
