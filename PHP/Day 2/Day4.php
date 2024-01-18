<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Day 2 Tasks</title>
</head>
<body>
   <h2>Task 1</h2>
   <?php
      // "\n" starts a new line if the php code is run on a linux based OS,
      // but to start a new line on windows "\r\n" is used instead.
      // Another method of doing so is to concat the constant PHP_EOL after the string to start a new line.
      // nl2br() is another built in function that replaces "\n", "\r\n", "\r" with a "<br>" tag
      echo nl2br("Task 1 is to figure out how to \\n \n");
      echo 'So, did it work?';
   ?>
   <hr>
   <h2>Task 2</h2>
   <?php
      print("<pre>".print_r($_SERVER, true)."</pre>");
   ?>
   <hr>
   <h2>Task 3</h2>
   <?php

      $vals[1] = 45;
      $vals[0] = 12;
      $vals[3] = 25;
      $vals[2] = 10;
      
      $arr_sum = array_sum($vals);
      $avg = array_sum($vals)/count($vals);
      arsort($vals);
      foreach ($vals as $key => $val) {
         echo "$key => $val ";
      }
      echo "Sum of values in the array = $arr_sum" . "<br>";
      echo "Average value in the array is $avg";
   ?>
   <hr>
   <h2>Task 4</h2>
   <?php
      $ages = array("Sara"=>31, "John"=>41, "Walaa"=>39, "Ramy"=>40);
      foreach ($ages as $key => $val) {
         echo "$key: $val, ";
      }

      asort($ages);
      print_r($ages);
      echo "<br>";

      arsort($ages);
      print_r($ages);
      echo "<br>";

      ksort($ages);
      print_r($ages);
      echo "<br>";

      krsort($ages);
      print_r($ages);

   ?>
</body>
</html>