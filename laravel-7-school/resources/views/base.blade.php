<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
            .container {
                margin-top: 10px;
            }
            .nav-link{
                color: white;
            }
  </style>
  <title>Laravel 7 School</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <nav class="navbar navbar-expand-lg  navbar-light bg-dark">
    <a class="nav-link" href="{{ url('school') }}">Schools</a>
    <a class="nav-link" href="{{ url('course') }}">Courses</a>
    <a class="nav-link" href="{{ url('courses_offered') }}">Enroll</a>
  </nav>
</head>
<body>
  <div class="container">
    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>