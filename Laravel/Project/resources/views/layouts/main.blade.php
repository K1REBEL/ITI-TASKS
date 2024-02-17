<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Project')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body *{
            margin: 3px;
        }
        img{
            max-width: 100px;
        }
      .navbar {
          background-color: #cfcfcf;
          padding: 10px;
      }
  
      .nav-list {
          list-style: none;
          display: flex;
          /* justify-content: space-between; */
      }
  
      .nav-item {
          margin-right: 30px;
      }
  
      .nav-link {
          text-decoration: none;
          color: #fff;
          font-weight: bold;
      }
  
      .dropdown-menu {
          display: none;
          position: absolute;
          background-color: #444;
          padding: 10px;
          border-radius: 5px;
          list-style: none;
      }
  
      .dropdown:hover .dropdown-menu {
          display: block;
      }
  
      .dropdown-menu li {
          margin-bottom: 5px;
      }
  </style>
</head>
<body>
    <nav class="navbar">
        @include('includes.navbar')
    </nav>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
