<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Profile View</title>
</head>
<body>
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

   $sql = "SELECT user_id, username, email, gender, agreement FROM users WHERE user_id = $target";
   $result = mysqli_query($conn, $sql);
   
   if(! $result ) {
      die('Could not get data: ' . mysqli_error($conn));
   }

   if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
         echo 
         "USER ID :{$row['user_id']}  <br> ".
         "Name : {$row['username']} <br> ".
         "E-mail : {$row['email']} <br> ".
         "Gender : {$row['gender']} <br> ".
         "Agreed on sending e-mails? : {$row['agreement']} <br> ";

         echo "<a href=\"edit.php?id={$row['user_id']}\"><button>Edit</button></a>";
         echo "<a href=\"delete.php?id={$row['user_id']}\"><button>Delete</button></a>" . "<br>";
         echo"--------------------------------<br>";
      }
   } else {
      echo "0 results";
   }

   mysqli_free_result($result);
   echo "Fetched data successfully <br>";
   mysqli_close($conn);
   ?>
</body>
</html>