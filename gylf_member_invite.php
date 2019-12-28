<?php 
 require 'phpmailer/PHPMailerAutoload.php'; 
mysql_connect ("web01.enterthehealingschool.org", "youthleaders", "nwljrcn8-@dl") or die ('Error:' . mysql_error());
		  mysql_select_db ("youthlea_gylf");

$fullname= "";
	$my_email= "";
	//$link = "http://www.christembassy-ism.org/autumn2017";
	
function getCountry($country_id)
{
$result = mysql_query("SELECT country_name from countries where country_id = '".$country_id."'");
if(!$result)
die("Record not found: ".mysql_error()."Country");
else
$records = mysql_fetch_assoc($result);
return $records['country_name'];
}
	
if (isset($_REQUEST["my_email"]))
	{

	
	$fullname= trim($_REQUEST["fullname"]);
	$my_email= trim($_REQUEST["my_email"]);  
	$name= $_REQUEST["name"];
	$email= $_REQUEST["email"];
	$country = $_REQUEST['country'];
	//$com_code = md5(uniqid(rand()));
	
	
		  $result = mysql_query("select memberId from gylf_new_gen_member where my_email = '$my_email'");
		  $memberId = 0;
		  if (mysql_num_rows($result) == 0)
		  {
		  		 $query= "INSERT into gylf_new_gen_member(fullname, my_email, date) VALUES('".$fullname."', '".$my_email."', ".date("Ymd").")";
		  		 mysql_query($query) or die('error submitting your form'.mysql_error());
			  	 $memberId = mysql_insert_id();
		  }//end if
		  
		  else{
			  $record = mysql_fetch_assoc($result);
			  $memberId = $record['memberId'];
		 
		  }//end else
		  
		  
		 $count = 0; 
		  foreach($name as $invitee_name )
	   		{




	  		//echo "<br>Invitee: ".$invitee_name;
			  $invitee_email = $email[$count]; 
			  $invitee_country = $country[$count];
			  $com_code = md5(uniqid(rand()));
			  $pass = 'invitee';
			  $com_code = md5(uniqid(rand()));
			 //echo " Email: ".$invitee_email;
			  $count++;
			  if($invitee_email == "")
			   continue;
$result1 = mysql_query("select email from ieyc_invitee where email = '$invitee_email'");

			   if (mysql_num_rows($result1) == 0)
		  {
			  $qry= "INSERT into ieyc_invitee( memberId, email, fullname, country,event,com_code) VALUES('".$memberId."', '".$invitee_email."', '".$invitee_name."', '".$invitee_country."', 'invited', '".$com_code."')";
			   mysql_query($qry) or die('error submitting your form'.mysql_error());
			  
			send_invitation($invitee_name, $fullname, $invitee_email, $com_code, $pass);
			}
	   		}//end foreach
			   echo "<br>Thank you for participating!. <br><br>Invite more friends<br><br> ";
			
	}//end else
	
	
		
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Global Youth Leaders' Forum Academy</title>
<style type="text/css">
<!--
.style3 {
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style7 {color: #990000}
.style8 {font-size: 12px}
.style11 {font-family: "Times New Roman", Times, serif}
.headtext {
	color:#FFF;
	font-family:Verdana, Geneva, sans-serif;
}
-->
</style>
</head>
 <SCRIPT TYPE = "text/javascript">
					<!--
					function validation()
					{
						var return_value = true;
						var error_text = "";
						var pretext = "You left these fields blank:\n\n";
						if(document.f.my_name.value == "" )
						{
						error_text = error_text + "YOUR FULLNAME\n\n";
						}	
										
						if(document.f.my_email.value == "")
						{
						error_text = error_text + "YOUR EMAIL\n\n";
						}
						if(document.f.country.value == "")
						{
						error_text = error_text + "COUNTRY\n\n";
						}
						
						
						
						if(error_text != "")
						{
						return_value = false;
						alert(pretext+error_text);
						}
						
						return return_value;

					}
					
					
					
					
					//-->
					</SCRIPT>
           <table class="bd" width="100%">
             <tr><td bgcolor="#0099FF" class="hr"><h2 align="center"><span class="headtext">Invite your family and friends to join the Global Youth Leaders Forum</span> </h2></td></tr></table>
         
	  <form target="_self" method="post" action="gylf_member_invite.php" id="f" name="f" ONSUBMIT=" return validation()">
	
	<fieldset>
	<legend >Your Information</legend>
		<p>Fullname:
          <input type="text" name="fullname" value="<?php echo $fullname ?>"> Email: <input type="text" name="my_email" value="<?php echo $my_email ?>">
		</p>
		
		  
		  <br>
	    </p>
		<fieldset><legend >Your Invitees Information</legend><div id="fields">
		  
		  
		  Name: <input type="text" name="name[]"> Email: <input type="text" name="email[]"> Country: 
          <select name="country[]">
        <option value="">Select Country</option>
        <?php 

		for($i=1; $i<=250; $i++)
		{
			$countr=getCountry($i);
?>
        <option value="<?php echo "$countr"; ?>"> <?php  echo "$countr"; ?> </option>
        <?php } ?>
      </select>
		  
	    </div></fieldset>
<br>
	<input type="button" id="addFieldButton" value="Add More Names"><br><br />
	<input name="Submit" value="Submit" type="submit" >
</form>
<?php

function send_invitation($invitee_name, $fullname, $invitee_email, $com_code, $pass)
{
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
$mail->addAddress($invitee_email);               // Name is optional
$mail->addReplyTo('contact@globalyouthleadersforum.org', "Global Youth Leaders' Forum");
//$mail->addCC('iexcel4ever@gmail.com');
$mail->addBCC('contact@globalyouthleadersforum.org');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                 

$mail->Subject = ucwords($invitee_name).", ".ucwords($fullname)." sent you a link to attend the International Easter Youth Camp 2018";
$mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style2 {
	color: #333333;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style3 {color: #000000; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.gred {color: #000000;
background-color: #FFF8CC;
border:#CCCC00 solid;
padding: 10px; 
font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>
</head>

<body bgcolor="#F7F7F7">
<table width="648" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <!--DWLayoutTable-->
  <tr>
    <td width="648" height="27" valign="middle" bgcolor="#3B5998"><div style="color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-weight: bold;"><img src="http://www.globalyouthleadersforum.org/assets/images/logoscroll.png" height="50"  />&nbsp;&nbsp;&nbsp;Global Youth Leaders Forum. </div></td>
  </tr>
  <tr>
    <td height="270" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <!--DWLayoutTable-->
      <tr>
        <td width="11" height="26">&nbsp;</td>
          <td width="618">&nbsp;</td>
          <td width="19">&nbsp;</td>
        </tr>
      <tr>
        <td height="123">&nbsp;</td>
          <td valign="middle"><div class="style2">Dear  
              '.ucwords($invitee_name).',<br />
            </div>          <div class="style2">
              <p>'.ucwords($fullname).' pre-registered you to join the Global Youth Leaders Forum.<br>

<p>Kindly follow the link below to complete your registration.<br>

<a href="http://www.globalyouthleadersforum.org/confirm_invitee_new_gen.php?passkey=$com_code">Complete Registration</a><br><br><br>

<b>Link: </b> http://www.globalyouthleadersforum.org/confirm_invitee_new_gen.php?passkey=$com_code<br><br>


Thank you,<br>

<b>The GLobal Youth Leaders Forum</b>.

                <br />
              </p>
            </div></td>
          <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="11"></td>
        <td></td>
        <td></td>
      </tr>
      
      
   
    </table></td>
  </tr>
</table>
</body>
</html>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  // echo "<div align='center'>Congratulations! You have successfully invited your friends and family.</div>";
   echo '<script>alert("Congratulations! You have successfully invited your friends and family.")</script>';

   echo '<script>
  window.location.href = "gylf_member_invite.php";
</script>';


 //  header('window.location: ieyc_member_invite.php');
   


}

 
$conn->close();

}//end fn


?>

<script type="text/javascript">

// JavaScript Document
var xmlHttp;
var option;

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 	option = document.createElement('div');
	option.innerHTML = xmlHttp.responseText;
 } 
}

xmlHttp = GetXmlHttpObject();

if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 }

var url="getCountries.php";
url=url+"?sid="+Math.random();
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);


    document.getElementById('addFieldButton').onclick = function() {
    fDiv = document.getElementById('fields');
   fDiv.appendChild(document.createElement('br'));
	fDiv.appendChild(document.createElement('br'));
   fDiv.appendChild(document.createTextNode("Name: "));
    field = document.createElement('input');
    field.setAttribute('type', 'text');
    field.setAttribute('name', 'name[]');
 	fDiv.appendChild(field);
	fDiv.appendChild(document.createTextNode(" Email: "));
	field = document.createElement('input');
    field.setAttribute('type', 'text');
    field.setAttribute('name', 'email[]');
	fDiv.appendChild(field);
	
	fDiv.appendChild(document.createTextNode("Country: "));
	
	field = document.createElement('select');
	field.setAttribute('name', 'country[]');
	field.innerHTML = xmlHttp.responseText;
	fDiv.appendChild(field);
}
    </script>
    
    
</table>

</body>
</html>
