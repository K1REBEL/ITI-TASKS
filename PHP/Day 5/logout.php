<?php include('sess_start.php'); ?>

<?php
   session_unset();

   setcookie(session_name(), '', time()-1000, '/');
   
   session_destroy();

   header("Location: login.php");
?>