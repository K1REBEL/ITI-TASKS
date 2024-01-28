<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Day 3 Part 2</title>
   <style> span{ color: red; } </style>
</head>
<body>
<?php
   require_once 'students.php';
   ?>

<table>
   <tr><th>Name</th><th>Email</th><th>Status</th></tr>
   <?php
   foreach($students as $student) {
      $name = $student["name"];
      $email = $student["email"];
      $status = $student["status"];

      if($student["status"] == 'PHP'){
         echo "<tr> <td><span>$name</span></td> <td><span>$email</span></td> <td><span>$status</span></td> </tr>";
      }else{
         echo "<tr> <td>$name</td> <td>$email</td> <td>$status</td> </tr>";
      }
   }
   ?>
</table>
</body>
</html>

