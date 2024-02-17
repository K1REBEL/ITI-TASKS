<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Auth Login</title>
   <style>
      button{
         background-color: lightblue;
      }
   </style>
</head>
<body>
   <a href="{{ route('auth.social.redirect', ['provider' => 'facebook']) }}"><button>Facebook</button></a>
</body>
</html>