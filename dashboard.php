
<?php
session_start();
require 'connection.php';
$conn = Connect();

include('session.php');

//unset($_SESSION['login_user']);


$firstname = $_SESSION['firstname'];
$surname = $_SESSION['surname'];
$pass = $_SESSION['password'];
$email = $_SESSION['email'];
$user_id = $_SESSION['id'];
$space = " ";

$sql1 = "SELECT * FROM users WHERE id = '$user_id'";
 //$sql = "SELECT * FROM users";

      //connecting to the database to get the result
      $result1 = mysqli_query($conn,$sql1);

        // number of count of rows available
      $count = mysqli_num_rows($result1); 

      //fetching out the list of rows that has the query above
      $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
$myimage = $row1['myimage'];
$id_users = $row1['id'];


//var_dump($myimage);

$sql = "SELECT * FROM gylf_academy_module1_essay ORDER BY id DESC";
  $res = mysqli_query($conn, $sql);
  $r = mysqli_fetch_assoc($res);
  $essay = $r['essay'];
  $essayid = $r['id'];
  if($_SESSION['startedAss'])
      header("location: assessment.php?id=".$essayid);

$sql = "SELECT * FROM academy_scores WHERE user_id = $user_id and essay_id = $essayid";

$result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  //$scores = $row['scores'];
  $id = $row['user_id'];
  //$essay_id = $row['essay_id'];



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

  <script type="text/javascript">function add_chatinline(){var hccid=31552097;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
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
          
          <!-- User Account: style can be found in dropdown.less -->
          
          
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
            <i class="fa fa-dashboard"></i> <span>Module</span>
         
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
        Module
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="logout.php">Sign Out</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      

          <!-- Chat box -->
          
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
            <br><br>



            <?php


 

//if ($user_id==$id && $essayid==$essay_id && !empty($scores) && $id_users == $id) {

            if (!empty($id)) {
           
  echo '<script>alert("You have answered this module.")</script>';
  echo "<center><b>You have answered this module. Next module coming soon!!!</b></center>";
}
else{



echo "


<center><h2><b><u>COURSE OBJECTIVES</u></b></h2></center>
<b>By the end of this training, each participant should :</b>
<li> Understand the true meaning of worship</li>
<li>Know the importance of worship</li> 
<li>Worship God in spirit and in truth </li>
<li>Increase in the knowledge of the Word of God</li>

<center><h2><b><u>IMPORTANT INSTRUCTION</u></b></h2></center>
<p>Dear $firstname $surname,<br><br>
              A pleasant day to you.<br>
              To enjoy the benefits of each module please note the following before you commence the class:</p>
<b><li>The class is to be taken without distraction.</li>

<li>Prayerfully go through the lecture outline.</li>

<li>Have your Bible handy to read up the scriptural references.</li>

<li>Take down notes in a notepad or on your device or tab so that you can refer to it after the class.</li>

<li>Take a picture as evidence that you took the class, showing you in relation to your laptop or device (kindly email it to us).</li>

<li>Write down action points on what you will do after the class.</li>

<li>Spend time to speak in other tongues at the end of the class so the word can get into your spirit.</li>

<li>Meditate on all you have learnt and do the word.</li>
<li>Invite a friend to register and take the classes also</li>
<li>Send a feedback to us via email.</li></b>


 <br>
 <br>";

 

echo $essay;
  //$ref_id = $r['ref_id'];
echo "<br>";
echo "<br>";
echo "<br>";
echo '<center><button type="button" style="background:#008bc4; padding: 15px;color: #ffffff" class="btn btn-default pull-center"><i class="fa fa-plus"></i><a href="assessment.php?id= '.$r['id'].'"><font color="#ffffff">  Start Assessment</font></a></button></center>';

 
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
