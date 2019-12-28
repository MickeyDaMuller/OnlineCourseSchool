<?php
session_start();
unset($_SESSION['login_user']);
unset($_SESSION['startedAss']);
session_destroy();
header('Location: login.php');  
?>