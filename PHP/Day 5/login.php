<?php include('sess_start.php'); ?>

<?php
if(isset($_SESSION['username'])){
   header("Location: home.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
</head>
<body>
<form action="#" method="POST">
      <table>
         <tr>
            <td>Name or Email:</td>
            <td><input type="text" name="name_email"></td>
         </tr>
         <tr>
            <td>Password:</td>
            <td>
               <input type="password" name="pass">
            </td>
         </tr>
         <tr>
            <td><input type="submit" value="Submit"></td>
         </tr>
      </table>
   </form>

   <?php
   if(isset($_POST['name_email']) && isset($_POST['pass'])){
      // $target = $_GET["id"];
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '';
      $dbname ='PHP';
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

      $query = $_POST['name_email'];
      $pass = $_POST['pass'];
   
      if(! $conn ) {
         die('Could not connect: ' . mysqli_error($conn));
      }
   
      echo 'Connected successfully<br>';
      mysqli_select_db($conn, $dbname);

      $sql = "SELECT user_id, username, email, pass FROM day5 WHERE username = '$query' OR email = '$query'";
      $result = mysqli_query($conn, $sql);
   
      if( !$result ) {
         die('Could not get data: ' . mysqli_error($conn));
      }

      if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
            if($pass == $row['pass']){

               $_SESSION['username'] = $row['username'];
               $_SESSION['email'] = $row['email'];
               $_SESSION['pass'] = $row['pass'];
               break;
            }
         }
      } else {
         echo "Please signup first. <br>" . "<a href=\"signup.php\"><button>Sign Up</button></a>" . "<br>";
      }

      mysqli_free_result($result);
      echo "Fetched data successfully <br>";
      mysqli_close($conn);
      header("Location: home.php");
   }
   ?>
</body>
</html>