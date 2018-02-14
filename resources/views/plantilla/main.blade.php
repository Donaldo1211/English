<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Verbs</title>
    <link rel="stylesheet" href="{{asset('plugins/css/bootstrap.css')}}" />
  </head>
  <body>
    @include('plantilla.elementos.nav')
    <div class="row">
      <div class="container">
  @yield('content')
      </div>

    </div>
    @include('plantilla.elementos.footer')

  </body>
</html>
