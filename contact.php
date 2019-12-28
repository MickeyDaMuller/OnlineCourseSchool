


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

        if( document.contactform.email.value == "" )
         {
            alert( "Please provide your email!" );
            document.contactform.email.focus() ;
            return false;
         }

         if( document.contactform.name.value == "" )
         {
            alert( "Please provide your fullname!" );
            document.contactform.name.focus() ;
            return false;
         }
    
         //alert(document.contactform.country.value);
         if( document.contactform.country.value == "unspecified" )
         {
            alert( "Please select your country!" );
            document.contactform.country.focus() ;
            return false;
         }
if( document.contactform.question.value == "" )
         {
            alert( "Please provide your message!" );
            document.contactform.question.focus() ;
            return false;
         }
if( document.contactform.captcha.value == "" )
         {
            alert( "Please enter the CAPTCHA digits in the box provided!" );
            document.contactform.captcha.focus() ;
            return false;
         }
  
         return true;
      }
      </script>

</head>
<body>

  <script type="text/javascript">function add_chatinline(){var hccid=31552097;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>

   <header id="header">
    <div class="container">
      <a href="index.php" id="logo" title="GYLF Academy">GYLF Academy</a>
      <div class="menu-trigger"></div>
      <nav id="menu">
        <ul>
          <!--li><a href="events.html">Students</a></li-->
          <li><a href="index.php">Home</a></li>
         <li><a href="#about">About us</a></li>
          <li><a href="http://globalyouthleadersforum.org/gylf_academy/#sidebar">Courses</a></li>
          <!--li><a href="gallery.php">Students</a></li-->
          
        </ul>
        <ul>
          <!--li><a href="gallery.php">Gallery</a></li-->
          <li><a href="events.php">Events</a></li>
          
          <li class="current"><!--a href="#fancy" class="get-contact"--><a href="contact.php">Contact</a></li>
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
    
    <h2><div style = "background-color:#008bc4; color:#FFFFFF; padding:5px"><center><b>Contact Us</b></center></div></h2>
        
            <div style = "margin:20px">
               
               <form action = "thankyoucontact.php" method = "post" name="contactform" id="contactform" onsubmit="return validate()">
                                 <div class="form-group">
                                 <label><font color="#008bc4">Email:</font></label>
                              <input type="text" id="email" name="email" id="email" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>

                         <div class="form-group">
                         <label><font color="#008bc4">Fullname:</font></label>
                              <input type="text" name="name" id="name" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 60px; padding-right: 50px; text-align: center;" required>
                          </div>
                          <br>
<div class="form-group">
<label><font color="#008bc4">Country:</font></label>
<fieldset class="center" name="countryF" id="countryF" style="border:2px solid #008bc4; padding: 1px; padding-left: 10px; padding-right: 10px; text-align: center;" required>
                             <select name="country" id="country" required>
             <option value="unspecified" selected="selected"></option>
                                          <option value="Afghanistan" >Afghanistan </option>
                                          <option value="Albania">Albania </option>
                                          <option value="Algeria">Algeria </option>
                                          <option value="American Samoa ">American Samoa </option>
                                          <option value="Andorra">Andorra </option>
                                          <option value="Angola">Angola </option>
                                          <option value="Anguilla">Anguilla </option>
                                          <option value="Antarctica">Antarctica </option>
                                          <option value="Antigua And Barbuda ">Antigua And Barbuda </option>
                                          <option value="Argentina">Argentina </option>
                                          <option value="Armenia">Armenia </option>
                                          <option value="Aruba">Aruba </option>
                                          <option value="Australia">Australia </option>
                                          <option value="Austria">Austria </option>
                                          <option value="Azerbaijan">Azerbaijan </option>
                                          <option value="Bahamas, The ">Bahamas, The </option>
                                          <option value="Bahrain">Bahrain </option>
                                          <option value="Bangladesh">Bangladesh </option>
                                          <option value="Barbados">Barbados </option>
                                          <option value="Belarus">Belarus </option>
                                          <option value="Belgium">Belgium </option>
                                          <option value="Belize">Belize </option>
                                          <option value="Benin">Benin </option>
                                          <option value="Bermuda">Bermuda </option>
                                          <option value="Bhutan">Bhutan </option>
                                          <option value="Bolivia">Bolivia </option>
                                          <option value="Bosnia and Herzegovina ">Bosnia and Herzegovina </option>
                                          <option value="Botswana">Botswana </option>
                                          <option value="Bouvet">Bouvet Island </option>
                                          <option value="Brazil">Brazil </option>
                                          <option value="British Indian Ocean Territory ">British Indian Ocean Territory </option>
                                          <option value="Brunei">Brunei </option>
                                          <option value="Bulgaria">Bulgaria </option>
                                          <option value="Burkina Faso ">Burkina Faso </option>
                                          <option value="Burundi">Burundi </option>
                                          <option value="Cambodia">Cambodia </option>
                                          <option value="Cameroon">Cameroon </option>
                                          <option value="Canada">Canada </option>
                                          <option value="Cape Verde">Cape Verde </option>
                                          <option value="Cayman">Cayman Islands </option>
                                          <option value="Central African Republic">Central African Republic </option>
                                          <option value="Chad">Chad </option>
                                          <option value="Chile">Chile </option>
                                          <option value="China">China </option>
                                          <option value="China (Hong Kong S.A.R.) ">China (Hong Kong S.A.R.) </option>
                                          <option value="China (Macau S.A.R.) ">China (Macau S.A.R.) </option>
                                          <option value="Christmas Island">Christmas Island </option>
                                          <option value="Cocos (Keeling) Islands ">Cocos (Keeling) Islands </option>
                                          <option value="Colombia">Colombia </option>
                                          <option value="Comoros">Comoros </option>
                                          <option value="Congo">Congo </option>
                                          <option value="Congo, Democractic Republic of the ">Congo, Democractic Republic of the </option>
                                          <option value="Cook Islands">Cook Islands </option>
                                          <option value="Costa Rica">Costa Rica </option>
                                          <option value="Cote D Ivoire (Ivory Coast) ">Cote D'Ivoire (Ivory Coast) </option>
                                          <option value="Croatia (Hrvatska) ">Croatia (Hrvatska) </option>
                                          <option value="Cuba">Cuba </option>
                                          <option value="Cyprus">Cyprus </option>
                                          <option value="Czech Republic">Czech Republic </option>
                                          <option value="Denmark">Denmark </option>
                                          <option value="Djibouti">Djibouti </option>
                                          <option value="Dominica">Dominica </option>
                                          <option value="Dominican Republic">Dominican Republic </option>
                                          <option value="East">East Timor </option>
                                          <option value="Ecuador">Ecuador </option>
                                          <option value="Egypt">Egypt </option>
                                          <option value="El Salvador">El Salvador </option>
                                          <option value="Equatorial Guinea">Equatorial Guinea </option>
                                          <option value="Eritrea">Eritrea </option>
                                          <option value="Estonia">Estonia </option>
                                          <option value="Ethiopia">Ethiopia </option>
                                          <option value="Falkland Islands (Islas Malvinas) ">Falkland Islands (Islas Malvinas) </option>
                                          <option value="Faroe Islands">Faroe Islands </option>
                                          <option value="Fiji Islands">Fiji Islands </option>
                                          <option value="Finland">Finland </option>
                                          <option value="France">France </option>
                                          <option value="French Guiana">French Guiana </option>
                                          <option value="French Polynesia">French Polynesia </option>
                                          <option value="French Southern Territories">French Southern Territories </option>
                                          <option value="Gabon">Gabon </option>
                                          <option value="Gambia, The ">Gambia, The </option>
                                          <option value="Georgia">Georgia </option>
                                          <option value="Germany">Germany </option>
                                          <option value="Ghana">Ghana </option>
                                          <option value="Gibraltar">Gibraltar </option>
                                          <option value="Greece">Greece </option>
                                          <option value="Greenland">Greenland </option>
                                          <option value="Grenada">Grenada </option>
                                          <option value="Guadeloupe">Guadeloupe </option>
                                          <option value="Guam">Guam </option>
                                          <option value="Guatemala">Guatemala </option>
                                          <option value="Guinea">Guinea </option>
                                          <option value="Guinea-Bissau">Guinea-Bissau </option>
                                          <option value="Guyana">Guyana </option>
                                          <option value="Haiti">Haiti </option>
                                          <option value="Heard and McDonald Islands ">Heard and McDonald Islands </option>
                                          <option value="Honduras">Honduras </option>
                                          <option value="Hungary">Hungary </option>
                                          <option value="Iceland">Iceland </option>
                                          <option value="India">India </option>
                                          <option value="Indonesia">Indonesia </option>
                                          <option value="Iran">Iran </option>
                                          <option value="Iraq">Iraq </option>
                                          <option value="Ireland">Ireland </option>
                                          <option value="Israel">Israel </option>
                                          <option value="Italy">Italy </option>
                                          <option value="Jamaica">Jamaica </option>
                                          <option value="Japan">Japan </option>
                                          <option value="Jordan">Jordan </option>
                                          <option value="Kazakhstan">Kazakhstan </option>
                                          <option value="Kenya">Kenya </option>
                                          <option value="Kiribati">Kiribati </option>
                                          <option value="Korea">Korea </option>
                                          <option value="Korea North">Korea, North </option>
                                          <option value="Kuwait">Kuwait </option>
                                          <option value="Kyrgyzstan">Kyrgyzstan </option>
                                          <option value="Laos">Laos </option>
                                          <option value="Latvia">Latvia </option>
                                          <option value="Lebanon">Lebanon </option>
                                          <option value="Lesotho">Lesotho </option>
                                          <option value="Liberia">Liberia </option>
                                          <option value="Libya">Libya </option>
                                          <option value="Liechtenstein">Liechtenstein </option>
                                          <option value="Lithuania">Lithuania </option>
                                          <option value="Luxembourg">Luxembourg </option>
                                          <option value="Macedonia">Macedonia </option>
                                          <option value="Madagascar">Madagascar </option>
                                          <option value="Malawi">Malawi </option>
                                          <option value="Malaysia">Malaysia </option>
                                          <option value="Maldives">Maldives </option>
                                          <option value="Mali">Mali </option>
                                          <option value="Malta">Malta </option>
                                          <option value="Marshall Islands">Marshall Islands </option>
                                          <option value="Martinique">Martinique </option>
                                          <option value="Mauritania">Mauritania </option>
                                          <option value="Mauritius">Mauritius </option>
                                          <option value="Mayotte">Mayotte </option>
                                          <option value="Mexico">Mexico </option>
                                          <option value="Micronesia">Micronesia </option>
                                          <option value="Moldova">Moldova </option>
                                          <option value="Monaco">Monaco </option>
                                          <option value="Mongolia">Mongolia </option>
                                          <option value="Montserrat">Montserrat </option>
                                          <option value="Morocco">Morocco </option>
                                          <option value="Mozambique">Mozambique </option>
                                          <option value="Myanmar">Myanmar </option>
                                          <option value="Namibia">Namibia </option>
                                          <option value="Nauru">Nauru </option>
                                          <option value="Nepal">Nepal </option>
                                          <option value="The Netherlands Antilles">The Netherlands Antilles </option>
                                          <option value="The Netherlands">The Netherlands, The </option>
                                          <option value="New Caledoria">New Caledonia </option>
                                          <option value="New Zealand">New Zealand </option>
                                          <option value="Nicaragua">Nicaragua </option>
                                          <option value="Niger">Niger </option>
                                          <option value="Nigeria">Nigeria </option>
                                          <option value="Niue">Niue </option>
                                          <option value="Norfolk Island">Norfolk Island </option>
                                          <option value="Northern Mariana Islands">Northern Mariana Islands </option>
                                          <option value="Norway">Norway </option>
                                          <option value="Oman">Oman </option>
                                          <option value="Pakistan">Pakistan </option>
                                          <option value="Palau">Palau </option>
                                          <option value="Panama">Panama </option>
                                          <option value="Papua New Guinea">Papua new Guinea </option>
                                          <option value="Paraguay">Paraguay </option>
                                          <option value="Peru">Peru </option>
                                          <option value="Philippines">Philippines </option>
                                          <option value="Pitcairn Island">Pitcairn Island </option>
                                          <option value="Poland">Poland </option>
                                          <option value="Portugal">Portugal </option>
                                          <option value="Puerto Rico">Puerto Rico </option>
                                          <option value="Qatar">Qatar </option>
                                          <option value="Reunion">Reunion </option>
                                          <option value="Romania">Romania </option>
                                          <option value="Russia">Russia </option>
                                          <option value="Rwanda">Rwanda </option>
                                          <option value="Saint Helena">Saint Helena </option>
                                          <option value="Saint Kitts and Nevis">Saint Kitts And Nevis </option>
                                          <option value="Saint Lucia">Saint Lucia </option>
                                          <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon </option>
                                          <option value="Saint Vincent">Saint Vincent And The Grenadines </option>
                                          <option value="Samoa">Samoa </option>
                                          <option value="San Marino">San Marino </option>
                                          <option value="Sao Tome and Principe">Sao Tome and Principe </option>
                                          <option value="Saudi Arabia">Saudi Arabia </option>
                                          <option value="Scotland">Scotland </option>
                                          <option value="Senegal">Senegal </option>
                                          <option value="Seychelles">Seychelles </option>
                                          <option value="Sierra Leone">Sierra Leone </option>
                                          <option value="Singapore">Singapore </option>
                                          <option value="Slovakia">Slovakia </option>
                                          <option value="Slovenia">Slovenia </option>
                                          <option value="Solomon Islands">Solomon Islands </option>
                                          <option value="Somalia">Somalia </option>
                                          <option value="South Africa">South Africa </option>
                                          <option value="South Georgia">South Georgia </option>
                                          <option value="Spain">Spain </option>
                                          <option value="Sri Lanka">Sri Lanka </option>
                                          <option value="Sudan">Sudan </option>
                                          <option value="Suriname">Suriname </option>
                                          <option value="Svalbard And Jan Mayen Islands ">Svalbard And Jan Mayen Islands </option>
                                          <option value="Swaziland ">Swaziland </option>
                                          <option value="Sweden ">Sweden </option>
                                          <option value="Switzerland ">Switzerland </option>
                                          <option value="Syria ">Syria </option>
                                          <option value="Taiwan ">Taiwan </option>
                                          <option value="Tajikistan ">Tajikistan </option>
                                          <option value="Tanzania ">Tanzania </option>
                                          <option value="Thailand ">Thailand </option>
                                          <option value="Togo ">Togo </option>
                                          <option value="Tokelau ">Tokelau </option>
                                          <option value="Tonga ">Tonga </option>
                                          <option value="Trinidad And Tobago ">Trinidad And Tobago </option>
                                          <option value="Tunisia ">Tunisia </option>
                                          <option value="Turkey ">Turkey </option>
                                          <option value="Turkmenistan ">Turkmenistan </option>
                                          <option value="Turks And Caicos Islands ">Turks And Caicos Islands </option>
                                          <option value="Tuvalu ">Tuvalu </option>
                                          <option value="Uganda ">Uganda </option>
                                          <option value="Ukraine ">Ukraine </option>
                                          <option value="United Arab Emirates ">United Arab Emirates </option>
                                          <option value="United Kingdom ">United Kingdom </option>
                                          <option value="United States ">United States </option>
                                          <option value="United States Minor Outlying Islands ">United States Minor Outlying Islands </option>
                                          <option value="Uruguay ">Uruguay </option>
                                          <option value="Uzbekistan ">Uzbekistan </option>
                                          <option value="Vanuatu ">Vanuatu </option>
                                          <option value="Vatican City State (Holy See) ">Vatican City State (Holy See) </option>
                                          <option value="Venezuela ">Venezuela </option>
                                          <option value="Vietnam ">Vietnam </option>
                                          <option value="Virgin Islands (British) ">Virgin Islands (British) </option>
                                          <option value="Virgin Islands (US) ">Virgin Islands (US) </option>
                                          <option value="Wallis And Futuna Islands ">Wallis And Futuna Islands </option>
                                          <option value="Western Sahara ">Western Sahara </option>
                                          <option value="Yemen ">Yemen </option>
                                          <option value="Yugoslavia ">Yugoslavia </option>
                                          <option value="Zambia ">Zambia </option>
                                          <option value="Zimbabwe  ">Zimbabwe </option>
          </select>
                          </div>
                          <br>
                          <div class="form-group">
                          <label><font color="#008bc4">Your Message:</font></label>
                              <textarea type="text" name="question" id="question" class="form-control" style="border:2px solid #008bc4; padding: 20px; padding-left: 50px; padding-right: 50px; text-align: center;" required></textarea>
                          </div>

<br>

<p><img src="/captcha.php" width="120" height="30" border="1" alt="CAPTCHA"></p>
<p><input type="text" size="6" style="border:1px solid #008bc4; padding: 5px" maxlength="5" name="captcha" id="captcha" value=""><br>
<small>copy the digits from the image into this box</small></p>

<br>

<div class="form-group">
                            <!--center><input type = "submit" value = " Submit " style="background:rgb(255,165,0); padding: 10px; border: 0; text-align: center; font-size: 16px;color:#ffffff "/></center-->

<button class="btn blue" name="loginSubmit" id="loginSubmit" type="submit">Submit</button>

                        </div>



<!--center><a href="registrations.php"><strong><b><font color="#008bc4">Not a member? Sign up</font></b></strong></a></center-->
                          </div>

                         

                  

               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
          
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
