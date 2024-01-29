<?php
   // print_r($_GET);
   $target = $_GET["id"];
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='PHP';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   echo 'Connected successfully<br>';
   mysqli_select_db( $conn, $dbname );

   $sql = "DELETE FROM users WHERE user_id = $target";
   $deletion = mysqli_query($conn, $sql);
   
   if( !$deletion ) {
      die('Could not delete record: ' . mysqli_error($conn));
   }

   echo "Deleted target successfully <br>";
   mysqli_close($conn);
?>