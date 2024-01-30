
<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='PHP';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   echo 'Connected successfully';

   $sql = "create database $dbname";
     $retval = mysqli_query($conn, $sql);
   
   if( !$retval ) {
      die('Could not create database: ' . mysqli_error($conn));
   }
   
   mysqli_select_db($conn, $dbname);
   echo "Database <span style='color:red'>$dbname </span>created & selected successfully <br>";

   $sql = 'CREATE TABLE day5( user_id INT NOT NULL AUTO_INCREMENT,
      username VARCHAR(50) NOT NULL,
      email VARCHAR(50) NOT NULL,
      pass VARCHAR(50) NOT NULL,
      primary key ( user_id ))';

   $retval = mysqli_query($conn, $sql);
   if( !$retval ) {
      die('Could not create table: ' . mysqli_error($conn));
   }
    
   echo "<br>Database Table created successfully";
   mysqli_close($conn);
?>
