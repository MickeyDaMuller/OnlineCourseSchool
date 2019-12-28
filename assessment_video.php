 <?php
 session_start();
 require 'phpmailer/PHPMailerAutoload.php'; 
require 'connection.php';
$conn = Connect();
include('session.php');
$_SESSION['startedAss'] = true;

//if(!isset($_SESSION['logged_in'])) : 
      //header("Location: login.php");
//$ref = $_POST['essayid'];
$ref_id = $_GET['id'];
//echo $ref_id;
//$firstname = $_SESSION['firstname'];
//$surname = $_SESSION['surname'];
//$myimage = $_SESSION['myimage'];
//$space = " ";
$ref = $_POST['essayid'];
$firstname = $_SESSION['firstname'];
$surname = $_SESSION['surname'];
$myimage = $_SESSION['myimage'];
$user_id = $_SESSION['id'];
$space = " ";
$email = $_SESSION['email'];

$firstname = $_SESSION['firstname'];
$surname = $_SESSION['surname'];
$myimage = $_SESSION['myimage'];
$user_id = $_SESSION['id'];
$space = " ";



$sql = "SELECT * FROM gylf_academy_video ORDER BY video_id DESC";
//echo $sql;

  $res = mysqli_query($conn, $sql);
  $r = mysqli_fetch_assoc($res);
  $video = $r['video_url'];
  $video_id = $r['video_id'];
  $video_title = $r['video_title'];
  $video_web = $r['video_webm_url'];
$video_poster = $r['video_poster'];


$sql = "SELECT * FROM academy_scores ORDER BY created DESC";
$result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $scores = $row['scores'];
  $id = $row['user_id'];
  $id_video = $row['video_id'];
  $essay_id = $row['essay_id'];


$sql = "SELECT * FROM gylf_academy_module_video WHERE ref_id = $ref_id order by questionnumber asc";
  $res = mysqli_query($conn, $sql);

if(isset($_POST['submit']))
{


   //echo "<div align='center'>Congratulations! You have successfully registered. Check you email to confirm your registration.</div>";
   

   $arr = array();

$query = "SELECT answer FROM gylf_academy_module_video WHERE ref_id = $ref order by questionnumber asc";
  $result = mysqli_query($conn, $query);
      $count = mysqli_num_rows($result);

      $i = 1;
       while($row = mysqli_fetch_assoc($result)){

          $mychoice= $_POST['itemtype'.$i];
          $answer = $row['answer'];
          //$arr[] = $mychoice;
          //secho "My Choice: ".$mychoice."<br>";
          if($mychoice == $answer){

//echo $arr[];
            //echo "correct";
             array_push($arr, $mychoice);
          //else
            //echo "incorrect";

          }  
            
           
          $i++;
       }
       $total = (count($arr)/$count)*100; 
       $timezone  = +1; //(GMT -5:00) EST (U.S. & Canada)
$time_date = gmdate("d-M-Y H:i a", time() + 3600*($timezone+date("I")));

$_SESSION['scores'] = $total;
       
$sql = "INSERT INTO academy_scores (user_id, video_id, scores, created) VALUES ('$user_id', '$ref', '$total', '$time_date')";
  $result = mysqli_query($conn,$sql) or die(mysqli_error());

  if ($result) {
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
$mail->addBCC('contact@globalyouthleadersforum.org');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "GYLF Academy Score";
$mail->Body    = "

Dear $firstname $surname,<br><br>

Congratulations you have successful completed your online module $ref.<br>
Kindly find your score below.<br><br>
<b>Total Score = ".$total."</b><br><br><br>


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
   echo '<script>alert("Congratulations! You have successfully completed the assessment, your score has been sent to your email.")</script>';
   //header("location:result.php");
   echo "<script>document.location.replace('result.php');</script>";
}

 
$conn->close();
unset($_SESSION['startedAss']);
        //echo $total;
      // }
    }  
  



}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Global Youth Leaders' Forum Academy</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GYLF </b>Academy</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GYLF </b>Academy</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            
            
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!--img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"-->
          <?php echo "<img src=\"data:image/jpeg;base64,".base64_encode($myimage )."\" height=\"160\" width=\"160\" class=\"img-circle\" />"; ?>
        </div>
        <div class="pull-left info">
         <p><?php echo $firstname. $space.$surname?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!--form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Assessment</span>
         
          </a>
          
        </li>
        
        
        
        <li class="treeview">
          <a href="support.php">
            <i class="fa fa-edit"></i> <span>Support</span>
            
          </a>
          
        </li>
        
        
       
        <li class="treeview">
          <a href="logout.php">
            <i class="fa fa-share"></i> <span>Sign Out</span>
            
          </a>
          
            </li>
            <!--li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li-->
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assessment
        <small>Module</small>
      </h1>
      <ol class="breadcrumb">
        <!--li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li-->
        <li><button class="btn btn-info pull-right"><a href="logout.php"><font color="#ffffff">Sign Out</font></a></button></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      

          <!-- Chat box -->
          
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">

<p></p>


<?php
if ($user_id==$id && $video_id==$id_video && !empty($scores)) {
  echo '<script>alert("You have answered this module.")</script>';
  echo "<center><b>Next module coming soon!!!</b></center>";
}
else{

echo "<form action = 'assessment_video.php' method = 'post' id='assessmentform' name='assessmentform'>";


echo "<input type='hidden' name='essayid' value='".$ref_id."' />";
  $i = 1;
 while($r = mysqli_fetch_assoc($res)) {

  $questionnumber = $r['questionnumber'];
  $question = $r['question'];
  $a = $r['a'];
  $b = $r['b'];
  $c = $r['c'];
  $d = $r['d'];
  $e = $r['e'];
  $id = $r['id'];



 //echo $questionnumber;
//echo $question;
echo "<div class='form-group'>";
echo "<p>$questionnumber. $question</p>";
echo "<input type='radio' name='itemtype".$i."' value='a'>".$a."</input><br />";
echo "<input type='radio' name='itemtype".$i."' value='b'>".$b."</input><br />";
echo "<input type='radio' name='itemtype".$i."' value='c'>".$c."</input><br />";
echo "<input type='radio' name='itemtype".$i."' value='c'>".$d."</input><br />";
echo "<input type='radio' name='itemtype".$i."' value='d'>".$e."</input><br /><br /><br /><br /><br />";
echo "<input type='hidden' name='id".$i."' value='".$id."' />";
//echo $i;
//echo $b;
//echo $c;
//echo $d;
//echo $e;


echo "</div";


$i++;
 }
 //echo "<input type='text' name='essayid' placeholder='Here' value='1' />";
 //echo $ref_id;
?>
<div>
<button type="submit" class="btn btn-info pull-right" value="submit" id="submit" name="submit">Submit</button>
<?php
echo "</form>";

}
 ?>
 <br>
 <br>
 

             
            </div>



          </div>
          <!-- /.box -->

         
         

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!--div class="pull-right hidden-xs">
      <b>Version</b> 2.3.11
    </div-->
    <center><strong>Copyright &copy; <? echo date(Y);?> <a href="http://www.globalyouthleadersforum.org">Global Youth Leaders' Forum</a>.</strong> All rights
    reserved.</center>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
      

       
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
