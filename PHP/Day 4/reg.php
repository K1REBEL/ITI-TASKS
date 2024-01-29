<?php
// print_r($_GET);

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

   if(isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["gender"])){
      $username = $_GET["name"];
      $email = $_GET["email"];
      $gender = $_GET["gender"];
      if(isset($_GET["agree"])){
         $checked = 1;
      }else{
         $checked = 0;
      }
   }

   $sql = "INSERT INTO users(username, email, gender, agreement) 
   VALUES ( '$username', '$email', '$gender', $checked )";

   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval ) {
      die('Could not insert to table: ' . mysqli_error($conn));
   }
    
   echo "<br>Data inserted to table successfully\n";
   mysqli_close($conn);
?>