<?php
include 'Task2.php';
$age = 10;
switch ($age) {
   case ($age >= 0 && $age < 5):
      echo "Stay at home";
      break;
   case 5:
      echo "Go to Kindergarden";
      break;
   case ($age >= 6 && $age <= 12):
      echo "Go to grade :XXX";
      break;
   case ($age > 12):
      echo "Old";
      break;
   default:
      echo "Invalid";
      break;
}
?>