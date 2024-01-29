<?php
// print_r($_GET);
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='PHP';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if( !$conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   echo 'Connected successfully<br>';
   
   mysqli_select_db($conn, $dbname);

   $sql = 'SELECT user_id, username, email, gender, agreement FROM users';
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

         echo "<a href=\"view.php?id={$row['user_id']}\"><button>View</button></a>";
         echo "<a href=\"edit.php?id={$row['user_id']}\"><button>Edit</button></a>";
         echo "<a href=\"delete.php?id={$row['user_id']}\"><button>Delete</button></a>" . "<br>";

         echo"--------------------------------<br>";
      }
   } else {
      echo "0 results";
   }

   mysqli_free_result($result);
   echo "Fetched data successfully";
   mysqli_close($conn);
   ?>