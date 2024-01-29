<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update User Record</title>
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
   
   // echo 'Connected successfully<br>';
   mysqli_select_db( $conn, $dbname );

   $sql = "SELECT user_id, username, email, gender, agreement FROM users WHERE user_id = $target";
   $result = mysqli_query($conn, $sql);
   
   if(! $result ) {
      die('Could not get data: ' . mysqli_error($conn));
   }

   if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
         $username = $row['username'];
         $email = $row['email'];
         $gender = $row['gender'];
         $agreed = $row['agreement'];

         print("
            <form action=\"#\" method=\"POST\">
               <table>
                  <tr>
                     <td>Name:</td>
                     <td><input type=\"text\" name=\"name\" value=\"$username\"></td>
                  </tr>
                  <tr>
                     <td>E-mail:</td>
                     <td><input type=\"email\" name=\"email\" value=\"$email\"></td>
                  </tr>");
         if($gender == 'Male'){
            print("
                  <tr>
                     <td>Gender:</td>
                     <td>
                        <input type=\"radio\" name=\"gender\" value=\"Male\" checked>
                        <label for=\"male\">Male</label>
                        <input type=\"radio\" name=\"gender\" value=\"Female\">
                        <label for=\"female\">Female</label>
                     </td>
                  </tr>");
         }else{
            print("
                  <tr>
                     <td>Gender:</td>
                     <td>
                        <input type=\"radio\" name=\"gender\" value=\"Male\">
                        <label for=\"male\">Male</label>
                        <input type=\"radio\" name=\"gender\" value=\"Female\" checked>
                        <label for=\"female\">Female</label>
                     </td>
                  </tr>");
         }
         if($agreed == 1){
            print("
                  <tr>
                     <td>Receive E-mails from us</td>
                     <td><input type=\"checkbox\" name=\"agree\" checked></td>
                  </tr>
            ");
         }else{
            print("
                  <tr>
                     <td>Receive E-mails from us</td>
                     <td><input type=\"checkbox\" name=\"agree\"></td>
                  </tr>
            ");
         }
         print("
                  <tr>
                     <td><input type=\"submit\" value=\"Submit\"></td>
                  </tr>
               </table>
            </form>
         ");
      }
   } else {
      echo "User Not Found!";
   }

   mysqli_free_result($result);
   echo "Fetched user data successfully <br>";
   ?>

   <?php
   // print_r($_POST);

   if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["gender"])){
      $username = $_POST["name"];
      $email = $_POST["email"];
      $gender = $_POST["gender"];
      if(isset($_POST["agree"])){
         $checked = 1;
      }else{
         $checked = 0;
      }
   }

   $sql = "UPDATE users 
            SET username = '$username', email = '$email', gender = '$gender', agreement = $checked 
            WHERE user_id = '$target'";

   $update = mysqli_query( $conn, $sql );
      
   if( !$update ) {
      die('Could not update table: ' . mysqli_error($conn));
   }
 
   echo "<br>Data updated in table successfully";
   mysqli_close($conn);
   ?>
</body>
</html>