<?php include('sess_start.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>
</head>
<body>
   <?php
   echo
   "Logged in user:" .
   "Name: " . $_SESSION['username'] . "<br>" .
   "E-mail: " . $_SESSION['email'] . "<br>" .
   "Password: " . $_SESSION['pass'] . "<br>" .
   "shhh don't tell anyone your password!" . "<br>";
   ?>

   <form action="logout.php" method="POST"><button type="submit">Logout</button></form>
</body>
</html>