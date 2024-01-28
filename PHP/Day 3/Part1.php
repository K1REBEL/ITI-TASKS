<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Day 3 Part 1</title>
   <style> p,span{ color: red; } </style>
</head>
<body>
   
<form action="#" method="GET">
   <table>
      <tr>
         <td>Name:</td>
         <td><input type="text" name="name"> <span>*</span></td>
         <td><?php if(empty($_GET["name"])){ echo"<p>Name is required</p>"; } ?></td>
      </tr>
      <tr>
         <td>E-mail:</td>
         <td><input type="email" name="email"> <span>*</span></td>
         <td><?php if(empty($_GET["email"])){ echo"<p>Email is required</p>"; } ?></td>
      </tr>
      <tr>
         <td>Group #:</td>
         <td><input type="number" name="group"> </td>
      </tr>
      <tr>
         <td>Class Details:</td>
         <td><textarea name="details" rows="3" cols="15"></textarea></td>
      </tr>
      <tr>
         <td>Gender:</td>
         <td>
            <input type="radio" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" name="gender" value="Female">
            <label for="female">Female</label>
            <span>*</span>
         </td>
         <td><?php if(empty($_GET["gender"])){ echo"<p>Select a gender.....</p>"; } ?></td>
      </tr>
      <tr>
         <td>Select Courses:</td>
         <td>
            <select name="courses[]" multiple>
               <option value="PHP">PHP</option>
               <option value="JavaScript">JavaScript</option>
               <option value="HTML">HTML</option>
               <option value="CSS">CSS</option>
               <option value="MySQL">MySQL</option>
            </select>
         </td>
      </tr>
      <tr>
         <td>Agree</td>
         <td><input type="checkbox" name="agree"> <span>*</span></td>
      </tr>
      <tr>
         <td><input type="submit" value="Submit"></td>
      </tr>
   </table>
</form>

<hr>

<h1>Your given values are as:</h1>

<?php
if(isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["group"]) && isset($_GET["details"]) && isset($_GET["gender"]) && isset($_GET["courses"])){
   $name = $_GET["name"];
   $email = $_GET["email"];
   $gp_no = $_GET["group"];
   $class_details = $_GET["details"];
   $gender = $_GET["gender"];
   $courses = $_GET["courses"];


   echo"Name: $name <br>";
   echo"E-mail: $email <br>";
   echo"Group Number: $gp_no <br>";
   echo"Class Details: $class_details <br>";
   echo"Gender: $gender <br>";
   echo"Your courses are: <br>";
   foreach($courses as $course) {
      echo $course . "<br>";
   }
   
   if(isset($_GET["agree"])){
      echo"<br> Agreed: Yes <br>";
   }else{
      echo"<br> Agreed: No <br>";
   }
}
?>
</body>
</html>


