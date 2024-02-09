<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Project')</title>
    <style>
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
