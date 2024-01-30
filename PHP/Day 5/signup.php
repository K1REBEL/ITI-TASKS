<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Signup</title>
</head>
<body>
<form action="#" method="POST">
      <table>
         <tr>
            <td>Name:</td>
            <td><input type="text" name="name"></td>
         </tr>
         <tr>
            <td>E-mail:</td>
            <td><input type="email" name="email"></td>
         </tr>
         <tr>
            <td>Password:</td>
            <td>
               <input type="password" name="pass">
            </td>
         </tr>
         <tr>
            <td>Confirm Password:</td>
            <td>
               <input type="password" name="cpass">
            </td>
         </tr>
         <tr>
            <td>I've read the terms of service</td>
            <td><input type="checkbox" name="read"></td>
         </tr>
         <tr>
            <td><input type="submit" value="Submit"></td>
         </tr>
      </table>
   </form>

   <?php

   if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['read'])){
      print_r($_POST);
      if($_POST['pass'] == $_POST['cpass']){
         // echo "they match";
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $dbname ='PHP';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error($conn));
         }
   
         echo 'Connected successfully<br>';
         mysqli_select_db($conn, $dbname);


            $username = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["pass"];
         
         $sql = "INSERT INTO day5(username, email, pass) 
         VALUES ( '$username', '$email', '$password' )";

         $retval = mysqli_query($conn, $sql);
   
         if( !$retval ) {
            die('Could not insert to table: ' . mysqli_error($conn));
         }
    
         echo "<br>Data inserted to table successfully <br>";
         mysqli_close($conn);

         header("Location: login.php");
      } else{ echo "passwords don't match"; }
   }else{ echo "You've missed something"; }
   ?>
</body>
</html>