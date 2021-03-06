<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '微 博') - 微博 入门教程</title>
    <link rel="stylesheet" href="/dist/app.css">
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
<script src="/dist/bootstrap.min.js"></script>
  </body>
</html>
